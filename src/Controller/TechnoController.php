<?php


namespace App\Controller;


use App\Entity\Technos;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/techno")
 */
class TechnoController extends AbstractController
{
    /**
     * @Route("/new", name="techno_new", methods={"POST"})
     */
    public function new(Request $request)
    {
        $techno = new Technos();

        $techno->setUser($this->getUser());
        $techno
            ->setName($request->request->get("technoName"))
            ->setLogo($request->request->get("technoLogo"));
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($techno);
        $entityManager->flush();

        return $this->json(
            [],
            201
        );
    }

}