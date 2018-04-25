<?php

namespace App\Console;

use App\Entities\Person;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Services\Service;
use App\Services\PersonService;
use App\Services\SearchService;

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

    /**
     * Compare constructor.
     * @param Service $service
     * @param PersonService $personService
     * @param SearchService $searchService
     */
    public function __construct(Service          $service,
                                PersonService    $personService,
                                SearchService    $searchService)
    {
        parent::__construct();
        $this->service       = $service;
        $this->personService = $personService;
        $this->searchService = $searchService;
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {

            $limit  = $this->service->getCountPortal(1);
            $search = $this->searchService->create(['total' => $limit], true);
            $people = $this->service->getPortal($limit, 1);
            $count  = 0;
            $start  = Carbon::now()->format('d-m-Y H:i:s');
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
//                $verify = $this->verifyExist($person[2]);
//                $data['status'] = !$verify ? Person::STATUS_ENTRADA : Person::STATUS_PERMANENCIA;
                  $data['status'] = Person::STATUS_ENTRADA;
                  $this->personService->create($data);
                  $count++;
            }
//            $this->verifyOutput();
            $end  = Carbon::now()->format('d-m-Y H:i:s');

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
     * @return mixed
     */
    public function verifyOutput()
    {
        return Person::where('updated_at','<',Carbon::now()->format('Y-m-d'))
            ->update(['status' => Person::STATUS_SAIDA]);
    }

}
