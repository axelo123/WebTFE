<?php

namespace WebTFEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article_Stock
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebTFEBundle\Repository\Article_StockRepository")
 */
class Article_Stock
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
     * @var Item
     *
     * @ORM\ManyToOne(targetEntity="WebTFEBundle\Entity\Stock",inversedBy="articleId")
     * @ORM\JoinColumn(name="articleId", referencedColumnName="id")
     */
    private $articleId;

    /**
     * @var Stock
     *
     * @ORM\ManyToOne(targetEntity="WebTFEBundle\Entity\Item",inversedBy="stockId")
     * @ORM\JoinColumn(name="stockId", referencedColumnName="id")
     */
    private $stockId;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;


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
     * Set articleId
     *
     * @param Item $articleId
     * @return Article_Stock
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
     * Set stockId
     *
     * @param Stock $stockId
     * @return Article_Stock
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
     * Set quantity
     *
     * @param integer $quantity
     * @return Article_Stock
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
}
