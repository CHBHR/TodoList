<?php

namespace App\Tests\Controller\Home;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class HomeControllerTest extends WebTestCase
{
    /**
     * @test
     */
    public function homeNotConnectedShouldRedirectToLogin()
    {
        $client = static::createClient();
        $crawler= $client->request('GET', '/');
        $this->assertSame(Response::HTTP_FOUND,$client->getResponse()->getStatusCode());
        $this->assertResponseRedirects('http://localhost/login');
    }
}