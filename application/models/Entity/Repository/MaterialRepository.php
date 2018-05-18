<?php

namespace Entity\Repository;

/**
 * MaterialRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MaterialRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * 统计要插入的新id
     * @return string
     */
    public function getnewID()
    {
        return $this->_em->createQueryBuilder()
                         ->select("max(m.materialId)+1")
                         ->from('Entity\Material','m')
                         ->getQuery()->getSingleScalarResult();
    }

    /**
     * 查找所有material info
     * @return array
     */
    public function getallMaterialName()
    {
        return $this->_em->createQueryBuilder()
                         ->select("m.materialName as name,m.materialId as unique_code,m.materialDes as des")
                         ->from('Entity\Material','m')
                         ->getQuery()->getScalarResult();
    }

    /**
     * 使用库存中的材料
     * @return integer
     */
    public function minusMaterialInStock($argv)
    {
        $chkResult = self::chkNumInStock($argv);
        if(!$chkResult){
            return -1;
        }
                $this->_em->createQueryBuilder()
                          ->update('Entity\Material', 'm')
                          ->set('m.materialNum','m.materialNum-1')
                          ->where('m.materialId IN(:needIDs)')
                          ->setParameter( 'needIDs', array_values($argv) )
                          ->getQuery()
                          ->execute();
        return 1;
    }

    /**
     * 查询库存量
     * @return boolean
     */
    private function chkNumInStock($argv)
    {
        foreach ($argv as $v){
            $numInStock = $this->_em->createQueryBuilder()
                                    ->select("m.materialNum")
                                    ->from('Entity\Material','m')
                                    ->where('m.materialId = :id')
                                    ->setParameter( 'id', $v )
                                    ->getQuery()->getSingleScalarResult();
            if($numInStock == 0) return false;
        }
        return true;
    }


    /**
     * 统计要插入的新id
     * @return integer
     */
    public function getTotalPrice($argv)
    {
        return $totalPrice = $this->_em->createQueryBuilder()
                                        ->select("sum(m.materialPrice)")
                                        ->from('Entity\Material','m')
                                        ->where('m.materialId IN(:needIDs)')
                                        ->setParameter( 'needIDs', array_values($argv) )
                                        ->getQuery()->getSingleScalarResult();
    }
}