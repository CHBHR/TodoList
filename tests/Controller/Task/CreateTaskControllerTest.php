<?php

namespace App\Tests\Controller\Task;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CreateTaskControllerTest extends WebTestCase
{
    /**
     * @test
     */
    public function createTaskTest()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/tasks/create');

        $form = $crawler->selectButton('Ajouter')->form();
        
        $form['title'] = 'titre test';
        $form['content'] = 'contenu test';
        
        $client->submit($form);

        static::assertSame(200, $client->getResponse()->getStatusCode());

    }
}