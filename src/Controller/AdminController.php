<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/admin", name="admin")
     */
    public function index(ProjectRepository $projectRepository)
    {
        return $this->render('admin/index.html.twig', [
            'projects' => $projectRepository->findAll(),
        ]);
    }
}
