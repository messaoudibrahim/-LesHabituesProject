<?php

namespace  App\tests;

use App\Service\WebServiceShopsCustomer;
use PHPUnit\Framework\TestCase;

class WebServicesApiTest extends TestCase
{

    /**
     * Test url format method
     */
    function testFormatUri()
    {
        $laParams = ['p1' => 'v1', 'p2' => 'v2'];
        $webservice  = new WebServiceShopsCustomer('test.php', $laParams);
        $this->assertEquals('test.php?p1=v1&p2=v2', $webservice->getApiUrl());
    }
}