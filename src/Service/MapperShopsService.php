<?php


namespace App\Service;


class MapperShopsService implements MapperDataInterface
{

    /**
     * Get stdClass from a array of data
     * @param $arrData
     * @return \stdClass
     */
    function map($arrData)
    {
        $object = new \stdClass();
        foreach ($arrData as $key => $value)
        {
            if (is_array($value)) {
                $object->$key = $this->map($value);
            }
            $object->$key = $value;
        }
        return $object;
    }//map
}