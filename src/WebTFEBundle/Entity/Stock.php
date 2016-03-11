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
     * @ORM\OneToMany(targetEntity="WebTFEBundle\Entity\Add", mappedBy="stockId")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="WebTFEBundle\Entity\User")
     * @ORM\JoinColumn(name="userCreatorId", referencedColumnName="id")
     */
    private $userCreatorId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_delete", type="boolean")
     */
    private $isDelete;

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
     * @param User $userCreatorId
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
     * @return User
     */
    public function getUserCreatorId()
    {
        return $this->userCreatorId;
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

    /**
     * Set barcodeId
     *
     * @param Barcode $barcodeId
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
     * @return Barcode
     */
    public function getBarcodeId()
    {
        return $this->barcodeId;
    }
}
