<?php


namespace App\Controller;

use App\Entity\Skill;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SkillController
 * @Route("/skill")
 * @package App\Controller
 */
class SkillController extends AbstractController
{
    /**
     * @Route("/new", name="skill_new", methods={"POST"})
     */
    public function new(Request $request)
    {
        $skill = new Skill();

        $skill->setUser($this->getUser());
        $skill
            ->setName($request->request->get("skillName"))
            ->setLevel($request->request->get("skillLevel"));
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($skill);
        $entityManager->flush();

        return $this->json(
            [],
            201
        );
    }

}