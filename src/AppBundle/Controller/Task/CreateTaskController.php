<?php

namespace AppBundle\Controller\Task;

use AppBundle\Entity\Task;
use AppBundle\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CreateTaskController extends Controller
{
    /**
     * Créer une task lié à l'utilisateur
     * Si aucun utilisateur, la task sera liée à NULL
     * 
     * @Route("/tasks/create", name="task_create")
     */
    public function createTask(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            // On récupère le user et on l'assigne à la task avant le persist
            $user = $this->getUser();
            if($user === false)
            {
                $task->setuser(null);
            } else {
                $task->setUser($user);
            }

            $em->persist($task);
            $em->flush();

            $this->addFlash('success', 'La tâche a été bien été ajoutée.');

            return $this->redirectToRoute('task_list');
        }

        return $this->render('task/create.html.twig', ['form' => $form->createView()]);
    }
}