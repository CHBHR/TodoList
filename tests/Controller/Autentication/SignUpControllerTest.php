<?php

namespace App\tests\Controller\Authentication;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class SignUpControllerTest extends WebTestCase
{
    /**
     * not working
     */
    public function SignUpPageIsUp()
    {
        $client = static::createClient();
        $client->request('GET', '/signup');
        $this->assertSame(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }
}
