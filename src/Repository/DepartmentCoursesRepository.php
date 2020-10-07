<?php

namespace App\Repository;

use App\Entity\DepartmentCourses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DepartmentCourses|null find($id, $lockMode = null, $lockVersion = null)
 * @method DepartmentCourses|null findOneBy(array $criteria, array $orderBy = null)
 * @method DepartmentCourses[]    findAll()
 * @method DepartmentCourses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartmentCoursesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DepartmentCourses::class);
    }

    // /**
    //  * @return DepartmentCourses[] Returns an array of DepartmentCourses objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DepartmentCourses
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
