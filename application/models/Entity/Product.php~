<?php
namespace Entity;
use Entity\Repository\ProductRepository;

/**
 * Product
 *
 * @Table(name="product", options={"collate"="utf8_general_ci","charset"="utf8"})
 * @Entity(repositoryClass="Entity\Repository\ProductRepository")
 */
class Product extends ProductRepository{

    /**
     * @var integer
     *
     * @Column(name="prod_id", type="integer", nullable=false, options={"comment": "产品id"})
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $productId;

    /**
     * @var string
     *
     * @Column(name="customer", type="string", length=200, nullable=false, options={"comment": "客户"})
     */
    private $productCustomer;

    /**
     * @var string
     *
     * @Column(name="desprition", type="string", length=200, nullable=true, options={"comment": "产品描述"})
     */
    private $productDes;

    /**
     * @var decimal
     *
     * @Column(name="total_price", type="decimal", precision=8, nullable=false, options={"comment": "产品总价"})
     */
    private $productTotalPrice;

    public function __construct()
    {

    }


    /**
     * Get productId
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set productCustomer
     *
     * @param string $productCustomer
     *
     * @return Product
     */
    public function setProductCustomer($productCustomer)
    {
        $this->productCustomer = $productCustomer;

        return $this;
    }

    /**
     * Get productCustomer
     *
     * @return string
     */
    public function getProductCustomer()
    {
        return $this->productCustomer;
    }

    /**
     * Set productDes
     *
     * @param string $productDes
     *
     * @return Product
     */
    public function setProductDes($productDes)
    {
        $this->productDes = $productDes;

        return $this;
    }

    /**
     * Get productDes
     *
     * @return string
     */
    public function getProductDes()
    {
        return $this->productDes;
    }

    /**
     * Set productTotalPrice
     *
     * @param string $productTotalPrice
     *
     * @return Product
     */
    public function setProductTotalPrice($productTotalPrice)
    {
        $this->productTotalPrice = $productTotalPrice;

        return $this;
    }

    /**
     * Get productTotalPrice
     *
     * @return string
     */
    public function getProductTotalPrice()
    {
        return $this->productTotalPrice;
    }
}
