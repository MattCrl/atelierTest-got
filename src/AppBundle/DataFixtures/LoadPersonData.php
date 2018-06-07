<?php
/**
 * Created by PhpStorm.
 * User: mattcrl
 * Date: 31/05/18
 * Time: 16:57
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPersonData extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $person = new Person();
        $person->setName('Stark');
        $person->setFirstname('Arya');
        $person->setGender('F');
        $person->setBiography('Le meilleur personnage de cette série');
        $person->setKingdom($this->getReference('kingdom1'));

        $manager->persist($person);

        $person = new Person();
        $person->setName('Daenerys');
        $person->setFirstname('Targaryen');
        $person->setGender('F');
        $person->setBiography('Mother of Dragons');
        $person->setKingdom($this->getReference('kingdom2'));

        $manager->persist($person);

        $person = new Person();
        $person->setName('DaenerysTwo');
        $person->setFirstname('Targaryen');
        $person->setGender('F');
        $person->setBiography('Mother of Dragons');
        $person->setKingdom($this->getReference('kingdom2'));

        $manager->persist($person);

        $person = new Person();
        $person->setName('DaenerysThree');
        $person->setFirstname('Targaryen');
        $person->setGender('F');
        $person->setBiography('Mother of Dragons');
        $person->setKingdom($this->getReference('kingdom2'));

        $manager->persist($person);

        $person = new Person();
        $person->setName('DaenerysFour');
        $person->setFirstname('Targaryen');
        $person->setGender('F');
        $person->setBiography('Mother of Dragons');
        $person->setKingdom($this->getReference('kingdom2'));

        $manager->persist($person);

        $person = new Person();
        $person->setName('DaenerysFive');
        $person->setFirstname('Targaryen');
        $person->setGender('F');
        $person->setBiography('Mother of Dragons');
        $person->setKingdom($this->getReference('kingdom2'));

        $manager->persist($person);

        $person = new Person();
        $person->setName('Jon');
        $person->setFirstname('Snow');
        $person->setGender('M');
        $person->setBiography('Tu ne sais rien, Jean Neige');
        $person->setKingdom($this->getReference('kingdom1'));

        $manager->persist($person);

        $person = new Person();
        $person->setName('Stark');
        $person->setFirstname('Sansa');
        $person->setGender('F');
        $person->setBiography('La soeur du meilleur personnage de la série');
        $person->setKingdom($this->getReference('kingdom1'));

        $manager->persist($person);
        $manager->flush();

    }

    public function getDependencies()
    {
        return [
            LoadKingdomData::class,
        ];
    }
}
