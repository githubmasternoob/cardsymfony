<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Swift_Attachment;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestMailController extends AbstractController
{
    /**
     * @Route("/test/mail", name="test_mail" ,methods={"POST"})
     */
    public function index(Request $request, \Swift_Mailer $mailer,
                          LoggerInterface $logger)
    {
        $mail = $request->request->get('mail');
//        $password = $request->request->get('_password');
        $name = $request->request->get('name');
        $body = $request->request->get('message');
        $fileName = $request->request->get('fileName');
//        $description = $request->request->get('description');
        $message = new \Swift_Message($name);
        $message->setFrom('safwenisims@gmail.com');
        $message->setTo($mail);
//        $message->setBody($body);
//        $message->attach(Swift_Attachment::fromPath('C:\wamp64\www\stage\public\'. $fileName.'.'pdf' ));
        $path = "C:/wamp64/www/stage/public/". $fileName . ".pdf";
        $message->attach(Swift_Attachment::fromPath($path ));
        $message->setBody($message->embed(\Swift_Image::fromPath('C:\wamp64\www\stage\src\Controller\nintendo.jpg')));
        $mailer->send($message);
        $logger->info('email sent');
        $this->addFlash('notice', 'Email sent');
        return $this->redirectToRoute('home');
    }
}