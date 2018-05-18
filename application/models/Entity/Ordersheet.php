<?php
namespace Entity;
use Entity\Repository\OrdersheetRepository;

/**
 * Ordersheet
 *
 * @Table(name="ordersheet", options={"collate"="utf8_general_ci","charset"="utf8"})
 * @Entity(repositoryClass="Entity\Repository\OrdersheetRepository")
 */
class Ordersheet extends OrdersheetRepository{

    /**
     * @var integer
     *
     * @Column(name="order_id", type="integer", nullable=false, options={"comment": "订单id"})
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $orderId;

    /**
     * @var integer
     *
     * @Column(name="material_id", type="integer", nullable=false, options={"comment": "材料id"})
     * @Id
     * @GeneratedValue(strategy="NONE")
     */
    private $materialId;

    /**
     * @var integer
     *
     * @Column(name="need_num", type="integer", nullable=false, options={"comment": "需求量"})
     */
    private $needNum;

    public function __construct()
    {

    }


    /**
     * Set orderId
     *
     * @param integer $orderId
     *
     * @return Ordersheet
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return integer
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set materialId
     *
     * @param integer $materialId
     *
     * @return Ordersheet
     */
    public function setMaterialId($materialId)
    {
        $this->materialId = $materialId;

        return $this;
    }

    /**
     * Get materialId
     *
     * @return integer
     */
    public function getMaterialId()
    {
        return $this->materialId;
    }

    /**
     * Set needNum
     *
     * @param integer $needNum
     *
     * @return Ordersheet
     */
    public function setNeedNum($needNum)
    {
        $this->needNum = $needNum;

        return $this;
    }

    /**
     * Get needNum
     *
     * @return integer
     */
    public function getNeedNum()
    {
        return $this->needNum;
    }
}
