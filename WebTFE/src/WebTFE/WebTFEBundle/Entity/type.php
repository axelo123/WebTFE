<?php

namespace WebTFE\WebTFEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * type
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebTFE\WebTFEBundle\Entity\typeRepository")
 */
class type
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_expire", type="datetime")
     */
    private $dateExpire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_add", type="datetime")
     */
    private $dateAdd;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return type
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
     * Set dateExpire
     *
     * @param \DateTime $dateExpire
     * @return type
     */
    public function setDateExpire($dateExpire)
    {
        $this->dateExpire = $dateExpire;

        return $this;
    }

    /**
     * Get dateExpire
     *
     * @return \DateTime 
     */
    public function getDateExpire()
    {
        return $this->dateExpire;
    }

    /**
     * Set dateAdd
     *
     * @param \DateTime $dateAdd
     * @return type
     */
    public function setDateAdd($dateAdd)
    {
        $this->dateAdd = $dateAdd;

        return $this;
    }

    /**
     * Get dateAdd
     *
     * @return \DateTime 
     */
    public function getDateAdd()
    {
        return $this->dateAdd;
    }
}
