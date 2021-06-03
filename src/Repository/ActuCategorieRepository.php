<?php

namespace App\Repository;

use App\Entity\ActuCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActuCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActuCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActuCategorie[]    findAll()
 * @method ActuCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActuCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActuCategorie::class);
    }

    // /**
    //  * @return ActuCategorie[] Returns an array of ActuCategorie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ActuCategorie
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
