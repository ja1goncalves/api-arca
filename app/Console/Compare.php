<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;


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

    protected $clientService;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Directories and Remove Directories';

    /**
     */
    public function __construct(Client $client)
    {
        parent::__construct();
        $this->clientService = new Client();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        try {
            $method='GET';

            $endpoint = 'http://web.transparencia.pe.gov.br/pentaho/plugin/cda/api/doQuery?path=%2Fpublic%2FOpenReports%2FPortal_Producao%2FPainel_Remuneracao%2FPainel_Remuneracao.cda&dataAccessId=sql_jndi&parampara_ano=2018&parammes_=3&paramsituacao=Ativo&parammatricula_=&parampara_orgao=%25&parampesquisa_=&parampesquisa_cargo_=&paramoutros=3&paramlimit_=10&paramoffset_=50';
            $options = [
                'headers' => [
                    'postman-token' => 'f7ddb980-67a6-3ff4-50a5-02d2ddb509e4',
                    'cache-control' => 'no-cache',
                    'cookie' => 'JSESSIONID=E488F030B3723867C82E12159D8A74FE; _ga=GA1.4.220795475.1523709569; _gid=GA1.4.624586905.1523709569; _gat=1; JSESSIONID=E488F030B3723867C82E12159D8A74FE; _ga=GA1.4.220795475.1523709569; _gid=GA1.4.624586905.1523709569',
                    'accept-language' => 'pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
                    'accept-encoding' => 'gzip, deflate',
                    'referer' => 'http://web.transparencia.pe.gov.br/pentaho/api/repos/%3Apublic%3AOpenReports%3APortal_Producao%3APainel_Remuneracao%3APainel_Remuneracao.wcdf/generatedContent',
                    'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36',
                    'x-requested-with' => 'XMLHttpRequest',
                    'x-devtools-emulate-network-conditions-client-id' => 'AEDBDED55C65340B9209CA24A0C46CB0',
                    'accept' => 'application/json, text/javascript, */*; q=0.01'
                ]

            ];
            $response = $this->clientService->request($method, $endpoint, $options);
           $response = json_decode($response->getBody(), true);

           print_r($response['resultset']);

        } catch (ClientException $e) {
            $message = json_decode($e->getResponse()->getBody(), true);
            return print_r($message, $e->getResponse()->getStatusCode());
        }

    }


}
