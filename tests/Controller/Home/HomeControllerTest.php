<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class HomeControllerTest extends WebTestCase
{
    /**
     * @test
     */
    public function notConnectedShouldRedirectToLogin()
    {
        $client = static::createClient();
        
        $crawler = $client->request('GET', '/');
    
        $this->assertSame(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect('http://localhost/login'));
    }

    // /**
    //  * @test
    //  */
    // public function connectedShouldReturnHomepage()
    // {
    //     $client = static::createClient();

    //      //Implement fixtures to have admin and user logged in features
    //     //$this->basicLoginAsAdmin();

    //     $crawler = $client->request('GET', '/');

    //     $this->assertTrue($client->getResponse()->isSuccessful());
    // }

}

