<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Goods;
use App\Entity\Categories;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class GoodsController extends AbstractController
{
    /**
     * @Route("/goods", name="show_goods")
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
