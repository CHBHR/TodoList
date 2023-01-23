<?php

namespace AppBundle\Controller\Task;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ListTaskController extends Controller
{
    /**
     * Récupère la liste des tasks non finies lié à l'id de l'utilisateur
     * 
     * @Route("/tasks", name="task_list")
     */
    public function listTasks()
    {
        $user = $this->getUser()->getId();
        return $this->render('task/list.html.twig', ['tasks' => $this->getDoctrine()->getRepository('AppBundle:Task')->findOpenTasksByUserId($user)]);
    }

    /**
     * Récupère la liste des tasks avec un id null (non lié a un utilisateur)
     * 
     * @Route("/admin/tasks/anonymous", name="task_list_anonymous")
     */
    public function listAnonymousTaks()
    {
        return $this->render('task/list.html.twig', ['tasks' => $this->getDoctrine()->getRepository('AppBundle:Task')->findAnonymousTasks()]);
    }

    /**
     * Récupère la liste des tasks finies (id_done = true)
     * 
     * @Route("/tasks/done", name="task_list_done")
     */
    public function listDoneTasks()
    {
        $user = $this->getUser()->getId();
        return $this->render('task/list.html.twig', ['tasks' => $this->getDoctrine()->getRepository('AppBundle:Task')->findDoneTasksByUserId($user)]);
    }
}