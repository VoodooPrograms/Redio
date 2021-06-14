<?php

namespace App\Repository;

use App\Entity\SongData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
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

    public function save(SongData $songDataEntity): ?SongData
    {
        try {
            $this->getEntityManager()->persist($songDataEntity);
            $this->getEntityManager()->flush();
        } catch (ORMException|OptimisticLockException $e) {
            return null;
        }
        return $songDataEntity;
    }

    public function delete(SongData $song): void
    {
        $this->getEntityManager()->remove($song);
        $this->getEntityManager()->flush();
    }
}
