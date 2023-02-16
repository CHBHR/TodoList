<?php

namespace App\tests\Controller\Authentication;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class LoginControllerTest extends WebTestCase
{
    
    private $client;

    protected function setUp(): void
    {
        $this->client = self::createClient();
    }

    /**
     * @test
     */
    public function loginPageIsUp()
    {
        $this->client->request('GET', '/login');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h1', 'Connexion');
    }

    /**
     * @test
     */
    public function loginWithInvalidCredentials()
    {
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('Se connecter')->form();
        $form['_username'] = 'user';
        $form['_password'] = 'test';
        $this->client->submit($form);
        $this->client->followRedirect();

        static::assertSame(200, $this->client->getResponse()->getStatusCode());

    }

    /**
     * 
     */
    public function loginWithValidCredentials()
    {
        $client = static::createClient([], 
            [
                'PHP_AUTH_USER' => 'user1',
                'PHP_AUTH_PW'   => 'password',
            ]
        );

        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('Se connecter')->form();

        $form['_username'] = 'user1';
        $form['_password'] = 'test';
        $client->submit($form);

        //$crawler = $client->followRedirect();

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function tearDown(): void
    {
        $this->client = null;
        $crawler = null;
    }

}