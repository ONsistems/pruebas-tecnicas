<?php

namespace App\Repository;

use App\Entity\Todo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Todo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Todo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Todo[]    findAll()
 * @method Todo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TodoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Todo::class);
    }
   
    public function findTodoByUser($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.assignUser = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findPendingTodoByUser($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.estado = :state')
            ->andWhere('t.assignUser = :val')
            ->setParameter('state','pendiente')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
        ;
    }
}
