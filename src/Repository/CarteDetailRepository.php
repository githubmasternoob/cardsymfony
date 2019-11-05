<?php

namespace App\Repository;

use App\Entity\CarteDetail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CarteDetail|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarteDetail|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarteDetail[]    findAll()
 * @method CarteDetail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarteDetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarteDetail::class);
    }

    // /**
    //  * @return CarteDetail[] Returns an array of CarteDetail objects
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
    public function findOneBySomeField($value): ?CarteDetail
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
