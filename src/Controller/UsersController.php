<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends AbstractController
{
    /**
     * @Route("/users", name="create_users")
     */
    public function index()
    {
        return $this->render('users/index.html.twig', [
            'controller_name' => 'UsersController',
        ]);
    }

    // public function createUsers(): Response
    // {
    //     $entityManager = $this->getDoctrine()->getManager();

    //     $users = new Users();
    //     $users->setFirstName('Ivan');
    //     $users->setLastName('Shevchenko');
    //     $users->setPhone('+380501234567');
    //     $users->setEmail('ivan@i.ua');

    //     // save the Product (no queries yet)
    //     $entityManager->persist($users);

    //     // actually executes the queries (i.e. the INSERT query)
    //     $entityManager->flush();

    //     return new Response('Saved new user with id '.$users->getId());
    // }
}
