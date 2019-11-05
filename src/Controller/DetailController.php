<?php
/**
 * Created by PhpStorm.
 * User: GAMING
 * Date: 10/09/2019
 * Time: 21:59
 */

namespace App\Controller;


use App\Entity\Carte;
use App\Entity\CarteDetail;
use App\Entity\CartItem;
use App\Entity\OrderItem;
use App\Entity\ShoppingCart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DetailController extends  AbstractController
{
    public function __invoke($id)
    {
//        $product = $this->getDoctrine()
//            ->getRepository(Carte::class)
//            ->find(1);
        $product = $this->getDoctrine()
            ->getRepository(OrderItem::class)
            ->findBy( ['code' => $id]);
//        $product = $this->get('serializer')->serialize($product, 'json');
//
//        return new Response(json_encode($product));
//        $response = new Response($product);
        return $product;
//        return new JsonResponse( $this->get('serializer')->serialize($product, 'jsonld'), 201, [], true);

//        $response->headers->set('Content-Type', 'application/ld+json');
//        return $response;
//        return $this->getCarte();
    }
}
