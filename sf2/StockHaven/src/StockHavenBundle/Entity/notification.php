<?php

namespace StockHavenBundle\Entity;

/**
 * notification
 */
class notification
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var bool
     */
    private $isValided;

    /**
     * @var \DateTime
     */
    private $createDate;

    /**
     * @var int
     */
    private $stockId;

    /**
     * @var bool
     */
    private $isView;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return notification
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set isValided
     *
     * @param boolean $isValided
     *
     * @return notification
     */
    public function setIsValided($isValided)
    {
        $this->isValided = $isValided;

        return $this;
    }

    /**
     * Get isValided
     *
     * @return bool
     */
    public function getIsValided()
    {
        return $this->isValided;
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     *
     * @return notification
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set stockId
     *
     * @param integer $stockId
     *
     * @return notification
     */
    public function setStockId($stockId)
    {
        $this->stockId = $stockId;

        return $this;
    }

    /**
     * Get stockId
     *
     * @return int
     */
    public function getStockId()
    {
        return $this->stockId;
    }

    /**
     * Set isView
     *
     * @param boolean $isView
     *
     * @return notification
     */
    public function setIsView($isView)
    {
        $this->isView = $isView;

        return $this;
    }

    /**
     * Get isView
     *
     * @return bool
     */
    public function getIsView()
    {
        return $this->isView;
    }
}
