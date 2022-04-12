<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
/**
 * @codeCoverageIgnore
 */
class TaskFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i < 20; $i++) {
            $task = (new Task())
                ->setCreatedAt(new \DateTime())
                ->setTitle('Task'.$i)
                ->setContent('contenu'.$i)
                ->setIsDone(0);
            $manager->persist($task);
        }
        $manager->flush();
    }
}
