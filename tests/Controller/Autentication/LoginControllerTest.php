<?php

namespace App\tests\Controller\Authentication;

use App\tests\Controller\AbstractControllerTest;
use Symfony\Component\HttpFoundation\Response;

class LoginControllerTest extends AbstractControllerTest
{

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
    public function loginWithValidCredentials()
    {
        $userTest = $this->createTestUser();

        $this->client->request('GET', '/login');

        $this->logIn($userTest->getId());

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        
        
        $this->deleteTestUser($userTest);
        $this->tearDown();

    }

    public function tearDown(): void
    {
        $this->client = null;
        $crawler = null;
    }

}