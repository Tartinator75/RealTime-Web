<?php

namespace App\Repository;

use App\Entity\CategorieEnchere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieEnchere|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieEnchere|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieEnchere[]    findAll()
 * @method CategorieEnchere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieEnchereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieEnchere::class);
    }

    // /**
    //  * @return CategorieEnchere[] Returns an array of CategorieEnchere objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategorieEnchere
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
