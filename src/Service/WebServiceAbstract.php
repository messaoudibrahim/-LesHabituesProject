<?php


namespace App\Service;

/**
 * Class WebserviceAbstract
 * @package App\Service
 */
abstract class WebServiceAbstract
{

    use FormatApiUrlTrait;
    /**
     * The Url Api ex: https://test.php
     * @var string
     */
    protected $apiUrl;
    /**
     * The api params ex :['p1' => 'v1']
     * @var string
     */
    protected $apiParams;
    /**
     * @var array
     */
    protected $dataObject;
    /**
     * @var MapperDataInterface
     */
    protected $mapperData;

    /**
     * WebserviceAbstract constructor.
     * @param $apiUrl
     * @param MapperDataInterface $mapperData
     * @param array $apiParams
     */
    public function __construct($apiUrl, MapperDataInterface $mapperData ,$apiParams = [])
    {
        $this->dataObject = [];
        $this->apiUrl = $this->formatApiUrl($apiUrl, $apiParams);
        $this->apiParams = $apiUrl;
        $this->mapperData = $mapperData;
    }

    /**
     * Get the data from api
     * @return mixed
     */
    public abstract function getData();
    /**
     * @return string
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * @return string
     */
    public function getApiParams()
    {
        return $this->apiParams;
    }

    /**
     * @return array
     */
    public function getDataObject()
    {
        return $this->dataObject;
    }

}