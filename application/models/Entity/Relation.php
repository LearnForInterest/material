<?php
namespace Entity;
use Entity\Repository\RelationRepository;

/**
 * Relation
 *
 * @Table(name="relation", options={"collate"="utf8_general_ci","charset"="utf8"})
 * @Entity(repositoryClass="Entity\Repository\RelationRepository")
 */
class Relation extends RelationRepository{

    /**
     * @var integer
     *
     * @Column(name="rela_id", type="integer", nullable=false, options={"comment": "关系id"})
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $relationId;

    /**
     * @var integer
     *
     * @Column(name="prod_id", type="integer", nullable=false, options={"comment": "产品id"})
     */
    private $relationProId;

    /**
     * @var integer
     *
     * @Column(name="material_id", type="integer", nullable=false, options={"comment": "材料id"})
     */
    private $relationMatId;

    public function __construct()
    {

    }


    /**
     * Get relationId
     *
     * @return integer
     */
    public function getRelationId()
    {
        return $this->relationId;
    }

    /**
     * Set relationProId
     *
     * @param integer $relationProId
     *
     * @return Relation
     */
    public function setRelationProId($relationProId)
    {
        $this->relationProId = $relationProId;

        return $this;
    }

    /**
     * Get relationProId
     *
     * @return integer
     */
    public function getRelationProId()
    {
        return $this->relationProId;
    }

    /**
     * Set relationMatId
     *
     * @param integer $relationMatId
     *
     * @return Relation
     */
    public function setRelationMatId($relationMatId)
    {
        $this->relationMatId = $relationMatId;

        return $this;
    }

    /**
     * Get relationMatId
     *
     * @return integer
     */
    public function getRelationMatId()
    {
        return $this->relationMatId;
    }
}
