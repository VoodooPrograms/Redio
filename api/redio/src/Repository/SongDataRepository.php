<?php

namespace App\Repository;

use App\Entity\SongData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SongData|null find($id, $lockMode = null, $lockVersion = null)
 * @method SongData|null findOneBy(array $criteria, array $orderBy = null)
 * @method SongData[]    findAll()
 * @method SongData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SongDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SongData::class);
    }

    // /**
    //  * @return SongData[] Returns an array of SongData objects
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
    public function findOneBySomeField($value): ?SongData
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
