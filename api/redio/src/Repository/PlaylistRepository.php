<?php

namespace App\Repository;

use App\Entity\Playlist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Playlist|null find($id, $lockMode = null, $lockVersion = null)
 * @method Playlist|null findOneBy(array $criteria, array $orderBy = null)
 * @method Playlist[]    findAll()
 * @method Playlist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlaylistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Playlist::class);
    }

    public function save(Playlist $playlistEntity): ?Playlist
    {
        try {
            $this->getEntityManager()->persist($playlistEntity);
            $this->getEntityManager()->flush();
        } catch (ORMException|OptimisticLockException $e) {
            return null;
        }
        return $playlistEntity;
    }

    public function delete(Playlist $playlist): void
    {
        $this->getEntityManager()->remove($playlist);
        $this->getEntityManager()->flush();
    }
}
