<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{   
    public const USERS = 23;

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {  
        $faker = Factory::create();

        $user = new User();
        $user->setEmail('shapeandboxing@gmail.com');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'boxing'
        ));

        $manager->persist($user);

        $admin = new User();
        $admin->setEmail('shaperboxer@gmail.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'boxer'
        ));
        $manager->persist($admin);

        for($i=0; $i<self::USERS; $i++){
            $user = new User();
            $user->setEmail($faker->email());
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'boxingday'
        ));
        $manager->persist($user);
        }
        $manager->flush();
    }
}
