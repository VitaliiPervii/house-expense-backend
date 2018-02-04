<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 20.01.2018
 * Time: 16:13
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class FirstController
{
    /**
     * @Route("/")
     *
     */
    public function index()
    {
        return new Response('Hello world!');
    }

    /**
     * @Route("/show/{slug}")
     *
     */
    public function show($slug)
    {
        return new Response('Page show!'. $slug);
    }
}