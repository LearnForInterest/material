<?php
namespace Entity;
use Entity\Repository\MaterialRepository;

/**
 * Material
 *
 * @Table(name="material", options={"collate"="utf8_general_ci","charset"="utf8"})
 * @Entity(repositoryClass="Entity\Repository\MaterialRepository")
 */
class Material extends MaterialRepository{

    /**
     * @var integer
     *
     * @Column(name="unique_code", type="integer", nullable=false, options={"comment": "材料id"})
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $materialId;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=50, nullable=false, options={"comment": "材料名称"})
     */
    private $materialName;

    /**
     * @var string
     *
     * @Column(name="des", type="string", length=200, nullable=true, options={"comment": "材料描述"})
     */
    private $materialDes;

    /**
     * @var decimal
     *
     * @Column(name="price", type="decimal", precision=8, nullable=false, options={"comment": "材料价格"})
     */
    private $materialPrice;

    /**
     * @var integer
     *
     * @Column(name="num", type="integer", nullable=false, options={"comment": "材料库存"})
     */
    private $materialNum;

    public function __construct()
    {

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
     * Set materialName
     *
     * @param string $materialName
     *
     * @return Material
     */
    public function setMaterialName($materialName)
    {
        $this->materialName = $materialName;

        return $this;
    }

    /**
     * Get materialName
     *
     * @return string
     */
    public function getMaterialName()
    {
        return $this->materialName;
    }

    /**
     * Set materialDes
     *
     * @param string $materialDes
     *
     * @return Material
     */
    public function setMaterialDes($materialDes)
    {
        $this->materialDes = $materialDes;

        return $this;
    }

    /**
     * Get materialDes
     *
     * @return string
     */
    public function getMaterialDes()
    {
        return $this->materialDes;
    }

    /**
     * Set materialPrice
     *
     * @param string $materialPrice
     *
     * @return Material
     */
    public function setMaterialPrice($materialPrice)
    {
        $this->materialPrice = $materialPrice;

        return $this;
    }

    /**
     * Get materialPrice
     *
     * @return string
     */
    public function getMaterialPrice()
    {
        return $this->materialPrice;
    }

    /**
     * Set materialNum
     *
     * @param integer $materialNum
     *
     * @return Material
     */
    public function setMaterialNum($materialNum)
    {
        $this->materialNum = $materialNum;

        return $this;
    }

    /**
     * Get materialNum
     *
     * @return integer
     */
    public function getMaterialNum()
    {
        return $this->materialNum;
    }
}
