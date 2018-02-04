<?php

namespace App\Controller;

use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;


class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(SerializerInterface $serializer)
    {
        $entity   = $this->getDoctrine()->getRepository(User::class);
        $users    = $serializer->serialize($entity->findAll(), 'json');
        $response = new Response($users);

        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/users")
     */
    public function find(SerializerInterface $serializer, Request $request)
    {
        $email    =  $request->query->get('email');
        $entity   = $this->getDoctrine()->getRepository(User::class);
        $user     = $entity->findOneBy(['email' => $email]);
        // $userJson = $serializer->serialize($user, 'json');
        // $response = new Response($userJson);

        // $response->headers->set('Content-Type', 'application/json');
        // $response->headers->set('Access-Control-Allow-Origin', '*');

        // return $response;
        return $this->json($user, 200, ['Access-Control-Allow-Origin'=>'*']);
    }
}
