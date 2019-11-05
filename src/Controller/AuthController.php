<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class AuthController extends AbstractController
{
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager();
        $username = $request->request->get('username');
        $password = $request->request->get('password');
        $email = $request->request->get('email');
        $role = $request->request->get('role');
        $user = new User();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setEnabled(1);
        $user->setPassword($encoder->encodePassword($user, $password));
//		$user->setRole($role);
        $em->persist($user);
        $em->flush();
        return new Response($user->getID());
    }
    public function api()
    {
        return new Response(sprintf('Logged in as %s', $this->getUser()->getUsername()));
    }
}