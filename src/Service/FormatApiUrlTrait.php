<?php


namespace App\Service;


/**
 * Trait FormatApiUrl
 * @package App\Service
 */
trait FormatApiUrlTrait
{

    /**
     * Format the api url by adding params array
     * @param $apiUrl
     * @param $params
     * @return string
     */
    public function formatApiUrl($apiUrl, $params)
    {
        if (!empty($params) && is_array($params)) {
            return $apiUrl . '?' . http_build_query($params);
        }
        return $apiUrl;
    }
}