<?php

namespace WebTFEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Barcode
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebTFEBundle\Repository\BarcodeRepository")
 */
class Barcode
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToOne(targetEntity="WebTFEBundle\Entity\Stock", cascade={"persist"})
     * @ORM\OneToOne(targetEntity="WebTFEBundle\Entity\Item", cascade={"persist"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="barcode", type="string", length=255)
     */
    private $barcode;


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
     * Set barcode
     *
     * @param string $barcode
     * @return Barcode
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
}
