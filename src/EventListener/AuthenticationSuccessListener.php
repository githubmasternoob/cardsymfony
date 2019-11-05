<?php
/**
 * Created by PhpStorm.
 * User: Moez
 * Date: 07/05/2019
 * Time: 14:29
 */

namespace App\EventListener;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;


class AuthenticationSuccessListener
{
    /**
     * @param AuthenticationSuccessEvent $event
     */
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        $data = $event->getData();


        $data['data'] = array(
            'roles' => 'chef',
        );

        $event->setData($data);
    }
}