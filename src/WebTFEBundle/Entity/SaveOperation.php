<?php

namespace WebTFEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SaveOperation
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
     * @var integer
     *
     * @ORM\Column(name="stock_id", type="integer")
     */
    private $stockId;

    /**
     * @var integer
     *
     * @ORM\Column(name="operation_id", type="integer")
     */
    private $operationId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modification_date", type="datetimetz")
     */
    private $modificationDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="article_id", type="integer")
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
     * @param integer $stockId
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
     * @return integer 
     */
    public function getStockId()
    {
        return $this->stockId;
    }

    /**
     * Set operationId
     *
     * @param integer $operationId
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
     * @return integer 
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
     * @param integer $userId
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
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set articleId
     *
     * @param integer $articleId
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
     * @return integer 
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
}
