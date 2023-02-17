<?php

namespace App\Tests\Controller\Task;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CreateTaskControllerTest extends WebTestCase
{
    private $client;

    protected function setUp(): void
    {
        $this->client = self::createClient();
    }

    /**
     * need to be logged in first
     */
    public function createTaskTest()
    {
        $crawler = $this->client->request('GET', '/tasks/create');
        $crawler = $this->client->getResponse()->getContent();

        var_dump($crawler);
        die();
        $form = $crawler->selectButton('Ajouter')->form();
        
        $form['title'] = 'titre test';
        $form['content'] = 'contenu test';
        
        $crawler = $this->client->submit($form);

        $this->assertEquals(302, $this->client->getResponse()->getStatusCode());


    }
}