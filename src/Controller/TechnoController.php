<?php


namespace App\Controller;


use App\Entity\Technos;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

    /**
     * @Route("/{id}", name="techno_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Technos $techno): Response
    {
        if ($this->isCsrfTokenValid('delete'.$techno->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($techno);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin');
    }

}