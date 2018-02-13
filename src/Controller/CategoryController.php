<?php

namespace App\Controller;

use App\Entity\Category;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use FOS\RestBundle\Controller\FOSRestController;


/**
 * Class CategoryController
 * @Rest\RouteResource("Categories", pluralize=false)
 * @package App\Controller
 */
class CategoryController extends FOSRestController
{

    /**
     * @return JsonResponse
     */
    public function getAction()
    {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        if (!$category) {
            return $this->json(['msg' => 'No category found'], 404, ['Access-Control-Allow-Origin' => '*']);
        }

        return $this->json($category, 200, ['Access-Control-Allow-Origin' => '*']);
    }

    /**

     * @param $id
     * @return Response
     */
    public function getShowAction($id)
    {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->find($id);

        if (!$category) {
            return $this->json(['msg' => 'No category found'], 404, ['Access-Control-Allow-Origin' => '*']);
        }

        return $this->json($category, 200, ['Access-Control-Allow-Origin' => '*']);
    }

    /**
     * @param Request $request
     */
    public function postAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();

        $category = new Category();
        $category->setName($request->get('name'));
        $category->setCapacity($request->get('capacity'));
        $category->setCreatedAt(new \DateTime());

        $manager->persist($category);
        $manager->flush();

        return $this->json($category, 200, ['Access-Control-Allow-Origin' => '*']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function putAction(Request $request)
    {
       $manager = $this->getDoctrine()->getManager();
       $category = $manager->getRepository(Category::class)->find($request->get('id'));

        if (!$category) {
            return $this->json(['msg' => 'No category found'], 404, ['Access-Control-Allow-Origin' => '*']);
        }

        $category->setName($request->get('name'));
        $category->setCapacity($request->get('capacity'));
        $manager->flush();

        return $this->json($category, 200, ['Access-Control-Allow-Origin' => '*']);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function deleteAction($id)
    {
        $manager  = $this->getDoctrine()->getManager();
        $category = $manager->getRepository(Category::class)->find($id);

        $manager->remove($category);
        $manager->flush();

        return $this->json(['status' => 'success'], 200, ['Access-Control-Allow-Origin' => '*']);
    }
}
