<?php


namespace App\Service;


use App\Exception\NotReachedApiException;

class WebServiceShopsCustomer extends WebServiceAbstract
{

    const HTTP_CODE_SUCCESS = 200;
    /**
     * WebServiceShopsCustomer constructor.
     * @param $apiUrl
     * @param MapperDataInterface $mapperData
     * @param array $apiParams
     */
    public function __construct($apiUrl, MapperDataInterface $mapperData ,$apiParams = [])
    {
        parent::__construct($apiUrl, $mapperData, $apiParams);
    }

    /**
     * Get the data from api
     * @return mixed
     */
    public function getData()
    {
        try{
            $loCurl  = curl_init();
            curl_setopt($loCurl, CURLOPT_URL, $this->getApiUrl());
            curl_setopt($loCurl, CURLOPT_HTTPGET, true);
            curl_setopt($loCurl, CURLOPT_RETURNTRANSFER, true);
            // get response
            $loResponse  = curl_exec($loCurl);

            // get curl information
            $curlInformation = curl_getinfo($loCurl);
            curl_close($loCurl);

            $http_code = $curlInformation['http_code'];

            if ($http_code == 0) {
                throw new NotReachedApiException();
            }

            if ($http_code == self::HTTP_CODE_SUCCESS) {
                $laArrResponse = json_decode($loResponse, true);
                if (!isset($laArrResponse['data'])) {
                    $this->dataObject = [];
                } else {
                    foreach ($laArrResponse['data'] as $data)
                    {
                        $this->dataObject[] = $this->mapperData->map($data);
                    }
                    return $this->dataObject;                }
            }
            return $loResponse;
        }catch (\Exception $exception){
            return  ['error' => $exception->getMessage()];
        }
    }
}