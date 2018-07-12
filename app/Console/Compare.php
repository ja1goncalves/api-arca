<?php

namespace App\Console;

use App\Entities\AnalysisResult;
use App\Entities\Person;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Services\Service;
use App\Services\PersonService;
use App\Services\SearchService;
use App\Services\AnalysisResultService;

/**
 * Class EmailMessage
 * @package App\Console\Commands
 */
class Compare extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'compare:run';
    /**
     * @var Service
     */
    protected $service;

    /**
     * @var
     */
    protected $personService;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Directories and Remove Directories';

    /**
     * @var SearchService
     */
    protected $searchService;

    protected $analysisResultService;

    /**
     * Compare constructor.
     * @param Service $service
     * @param PersonService $personService
     * @param SearchService $searchService
     * @param AnalysisResultService $analysisResultService
     */
    public function __construct(Service               $service,
                                PersonService         $personService,
                                SearchService         $searchService,
                                AnalysisResultService $analysisResultService)
    {
        parent::__construct();
        $this->service       = $service;
        $this->personService = $personService;
        $this->searchService = $searchService;
        $this->analysisResultService = $analysisResultService;
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
            echo "Preparando...\n";
            $limit                = $this->service->getCountPortal(5);echo "total da pesquisa".$limit."\n";
            $search               = $this->searchService->create(['total' => $limit], true);
            $people               = $this->service->getPortal($limit, 5); echo "Pegou no portal...\n";
            $count                = 0;
            $search_id_old        = $search->id -1;
            $registration_current = [];
            $start                = Carbon::now()->format('d-m-Y H:i:s');
            $this->clearSearchOld($search_id_old);
            foreach ($people as $person) {
                $data = [
                    'institution'      => $person[0],
                    'cpf'              => $person[1],
                    'registration'     => $person[2],
                    'name'             => $person[3],
                    'category'         => $person[4],
                    'office'           => $person[5],
                    'function_person'  => $person[7],
                    'value_liquid'     => $person[9],
                    'search_id'        => $search->id,
                ];
                $verify = $this->verifyExist($person[2],$search_id_old);
                $data['status']  = !$verify ? Person::STATUS_ENTRADA : Person::STATUS_PERMANENCIA;echo $person[3]." gravado! \n";
                $this->personService->create($data,true);
                if($data['status'] == Person::STATUS_PERMANENCIA)
                {
                    $registration_current[] = ['registration' => $person[2]];
                }
                $count++;
            }

            $this->updatePeopleCurrent($registration_current,$search->id);
            $this->analysisResult($search_id_old, $search->id);
            $end  = Carbon::now()->format('d-m-Y H:i:s');
            echo "Terminou! \n".$end;
        \Log::info("Iniciou as ! \n");
        \Log::debug($start);
        \Log::info("Terminou! \n");
        \Log::debug($end."\n");
        \Log::info($count."\n");
        \Log::info("Verificados! \n");
    }

    /**
     * @param $registration
     * @param bool $search_id
     * @return bool
     */
    public function verifyExist($registration, $search_id = false)
    {
        if ($search_id) {
            return !empty($this->personService->findWhere(['registration' => $registration, 'search_id' => $search_id], true));
        }
        return !empty($this->personService->findWhere(['registration' => $registration], true));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function clearSearchOld($id)
    {
        return Person::where('search_id','=',$id)
            ->update(['status' => Person::STATUS_ENTRADA]);
    }

    /**
     * @param $registration_currents
     * @param $search_id
     */
    public function updatePeopleCurrent($registration_currents,$search_id )
    {
        echo "Upload People Current!... \n";
        $search_id = $search_id - 1;
        foreach ($registration_currents as $person) {
            Person::where('registration','=',$person['registration'])
                ->where('search_id','=',$search_id)
                ->update(['status' => Person::STATUS_PERMANENCIA]);
            echo "atualizando a matricula: ".$person['registration']."\n";
        }echo "Upload People Current Output!... \n";
        Person::where('status','=',Person::STATUS_ENTRADA)
            ->where('search_id','=',$search_id)
            ->update(['status' => Person::STATUS_SAIDA]);

    }

    /**
     * @param $search_id_old
     * @param $search_id_new
     */
    public function analysisResult($search_id_old ,$search_id_new)
    {
      echo "analysisResult! \n";
         $people_new = $this->personService->findWhere(['status' => 0 ,'search_id' => $search_id_new]);
         $people_old = $this->personService->findWhere(['status' => 2 ,'search_id' => $search_id_old]);
        echo "Pegando entradas de saidas! \n";
        foreach ($people_new as $person) {
            $data = [
                'person_id' => $person->id,
                'search_id_old' => $search_id_old,
                'search_id_new' => $search_id_new,
                'type' => AnalysisResult::TYPE_ENTRADA
            ]; echo $person->id." indentificado como entrada! \n";
            $this->analysisResultService->create($data);
        }

        foreach ($people_old as $person) {
            $data = [
                'person_id' => $person->id,
                'search_id_old' => $search_id_old,
                'search_id_new' => $search_id_new,
                'type' => AnalysisResult::TYPE_SAIDA
            ];echo $person->id." indentificado como saida! \n";
            $this->analysisResultService->create($data);
        }

    }
}
