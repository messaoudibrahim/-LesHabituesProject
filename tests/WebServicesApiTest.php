<?php

namespace  App\tests;

use App\Exception\NotReachedApiException;
use App\Service\MapperShopsService;
use App\Service\WebServiceShopsCustomer;
use PHPUnit\Framework\TestCase;

/**
 * Class WebServicesApiTest
 * @package App\tests
 */
class WebServicesApiTest extends TestCase
{
    /**
     * test url format
     */
    function testFormatUri()
    {
        $laParams = ['p1' => 'v1', 'p2' => 'v2'];
        $dataMapper = $this->getDataMapper();
        $webservice  = new WebServiceShopsCustomer('test.php', $dataMapper, $laParams);
        $this->assertEquals('test.php?p1=v1&p2=v2', $webservice->getApiUrl());
    }

    /**
     * test bad url exceptions
     */
    function testBadUrl()
    {
        $this->expectException(NotReachedApiException::class);
        $dataMapper = $this->getDataMapper();
        $webservice  = new WebServiceShopsCustomer('https://fakeUrl.php', $dataMapper);
        $webservice->getData();
    }

    /**
     * test the number element gotten
     */
    function testCountOfElement()
    {
        $dataMapper = $this->getDataMapper();
        $webservice  = new WebServiceShopsCustomer('https://www.leshabitues.fr/testapi/shops', $dataMapper);
        $result = $webservice->getData();
        $this->assertEquals(20, count($result));
    }

    private function getDataMapper()
    {
        return  new MapperShopsService();
    }
}