<?php

namespace App\Repository;

use App\Entity\Optione;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Optione|null find($id, $lockMode = null, $lockVersion = null)
 * @method Optione|null findOneBy(array $criteria, array $orderBy = null)
 * @method Optione[]    findAll()
 * @method Optione[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptioneRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Optione::class);
    }

    // /**
    //  * @return Optione[] Returns an array of Optione objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Optione
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
