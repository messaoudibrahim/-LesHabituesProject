<?php


namespace App\Service;


interface MapperDataInterface
{
    /**
     * @param $arrayData
     * @return \stdClass
     */
    function map($arrayData);
}