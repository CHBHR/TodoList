<?php

namespace App\Controller\Authentication;

use App\Entity\User;
use App\Form\SignUpType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SignUpController extends Controller
{
    /**
     * @Route("/signup", name="signup")
     */
    public function signUp(Request $request,UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(SignUpType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $encodedPassword = $encoder->encodePassword($user, $form["password"]->getData());
            $user->setPassword($encodedPassword);
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
