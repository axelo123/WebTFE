<?php

namespace WebTFEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stock
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebTFEBundle\Repository\StockRepository")
 */
class Stock
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_creator_id", type="integer")
     */
    private $userCreatorId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_delete", type="boolean")
     */
    private $isDelete;

    /**
     * @var integer
     *
     * @ORM\Column(name="barcode_id", type="integer")
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
     * @return Stock
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
     * Set userCreatorId
     *
     * @param integer $userCreatorId
     * @return Stock
     */
    public function setUserCreatorId($userCreatorId)
    {
        $this->userCreatorId = $userCreatorId;

        return $this;
    }

    /**
     * Get userCreatorId
     *
     * @return integer 
     */
    public function getUserCreatorId()
    {
        return $this->userCreatorId;
    }

    /**
     * Set isDelete
     *
     * @param boolean $isDelete
     * @return Stock
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
     * Set barcodeId
     *
     * @param integer $barcodeId
     * @return Stock
     */
    public function setBarcodeId($barcodeId)
    {
        $this->barcodeId = $barcodeId;

        return $this;
    }

    /**
     * Get barcodeId
     *
     * @return integer 
     */
    public function getBarcodeId()
    {
        return $this->barcodeId;
    }
}
