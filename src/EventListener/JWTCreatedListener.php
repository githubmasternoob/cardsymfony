<?php
/**
 * Created by PhpStorm.
 * User: Moez
 * Date: 07/05/2019
 * Time: 14:38
 */

namespace App\EventListener;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\HttpFoundation\RequestStack;
use App\Controller;
class JWTCreatedListener
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @param JWTCreatedEvent $event
     *
     * @return void
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    {

        $request = $this->requestStack->getCurrentRequest();

        $user = $event->getUser();
       // $role=$user->getRoles();
        $role=$user->getUsername();
        $payload= $event->getData();
        $payload['role'] = $role;
        $payload['userId'] = $user->getId();
        $payload['username'] = $user->getUsername();
        $event->setData($payload);

//        $header= $event->getHeader();
//        $header['id'] = $user->getUsername();
//
//        $event->setHeader($header);

    }
}