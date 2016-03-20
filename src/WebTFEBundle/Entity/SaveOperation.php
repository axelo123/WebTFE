<?php

namespace WebTFEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Add
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebTFEBundle\Repository\SaveOperationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class SaveOperation
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
     * @var Stock
     *
     * @ORM\ManyToOne(targetEntity="WebTFEBundle\Entity\Stock")
     * @ORM\JoinColumn(name="stockId", referencedColumnName="id")
     */
    private $stockId;

    /**
     * @var Operation
     *
     *
     * @ORM\OneToOne(targetEntity="WebTFEBundle\Entity\Operation", cascade={"persist"})
     * @ORM\JoinColumn(name="operationId", referencedColumnName="id")
     */
    private $operationId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modification_date", type="datetimetz")
     */
    private $modificationDate;

    /**
     * @var User
     *
     */
    private $userId;

    /**
     * @var Item
     *
     * @ORM\ManyToOne(targetEntity="WebTFEBundle\Entity\Item")
     * @ORM\JoinColumn(name="articleId", referencedColumnName="id")
     *
     */
    private $articleId;


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
     * Set stockId
     *
     * @param Stock $stockId
     * @return SaveOperation
     */
    public function setStockId($stockId)
    {
        $this->stockId = $stockId;

        return $this;
    }

    /**
     * Get stockId
     *
     * @return Stock
     */
    public function getStockId()
    {
        return $this->stockId;
    }

    /**
     * Set operationId
     *
     * @param Operation $operationId
     * @return SaveOperation
     */
    public function setOperationId($operationId)
    {
        $this->operationId = $operationId;

        return $this;
    }

    /**
     * Get operationId
     *
     * @return Operation
     */
    public function getOperationId()
    {
        return $this->operationId;
    }

    /**
     * Set modificationDate
     *
     * @param \DateTime $modificationDate
     * @return SaveOperation
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;

        return $this;
    }

    /**
     * Get modificationDate
     *
     * @return \DateTime 
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * Set userId
     *
     * @param User $userId
     * @return SaveOperation
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return User
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set articleId
     *
     * @param Item $articleId
     * @return SaveOperation
     */
    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;

        return $this;
    }

    /**
     * Get articleId
     *
     * @return Item
     */
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * @ORM\PreFlush
     * @return $this
     */
    public function createModificationDate()
    {
        $this->modificationDate=new \DateTime();
        return $this;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stockId = new \Doctrine\Common\Collections\ArrayCollection();
        $this->articleId = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add stockId
     *
     * @param \WebTFEBundle\Entity\Stock $stockId
     * @return SaveOperation
     */
    public function addStockId(\WebTFEBundle\Entity\Stock $stockId)
    {
        $this->stockId[] = $stockId;

        return $this;
    }

    /**
     * Remove stockId
     *
     * @param \WebTFEBundle\Entity\Stock $stockId
     */
    public function removeStockId(\WebTFEBundle\Entity\Stock $stockId)
    {
        $this->stockId->removeElement($stockId);
    }

    /**
     * Add articleId
     *
     * @param \WebTFEBundle\Entity\Item $articleId
     * @return SaveOperation
     */
    public function addArticleId(\WebTFEBundle\Entity\Item $articleId)
    {
        $this->articleId[] = $articleId;

        return $this;
    }

    /**
     * Remove articleId
     *
     * @param \WebTFEBundle\Entity\Item $articleId
     */
    public function removeArticleId(\WebTFEBundle\Entity\Item $articleId)
    {
        $this->articleId->removeElement($articleId);
    }
}
