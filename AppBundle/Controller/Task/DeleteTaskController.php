<?php

namespace AppBundle\Controller\Task;

use AppBundle\Entity\Task;
use Symfony\Component\Routing\Annotation\Route;

class DeleteTaskController
{
    /**
     * @Route("/tasks/{id}/delete", name="task_delete")
     */
    public function deleteTask(Task $task)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($task);
        $em->flush();

        $this->addFlash('success', 'La tâche a bien été supprimée.');

        return $this->redirectToRoute('task_list');
    }
}