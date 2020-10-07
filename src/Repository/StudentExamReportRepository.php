<?php

namespace App\Repository;

use App\Entity\StudentExamReport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StudentExamReport|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentExamReport|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentExamReport[]    findAll()
 * @method StudentExamReport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentExamReportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentExamReport::class);
    }

    // /**
    //  * @return StudentExamReport[] Returns an array of StudentExamReport objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StudentExamReport
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
