<?php
/**
 * Created by PhpStorm.
 * User: mattcrl
 * Date: 31/05/18
 * Time: 16:57
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\Kingdom;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadKingdomData extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $kingdom = new Kingdom();
        $kingdom->setName('France');
        $kingdom->setCapital('Paris');
        $kingdom->setNbInhabitant(10000);

        $manager->persist($kingdom);

        $this->addReference('kingdom1', $kingdom);

        $kingdom = new Kingdom();
        $kingdom->setName('Espagne');
        $kingdom->setCapital('Madrid');
        $kingdom->setNbInhabitant(10000);

        $manager->persist($kingdom);
        $manager->flush();
        
        $this->addReference('kingdom2', $kingdom);
    }
}