<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CvController extends AbstractController
{
    /**
     * @Route("/cv", name="cv")
     */
    public function index(UserRepository $userRepository)
    {
        $user = $userRepository->findBy([]);
        return $this->render('cv/index.html.twig', [
            'user' => $user[0],
        ]);
    }
}
