<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Categories;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends AbstractController
{
    /**
     * @Route("/categories", name="categories_show")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Categories::class);
        $categories = $repository->findAll();

        return $this->render('categories/index.html.twig', [
            'categories' => $categories
        ]);
    }

    //  public function createCategories(): Response
    // {
    //     $entityManager = $this->getDoctrine()->getManager();

    //     $categories = new Categories();
    //     $categories->setTitle('Kids');

    //     // save the Product (no queries yet)
    //     $entityManager->persist($categories);

    //     // actually executes the queries (i.e. the INSERT query)
    //     $entityManager->flush();

    //     return new Response('Saved new categories with id '.$categories->getId());
    // }

}
