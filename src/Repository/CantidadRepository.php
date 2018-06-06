<?php

namespace App\Repository;

use App\Entity\Cantidad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Cantidad|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cantidad|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cantidad[]    findAll()
 * @method Cantidad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CantidadRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Cantidad::class);
    }

//    /**
//     * @return Cantidad[] Returns an array of Cantidad objects
//     */
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
    public function findOneBySomeField($value): ?Cantidad
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
