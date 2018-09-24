<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

/**
 * Class Service
 * @package App\Services
 */
class Service 
{

    /**
     * @param $paramLimit
     * @return mixed
     */
    public static function getPortal($paramLimit, $month)
    {
            $method = 'GET';
            $params = [
                'path' => '/public/OpenReports/Portal_Producao/Painel_Remuneracao/Painel_Remuneracao.cda',
                'dataAccessId' => 'sql_jndi',
                'parampara_ano' => '2018',
                'parammes_' => $month,
                'paramsituacao' => 'Ativo',
                'parammatricula_' => '',
                'parampara_orgao' => '%',
                'parampesquisa_' => '',
                'parampesquisa_cargo_' => '',
                'paramoutros' => '3',
                'paramlimit_' => $paramLimit,
                'paramoffset_' => '50',
                'outputIndexId' => '1',
                'pageSize' => '0',
                'pageStart' => '0',
                'paramsearchBox' => '',
                'sortBy'              => ''
            ];
            $endpoint = 'http://web.transparencia.pe.gov.br/pentaho/plugin/cda/api/doQuery'.self::httpQueryBuild($params);
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

            ];echo "Aguardando resposta ............................";
           $response = self::processRequest($method, $endpoint, $options);
        return $response['resultset'];

    }

    /**
     * @return mixed
     */
    public static function getCountPortal($month)
    {
        $method   = 'POST';
        $endpoint = 'http://web.transparencia.pe.gov.br/pentaho/plugin/cda/api/doQuery';
        $params = [
            'path'                => '/public/OpenReports/Portal_Producao/Painel_Remuneracao/Painel_Remuneracao.cda',
            'dataAccessId'        => 'sql_jndi_count',
            'outputIndexId'       => '1',
            'pageSize'            => '0',
            'pageStart'           => '0',
            'parammatricula_'     => '',
            'parammes_'           => $month,
            'paramoutros'         => '3',
            'parampara_ano'       => '2018',
            'parampara_orgao'     => '%',
            'parampesquisa_'      => '',
            'parampesquisa_cargo_'=> '',
            'paramsearchBox'      => '',
            'paramsituacao'       => 'Ativo',
            'sortBy'              => '',
            //'paramoffset_'        => '50'
        ];
        $options = [
            'headers' => [
                'postman-token' => '4c047248-d212-cf93-2d24-e2b8fe5e6df4',
                'cache-control' => 'no-cache',
                'cookie' => 'JSESSIONID=3AE2D8A1E986370FECA72222DDBDEB44; _ga=GA1.4.1356161571.1523651376; __sharethis_cookie_test__=1; _gid=GA1.4.1735641646.1523885670; _gat=1; JSESSIONID=3AE2D8A1E986370FECA72222DDBDEB44; _ga=GA1.4.1356161571.1523651376; __sharethis_cookie_test__=1; _gid=GA1.4.1735641646.1523885670; _ga=GA1.4.1356161571.1523651376; _gid=GA1.4.1735641646.1523885670',
                'accept-language' => 'pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
                'accept-encoding' => 'gzip, deflate',
                'referer' => 'http://web.transparencia.pe.gov.br/pentaho/api/repos/%3Apublic%3AOpenReports%3APortal_Producao%3APainel_Remuneracao%3APainel_Remuneracao.wcdf/generatedContent',
                'content-type' => 'application/x-www-form-urlencoded',
                'user-agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36',
                'x-requested-with' => 'XMLHttpRequest',
                'x-devtools-emulate-network-conditions-client-id' => '(357E6B7D3BE5C5EF3CD6AE543A643EB2)',
                'origin' => 'http://web.transparencia.pe.gov.br',
                'accept' => '*/*'
            ],
            'form_params' => $params
        ];
        $reponse = self::processRequest($method, $endpoint ,$options);
        return $reponse['resultset'][0][0];
    }

    /**
     * @param array $params
     * @return string
     */
    public static function httpQueryBuild(array $params)
    {
        $httpQuery = '';

        foreach ($params as $key => $value)
        {
            if (!is_array($value))
            {
                $httpQuery .= urlencode($key)  .'='. urlencode($value) . '&';
            } else {
                foreach ($value as $v2)
                {
                    if (!is_array($v2))
                    {
                        $httpQuery .= urlencode($key)  .'='. urlencode($v2) . '&';
                    }
                }
            }
        }

        $httpQuery = rtrim($httpQuery, '&');

        return '?' . $httpQuery;
    }

    /**
     * @param $method
     * @param $endpoint
     * @param $options
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public static function processRequest($method , $endpoint, $options)
    {
        try {
            $response = self::httpClient()->request($method, $endpoint, $options);
            $response = json_decode($response->getBody(), true);
            return $response;
        } catch (ClientException $e) {
            $message = json_decode($e->getResponse()->getBody(), true);
            return print_r($message, $e->getResponse()->getStatusCode());
        }
    }

    /**
     * @return Client
     */
    public static function httpClient()
    {
        return new Client();
    }
}