<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Goods;
use App\Entity\Categories;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

use App\Form\GoodsType;
use Symfony\Component\HttpFoundation\Request;

class GoodsController extends AbstractController
{
    /**
     * @Route("/goods", name="goods_list")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Goods::class);
        $goods = $repository->findAll();

	    $repository = $this->getDoctrine()->getRepository(Categories::class);
        $category = $repository->findAll();

        return $this->render('goods/index.html.twig', [
            'goods' => $goods
        ]);
    }

    /**
     * @Route("/goods/{id}", name="goods_item")
     */
    public function show($id)
    {
        $goods = $this->getDoctrine()
            ->getRepository(Goods::class)
            ->find($id);

        if (!$goods) {
            throw $this->createNotFoundException(
                'No goods found for id '.$id
            );
        }

        return $this->render('goods/show.html.twig', [
            'goods' => $goods
        ]);
    }

    /**
     * @Route("/goods_new", name="goods_new")
     */
    public function new(Request $request)
    {
        $goods = new Goods();

        $form = $this->createForm(GoodsType::class, $goods);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($goods);
            // $entityManager->flush();
            return new Response('New goods successfully saved!');
        }
        
        return $this->render('goods/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // public function createGoods(): Response
    // {
    //     $entityManager = $this->getDoctrine()->getManager();

    //     $goods = new Goods();
    //     $goods->setTitle('Tunic');
    //     $goods->setDescription('Printed Oversized Tunic');
    //     $goods->setPrice('10.99');
    //     $goods->setCategory(2);

    //     // save the Product (no queries yet)
    //     $entityManager->persist($goods);

    //     // actually executes the queries (i.e. the INSERT query)
    //     $entityManager->flush();

    //     return new Response('Saved new goods with id '.$goods->getId());
    // }
}
