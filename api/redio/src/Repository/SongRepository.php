<?php

namespace App\Repository;

use App\Entity\Song;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Song|null find($id, $lockMode = null, $lockVersion = null)
 * @method Song|null findOneBy(array $criteria, array $orderBy = null)
 * @method Song[]    findAll()
 * @method Song[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SongRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Song::class);
    }

    public function save(Song $songEntity): ?Song
    {
        try {
            $this->getEntityManager()->persist($songEntity);
            $this->getEntityManager()->flush();
        } catch (ORMException|OptimisticLockException $e) {
            return null;
        }
        return $songEntity;
    }

    public function delete(Song $song): void
    {
        $this->getEntityManager()->remove($song);
        $this->getEntityManager()->flush();
    }
}
