<?php

namespace App\Controller\Home;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/home", name="homepage")
     */
    public function home()
    {
        return $this->render('default/index.html.twig');
    }
}
