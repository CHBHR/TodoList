<?php

namespace AppBundle\Controller\Authentication;

use AppBundle\Entity\User;
use AppBundle\Form\SignUpType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class SignUpController extends Controller
{
    /**
     * @Route("/signup", name="signup")
     */
    public function signUp(Request $request)
    {
        $user = new User();

        $form = $this->createForm(SignUpType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $password = $this->get('security.password_encoder')->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            $user->setRoles(['ROLE_USER']);

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', "Vous êtes bien inscrit.");

            // changed the redirection to avoid user on user list page
            return $this->redirectToRoute('homepage');
        }

        return $this->render('security/signup.html.twig', ['form' => $form->createView()]);
    }
}