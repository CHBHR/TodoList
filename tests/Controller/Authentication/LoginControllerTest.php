<?php

namespace AppBundle\Tests\Controller\Authentication;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\ORM\EntityManager;
use App\DataFixtures\Test\TaskFixturesTest;
use App\DataFixtures\Test\UserFixturesTest;

class LoginControllerTest extends WebTestCase
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    private $client;

    protected function setUp()
    {
        $this->client = self::createClient();
    }

    public function loginWithAdmin()
    {
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('Se connecter')->form();
        $this->client->submit($form, ['username' => 'userStub1', 'password' => 'userStub1']);
    }

    public function loginWithUser()
    {
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('Se connecter')->form();
        $this->client->submit($form, ['username' => 'userStub2', 'password' => 'userStub2']);
    }
}