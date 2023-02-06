<?php

namespace AppBundle\Controller\Task;

use AppBundle\Entity\Task;
use Symfony\Component\Routing\Annotation\Route;

class ToggleTaskController
{
    /**
     * @Route("/tasks/{id}/toggle", name="task_toggle_isDone")
     */
    public function toggleTaskAction(Task $task)
    {
        $task->toggleIsDone(!$task->isDone());
        $this->getDoctrine()->getManager()->flush();

        $this->addFlash('success', sprintf('La tâche %s a bien été marquée comme faite.', $task->getTitle()));

        return $this->redirectToRoute('task_list');
    }
}