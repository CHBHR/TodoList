<?php

namespace AppBundle\Controller\Home;

use Symfony\Component\Routing\Annotation\Route;

class HomeController
{
    /**
     * @Route("/", name="homepage")
     */
    public function home()
    {
        return $this->render('default/index.html.twig');
    }
}
