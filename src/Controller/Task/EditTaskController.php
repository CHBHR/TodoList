<?php

namespace App\Controller\Task;

use App\Entity\Task;
use App\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EditTaskController extends AbstractController
{
    /**
     * @Route("/tasks/{id}/edit", name="task_edit")
     */
    public function editTask(Task $task, Request $request)
    {
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if($form["hasDeadLine"]->getData() === true)
            {
                $task->setDeadLine($form["deadLine"]->getData());
            } else if($form["hasDeadLine"]->getData() === false) {
                $task->setDeadLine(Null);
            }
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'La tâche a bien été modifiée.');

            return $this->redirectToRoute('task_list');
        }

        return $this->render('task/edit.html.twig', [
            'form' => $form->createView(),
            'task' => $task,
        ]);
    }
}