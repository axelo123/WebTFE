<?php

namespace WebTFE\WebTFEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * item-stock
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebTFE\WebTFEBundle\Entity\item_stockRepository")
 */
class item_stock
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
     * @ORM\Column(name="Id_article", type="integer")
     */
    private $idArticle;

    /**
     * @var integer
     *
     * @ORM\Column(name="Quantity", type="integer")
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
     * Set idStock
     *
     * @param integer $idStock
     * @return item-stock
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
     * Set idArticle
     *
     * @param integer $idArticle
     * @return item-stock
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

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return item-stock
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
