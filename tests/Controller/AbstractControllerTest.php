<?php

namespace App\tests\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

abstract class AbstractControllerTest extends WebTestCase
{
    /**
     * @var Client
     */
    protected $client = null;

    private $entityManager;

    public function setUp(): void
    {
        $this->client = static::createClient();

        $this->entityManager = $this->client->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    protected function logIn($userId)
    {
        $user = $this->entityManager
            ->getRepository(User::class)
            ->find($userId);

        $session = $this->client->getContainer()->get('session');
        $firewallName = 'main';
        $firewallContext = 'main';

        $token = new UsernamePasswordToken($user, null, $firewallName);

        $session->set('_security_'.$firewallContext, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie, []);
    }

    protected function createTestUser()
    {
        $userTest = new User();
        $userTest->setUsername('userTest');
        $userTest->setEmail('userTest@test.com');
        $userTest->setPassword('test');
        $userTest->setRoles(['ROLE_USER']);
        $this->entityManager->persist($userTest);
        $this->entityManager->flush();
        return $userTest;
    }

    protected function deleteTestUser($userTest)
    {
        $entity = $this->entityManager->merge($userTest);
        $this->entityManager->remove($entity);
        $this->entityManager->flush();
    }
}