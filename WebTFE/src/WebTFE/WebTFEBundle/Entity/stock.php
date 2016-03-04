<?php

namespace WebTFE\WebTFEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * stock
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebTFE\WebTFEBundle\Entity\stockRepository")
 */
class stock
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
     * @var integer
     *
     * @ORM\Column(name="Id_user_creator", type="integer")
     */
    private $idUserCreator;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsDelete", type="boolean")
     */
    private $isDelete;


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
     * @return stock
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
     * Set idUserCreator
     *
     * @param integer $idUserCreator
     * @return stock
     */
    public function setIdUserCreator($idUserCreator)
    {
        $this->idUserCreator = $idUserCreator;

        return $this;
    }

    /**
     * Get idUserCreator
     *
     * @return integer 
     */
    public function getIdUserCreator()
    {
        return $this->idUserCreator;
    }

    /**
     * Set isDelete
     *
     * @param boolean $isDelete
     * @return stock
     */
    public function setIsDelete($isDelete)
    {
        $this->isDelete = $isDelete;

        return $this;
    }

    /**
     * Get isDelete
     *
     * @return boolean 
     */
    public function getIsDelete()
    {
        return $this->isDelete;
    }
}
