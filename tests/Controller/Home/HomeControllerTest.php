<?php

namespace App\Tests\Controller\Home;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeControllerTest extends WebTestCase
{
    public $client = null;
    
    public function setUp() : void
    {
       $this->client = static::createClient();
    }

    /**
     * @test
     */
    public function homeNotConnectedShouldRedirectToLogin()
    {
        $this->client->request('GET', '/');
        $this->assertSame(Response::HTTP_FOUND,$this->client->getResponse()->getStatusCode());
        $this->assertResponseRedirects('http://localhost/login');

        $crawler = $this->client->followRedirect();
        // Test if login field exists
        static::assertSame(1, $crawler->filter('input[name="_username"]')->count());
        static::assertSame(1, $crawler->filter('input[name="_password"]')->count());
    }

    public function homeConnectedReturnsOk()
    {
    }
}