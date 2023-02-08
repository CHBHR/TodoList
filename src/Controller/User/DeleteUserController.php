<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DeleteUserController extends Controller
{
    /**
     * @Route("/admin/users/{id}/delete", name="user_delete")
     */
    public function deleteUser($id)
    {
        $user = $this->getDoctrine()->getRepository('App:User')->find((int) $id);

        $this->anonymiseTasks($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        $this->addFlash('success', 'L\' utilisateur à bien été supprimer');

        return $this->redirectToRoute('user_list');
    }

    /**
     * Supprime l'id de la tache liée à l'utilisateur et met NULL
     */
    public function anonymiseTasks($id)
    {
        $em = $this->getDoctrine()->getManager();
        $results = $this->getDoctrine()->getRepository('AppBundle:Task')->findTasksByUserId($id);
        foreach($results as $task){
            $task->setuser(null);
            $em->flush();
        }
    }
}
