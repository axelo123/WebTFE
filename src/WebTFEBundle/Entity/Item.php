<?php

namespace WebTFEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebTFEBundle\Repository\ItemRepository")
 */
class Item
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="WebTFEBundle\Entity\Add", mappedBy="articleId")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var Type
     *
     * @ORM\OneToOne(targetEntity="WebTFEBundle\Entity\Type", cascade={"persist"})
     * @ORM\JoinColumn(name="typeId", referencedColumnName="id")
     */
    private $typeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_delete", type="boolean")
     */
    private $isDelete;

    /**
     * @var integer
     *
     * @ORM\Column(name="count_update", type="integer")
     */
    private $countUpdate;

    /**
     * @var Currency
     *
     * @ORM\OneToOne(targetEntity="WebTFEBundle\Entity\Currency", cascade={"persist"})
     * @ORM\JoinColumn(name="currencyId", referencedColumnName="id")
     */
    private $currencyId;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var Barcode
     *
     * @ORM\OneToOne(targetEntity="WebTFEBundle\Entity\Barcode", cascade={"persist"})
     * @ORM\JoinColumn(name="barcodeId", referencedColumnName="id")
     */
    private $barcodeId;


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
     * @return Item
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
     * Set typeId
     *
     * @param Type $typeId
     * @return Item
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * Get typeId
     *
     * @return Type
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Item
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
     * Set isDelete
     *
     * @param boolean $isDelete
     * @return Item
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
     * @return Item
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
     * Set currencyId
     *
     * @param Currency $currencyId
     * @return Item
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;

        return $this;
    }

    /**
     * Get currencyId
     *
     * @return Currency
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Item
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Item
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

    /**
     * Set barcodeId
     *
     * @param Barcode $barcodeId
     * @return Item
     */
    public function setBarcodeId($barcodeId)
    {
        $this->barcodeId = $barcodeId;

        return $this;
    }

    /**
     * Get barcodeId
     *
     * @return Barcode
     */
    public function getBarcodeId()
    {
        return $this->barcodeId;
    }
}
