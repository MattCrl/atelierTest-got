<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kingdom
 *
 * @ORM\Table(name="kingdom")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\KingdomRepository")
 */
class Kingdom
{
    /**
     * @ORM\OneToMany(targetEntity="Person", mappedBy="kingdom")
     */
    private $persons;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="capital", type="string", length=50)
     */
    private $capital;

    /**
     * @var int
     *
     * @ORM\Column(name="nbInhabitant", type="integer")
     */
    private $nbInhabitant;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Kingdom
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set capital
     *
     * @param string $capital
     *
     * @return Kingdom
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * Get capital
     *
     * @return string
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Set nbInhabitant
     *
     * @param integer $nbInhabitant
     *
     * @return Kingdom
     */
    public function setNbInhabitant($nbInhabitant)
    {
        $this->nbInhabitant = $nbInhabitant;

        return $this;
    }

    /**
     * Get nbInhabitant
     *
     * @return int
     */
    public function getNbInhabitant()
    {
        return $this->nbInhabitant;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->persons = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add person
     *
     * @param \AppBundle\Entity\Person $person
     *
     * @return Kingdom
     */
    public function addPerson(\AppBundle\Entity\Person $person)
    {
        $this->persons[] = $person;

        return $this;
    }

    /**
     * Remove person
     *
     * @param \AppBundle\Entity\Person $person
     */
    public function removePerson(\AppBundle\Entity\Person $person)
    {
        $this->persons->removeElement($person);
    }

    /**
     * Get persons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersons()
    {
        return $this->persons;
    }
}
