<?php 

namespace AppBundle\DataFixtures\Test\ORM;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UserFixturesTest extends Fixture implements ContainerAwareInterface
{
    private $encoder;

    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->encoder = $container->get('security.password_encoder');
    }

    public function load(ObjectManager $manager)
    {

        $user1 = new User();
        $user1->setUsername('userStub1');
        $user1->setEmail('userstub1@test.fr');
		$user1->setPassword($this->encoder->encodePassword($user1,'userstub1'));
		$user1->setRoles(['ROLE_ADMIN']);
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('userStub2');
        $user2->setEmail('userstub2@test.fr');
		$user2->setPassword($this->encoder->encodePassword($user2,'userstub2'));
		$user2->setRoles(['ROLE_USER']);
        $manager->persist($user2);

        $user3 = new User();
        $user3->setUsername('userStub3');
        $user3->setEmail('userstub3@test.fr');
		$user3->setPassword($this->encoder->encodePassword($user3,'userstub3'));
		$user3->setRoles(['ROLE_USER']);
        $manager->persist($user3);

        $manager->flush();

        $this->addReference('user', $user1);
        $this->addReference('user', $user2);
        $this->addReference('user', $user3);
    }
}