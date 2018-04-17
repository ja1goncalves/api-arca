<?php

namespace App\Console;

use App\Entities\Person;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Services\Service;
use App\Repositories\PersonRepository;
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


    protected $personRepository;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Directories and Remove Directories';

    protected $searchService;

    /**
     * Compare constructor.
     * @param Service $service
     * @param PersonRepository $personRepository
     * @param SearchService $searchService
     */
    public function __construct(Service          $service,
                                PersonRepository $personRepository,
                                SearchService    $searchService)
    {
        parent::__construct();
        $this->service = $service;
        $this->personRepository = $personRepository;
        $this->searchService    = $searchService;
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $limit  = $this->service->getCountPortal();
        $search = $this->searchService->create(['total' => $limit],true);
        $people = $this->service->getPortal($limit);
       
        foreach ($people as $person) {
            $data = [
                'institution'    => $person[0],
                'cpf'            => $person[1],
                'registration'   => $person[2],
                'name'           => $person[3],
                'category'       => $person[4],
                'office'         => $person[5],
                'function_person'=> $person[7],
                'value_liquid'   => $person[9],
                'status'         => 0,
                'search_id'      => $search->id,
            ];
            if (!$this->verifyExist($person[2]))
            {
                $this->personRepository->create($data);
            }else{
                Person::where('registration', '=', $person[2])
                    ->update(array_merge($data,['status' => Person::STATUS_PERMANENCIA]));
            }

        }
    }

    /**
     * @param $registration
     * @return bool
     */
    public function verifyExist($registration)
    {
        return !empty($this->personRepository->skipPresenter()->findWhere(['registration' => $registration ])->count());
    }

    /**
     * @return mixed
     */
    public function verifyOutput()
    {
        return Person::where('update_at','<',Carbon::now())
            ->update(['status' => Person::STATUS_SAIDA]);
    }
   

}
