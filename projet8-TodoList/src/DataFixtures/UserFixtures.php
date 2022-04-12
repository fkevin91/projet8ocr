<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * @codeCoverageIgnore
 */
class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i < 20; $i++) { 
            $user = (new User())
                ->setUsername('usertest'.$i)
                ->setPassword('azerty')
                ->setEmail('aze'.$i.'@gmail.com');
            $manager->persist($user);
        }
        // ajouter un hachage au mot de passe

        $manager->flush();
    }
}
