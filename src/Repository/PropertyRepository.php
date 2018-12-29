<?php

namespace App\Repository;

use App\Entity\Property;
use App\Entity\PropertySearch;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Property|null find($id, $lockMode = null, $lockVersion = null)
 * @method Property|null findOneBy(array $criteria, array $orderBy = null)
 * @method Property[]    findAll()
 * @method Property[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Property::class);
    }



    /**
     * @return Property[]
     */
        public function findAllVisibleQuery(PropertySearch $search)
    {
        $query =  $this->findVisibleQuery();
                    
        if($search->getMaxPrice()){
            $query = $query
                ->andWhere('p.price <= :maxPrice')                    
                ->setParameter('maxPrice', $search->getMaxPrice());
        }

        if($search->getMinSurface()){
            $query = $query
                ->andWhere('p.surface >= :minSurface')                    
                ->setParameter('minSurface', $search->getMinSurface());
        }

        if($search->getOptiones()){
            $optiones = $search->getOptiones();
            $k = 0;
            foreach ($optiones as $option){
                $k++;
                $query = $query
                    ->andWhere(":option$k MEMBER OF p.optiones")
                    ->setParameter("option$k", $option);
            }
        }

        return $query->getQuery();
    }

    /**
     * @return Property[]
     */
    public function findLatest(): array
    {
        return $this->findVisibleQuery()
              ->setMaxResults(4)
              ->getQuery()
              ->getResult();
    }

    private function findVisibleQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
                    ->andWhere('p.sold = false');
    }


    // /**
    //  * @return Property[] Returns an array of Property objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Property
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
