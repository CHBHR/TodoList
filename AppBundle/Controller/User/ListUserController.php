<?php

namespace AppBundle\Controller\User;

use Symfony\Component\Routing\Annotation\Route;

class ListUserController
{
    /**
     * @Route("/admin/users", name="user_list")
     */
    public function listUser()
    {
        return $this->render('user/list.html.twig', ['users' => $this->getDoctrine()->getRepository('AppBundle:User')->findAll()]);
    }

}