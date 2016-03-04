<?php

namespace WebTFE\WebTFEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * user_role
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebTFE\WebTFEBundle\Entity\user_roleRepository")
 */
class user_role
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
     * @var integer
     *
     * @ORM\Column(name="Id_user", type="integer")
     */
    private $idUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_role", type="integer")
     */
    private $idRole;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_parent", type="integer")
     */
    private $idParent;


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
     * Set idUser
     *
     * @param integer $idUser
     * @return user_role
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idRole
     *
     * @param integer $idRole
     * @return user_role
     */
    public function setIdRole($idRole)
    {
        $this->idRole = $idRole;

        return $this;
    }

    /**
     * Get idRole
     *
     * @return integer 
     */
    public function getIdRole()
    {
        return $this->idRole;
    }

    /**
     * Set idParent
     *
     * @param integer $idParent
     * @return user_role
     */
    public function setIdParent($idParent)
    {
        $this->idParent = $idParent;

        return $this;
    }

    /**
     * Get idParent
     *
     * @return integer 
     */
    public function getIdParent()
    {
        return $this->idParent;
    }
}
