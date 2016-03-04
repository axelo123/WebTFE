<?php

namespace WebTFE\WebTFEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * save_operation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebTFE\WebTFEBundle\Entity\save_operationRepository")
 */
class save_operation
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
     * @ORM\Column(name="Id_stock", type="integer")
     */
    private $idStock;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_operation", type="integer")
     */
    private $idOperation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_modification", type="datetime")
     */
    private $dateModification;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Hour_modification", type="time")
     */
    private $hourModification;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_user", type="integer")
     */
    private $idUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_article", type="integer")
     */
    private $idArticle;


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
     * Set idStock
     *
     * @param integer $idStock
     * @return save_operation
     */
    public function setIdStock($idStock)
    {
        $this->idStock = $idStock;

        return $this;
    }

    /**
     * Get idStock
     *
     * @return integer 
     */
    public function getIdStock()
    {
        return $this->idStock;
    }

    /**
     * Set idOperation
     *
     * @param integer $idOperation
     * @return save_operation
     */
    public function setIdOperation($idOperation)
    {
        $this->idOperation = $idOperation;

        return $this;
    }

    /**
     * Get idOperation
     *
     * @return integer 
     */
    public function getIdOperation()
    {
        return $this->idOperation;
    }

    /**
     * Set dateModification
     *
     * @param \DateTime $dateModification
     * @return save_operation
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    /**
     * Get dateModification
     *
     * @return \DateTime 
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * Set hourModification
     *
     * @param \DateTime $hourModification
     * @return save_operation
     */
    public function setHourModification($hourModification)
    {
        $this->hourModification = $hourModification;

        return $this;
    }

    /**
     * Get hourModification
     *
     * @return \DateTime 
     */
    public function getHourModification()
    {
        return $this->hourModification;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     * @return save_operation
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
     * Set idArticle
     *
     * @param integer $idArticle
     * @return save_operation
     */
    public function setIdArticle($idArticle)
    {
        $this->idArticle = $idArticle;

        return $this;
    }

    /**
     * Get idArticle
     *
     * @return integer 
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }
}
