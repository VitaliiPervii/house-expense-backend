<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class CurrencyController extends Controller
{
    /**
     * @Route("/currency", name="currency")
     * @Method("GET")
     */
    public function index(SerializerInterface $serializer)
    {
       $content = file_get_contents('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');


       $data['currency'] = json_decode($content);
       $data['bill'] = ['value' => 20000, 'currency'=> 'UAH'];
       
       // return $this->json($content, 200, ['Access-Control-Allow-Origin'=>'*']);
//       $response = new Response(json_encode($arr));
       $response = new JsonResponse($data);

//       $response->headers->set('Content-Type', 'application/json');

       $response->headers->set('Access-Control-Allow-Origin', '*');

       return $response;

    }
}
