<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LunchControllerTest extends WebTestCase
{
    public function test_able_to_return_result()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/lunch');

        $this->assertResponseIsSuccessful();
    }
}
