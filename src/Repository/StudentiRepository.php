<?php

namespace App\Repository;

use App\Entity\Studenti;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Studenti>
 *
 * @method Studenti|null find($id, $lockMode = null, $lockVersion = null)
 * @method Studenti|null findOneBy(array $criteria, array $orderBy = null)
 * @method Studenti[]    findAll()
 * @method Studenti[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Studenti::class);
    }

//    /**
//     * @return Studenti[] Returns an array of Studenti objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Studenti
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
