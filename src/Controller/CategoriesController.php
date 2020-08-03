<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Categories;
use App\Entity\Goods;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

use App\Form\CategoriesType;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     * @Route("/categories/{id}", name="categories_item")
     */
    public function show($id)
    {
        $categories = $this->getDoctrine()
            ->getRepository(Categories::class)
            ->find($id);

        if (!$categories) {
            throw $this->createNotFoundException(
                'No categories found for id '.$id
            );
        }

        $repository = $this->getDoctrine()->getRepository(Goods::class);
        $goods = $repository->findBy(['category' => $id]);

        return $this->render('categories/show.html.twig', [
            'categories' => $categories,
            'goods' => $goods
        ]);
    }

    /**
     * @Route("/categories_new", name="new_categories")
     */
    public function new(Request $request)
    {
        $categories = new Categories();

        $form = $this->createForm(CategoriesType::class, $categories);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categories);
            $entityManager->flush();
            return new Response('New category successfully saved!');
        }

        return $this->render('categories/new.html.twig', [
            'form' => $form->createView(),
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
