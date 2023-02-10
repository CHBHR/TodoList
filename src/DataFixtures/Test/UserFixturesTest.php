<?php

namespace App\DataFixtures\Test;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixturesTest extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setUsername('UserStub1');
        $user1->setEmail('user1@test.com');
        $user1->setPassword($this->encoder->encodePassword($user1, 'test'));
        $user1->setRoles(['ROLE_ADMIN']);
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('UserStub2');
        $user2->setEmail('user2@test.com');
        $user2->setPassword($this->encoder->encodePassword($user2, 'test'));
        $manager->persist($user2);

        $user3 = new User();
        $user3->setUsername('UserStub3');
        $user3->setEmail('user3@test.com');
        $user3->setPassword($this->encoder->encodePassword($user3, 'test'));
        $manager->persist($user3);

        $manager->flush();

        $this->addReference('user1', $user1);
        $this->addReference('user2', $user2);
        $this->addReference('user3', $user3);
    }
}