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
     * WebserviceAbstract constructor.
     * @param $apiUrl
     * @param $apiParams
     */
    public function __construct($apiUrl, $apiParams)
    {
        $this->dataObject = [];
        $this->apiUrl = $this->formatApiUrl($apiUrl, $apiParams);
        $this->apiParams = $apiUrl;
    }

    /**
     * Get the data from api
     * @return array<Object>
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