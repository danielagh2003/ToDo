<?php

namespace App\Repository;

use App\Entity\Utilizator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Utilizator>
 *
 * @method Utilizator|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilizator|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilizator[]    findAll()
 * @method Utilizator[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilizatorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilizator::class);
    }

//    /**
//     * @return Utilizator[] Returns an array of Utilizator objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Utilizator
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
