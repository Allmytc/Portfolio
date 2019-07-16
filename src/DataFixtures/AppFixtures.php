<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail("quentin.bisiaux@gmail.com")
            ->setFirstName("Quentin")
            ->setLastName("BISIAUX")
            ->setAdress("9 cours Albert Thomas")
            ->setCity("Lyon")
            ->setCountry("France")
            ->setBirthday(new \DateTime("1992-06-17"))
            ->setPhone("06.58.74.41.73")
            ->setCv("waiting")
            ->setTitle("Développeur Backend Symfony")
            ->setDescription(
                "Après avoir pris goût à l'apprentissage du développement web en autodidacte lors de ma création d'entreprise, 
                je souhaite me spécialiser dans ce domaine. Actuellement en fin de formation PHP Symfony 4 , 
                je recherche une première expérience pour développer et mettre en action mes compétences."
            )
        ;
        $manager->persist($user);
        $manager->flush();
    }
}
