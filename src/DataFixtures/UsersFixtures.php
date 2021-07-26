<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Users;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UsersFixtures extends Fixture
{
    public const MAX_USERS = 23;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < self::MAX_USERS; $i++) {
            $users = new Users();
            $users->setName($faker->name());
            $users->setLastname($faker->lastname());
            $users->setAge($faker->numberBetween(18, 100));
            $users->setWeight($faker->numberBetween(55, 150));
            $users->setRoleCoach($faker->sentence(3));
            $users->setRoleLicensee($faker->sentence(3));

            $manager->persist($users);
            $this->addReference('Users' . $i, $users);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          UsersFixtures::class,
          PlanningFixtures::class,
        ];
    }
}
