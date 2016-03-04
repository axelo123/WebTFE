<?php

namespace WebTFE\WebTFEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * item
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebTFE\WebTFEBundle\Entity\itemRepository")
 */
class item
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
     * @ORM\Column(name="Id_type", type="integer")
     */
    private $idType;

    /**
     * @var integer
     *
     * @ORM\Column(name="Quantity", type="integer")
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="Barcode", type="string", length=255)
     */
    private $barcode;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsDelete", type="boolean")
     */
    private $isDelete;

    /**
     * @var integer
     *
     * @ORM\Column(name="Count_update", type="integer")
     */
    private $countUpdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_currency", type="integer")
     */
    private $idCurrency;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text")
     */
    private $description;


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
     * @return item
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
     * Set idType
     *
     * @param integer $idType
     * @return item
     */
    public function setIdType($idType)
    {
        $this->idType = $idType;

        return $this;
    }

    /**
     * Get idType
     *
     * @return integer 
     */
    public function getIdType()
    {
        return $this->idType;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return item
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set barcode
     *
     * @param string $barcode
     * @return item
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;

        return $this;
    }

    /**
     * Get barcode
     *
     * @return string 
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * Set isDelete
     *
     * @param boolean $isDelete
     * @return item
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

    /**
     * Set countUpdate
     *
     * @param integer $countUpdate
     * @return item
     */
    public function setCountUpdate($countUpdate)
    {
        $this->countUpdate = $countUpdate;

        return $this;
    }

    /**
     * Get countUpdate
     *
     * @return integer 
     */
    public function getCountUpdate()
    {
        return $this->countUpdate;
    }

    /**
     * Set idCurrency
     *
     * @param integer $idCurrency
     * @return item
     */
    public function setIdCurrency($idCurrency)
    {
        $this->idCurrency = $idCurrency;

        return $this;
    }

    /**
     * Get idCurrency
     *
     * @return integer 
     */
    public function getIdCurrency()
    {
        return $this->idCurrency;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return item
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return item
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}
