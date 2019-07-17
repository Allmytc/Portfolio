<?php

namespace App\Controller;

use App\Entity\Language;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class LanguageController
 * @Route("/language")
 * @package App\Controller
 */
class LanguageController extends AbstractController
{
    /**
     * @Route("/new", name="language_new", methods={"POST"})
     */
    public function new(Request $request)
    {
        $language = new Language();

        $language->setUser($this->getUser());
        $language
            ->setName($request->request->get("languageName"))
            ->setLevel($request->request->get("languageLevel"));
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($language);
        $entityManager->flush();

        return $this->json(
            [],
            201
        );
    }
}
