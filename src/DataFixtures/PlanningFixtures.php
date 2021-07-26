<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Planning;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PlanningFixtures extends Fixture
{
    public const MAX_PLANNING = 23;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < self::MAX_PLANNING; $i++) {
            $planning = new Planning();
            $planning->setDate($faker->dateTime());
            // $planning->setDays($faker->dayOfWeek());

            $manager->persist($planning);
            $this->addReference('Planning' . $i, $planning);
        }
        $manager->flush();
    }
}
