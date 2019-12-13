<?php

namespace Bean\Geolocation\Doctrine\Orm\Repository;

use Bean\Geolocation\Doctrine\Orm\Entity\Geolocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Geolocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Geolocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Geolocation[]    findAll()
 * @method Geolocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeolocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Geolocation::class);
    }

    public function findNearbyLocations($longitude, $latitude)
    {
        $rootAlias = 'geolocation_class';
//        return $this->createQueryBuilder($rootAlias)
//            ->select($rootAlias.' as geolocation')
//            ->addSelect(sprintf("ST_Distance('SRID=4326;POINT(%f %f)', %s.geography, false) As distance", $long, $lat, $rootAlias))
//            ->orderBy('distance', 'ASC')
//            ->getQuery()->getResult();

        /**
         *Changing the code to work with kilometers
         *can be accomplished by changing 3959 (the distance from the center of the earth to its surface in miles) to
         *6371 (3959 miles converted to kilometers) thanks to joshhendo for that solution.
         */
//        if(count($location) > 0) {
//            $latitude  = $location['lat'];
//            $longitude = $location['long'];
//            $qb->addSelect('(6371 * ACOS(SIN(RADIANS(:latitude)) * SIN(RADIANS(geolocation.latitude)) + COS(RADIANS(:latitude)) * COS(RADIANS(geolocation.latitude)) * COS(RADIANS(geolocation.longitude) - RADIANS(:longitude)))) as distance')
//                ->setParameter('latitude', $latitude)
//                ->setParameter('longitude', $longitude)
//                ->orderBy('distance', 'ASC');
//        };
//
//        $query = $qb->getQuery();

        if ($driver = $this->getEntityManager()->getConnection()->getDatabasePlatform()->getName() === 'mysql') {
            return $this->createQueryBuilder($rootAlias)
                ->select($rootAlias.' as geolocation')
                ->addSelect(sprintf('(6371 * ACOS(SIN(RADIANS(:latitude)) * SIN(RADIANS(%1$s.latitude)) + COS(RADIANS(:latitude)) * COS(RADIANS(%1$s.latitude)) * COS(RADIANS(%1$s.longitude) - RADIANS(:longitude)))) as distance', $rootAlias))
                ->setParameter('latitude', $latitude)
                ->setParameter('longitude', $longitude)
                ->orderBy('distance', 'ASC')
                ->getQuery()->getResult();
        } elseif ($driver === 'postgresql') {
            return $this->createQueryBuilder($rootAlias)
                ->select($rootAlias.' as geolocation')
                ->addSelect(sprintf("ST_Distance('SRID=4326;POINT(%f %f)', %s.geography, false) As distance", $longitude, $latitude, $rootAlias))
                ->orderBy('distance', 'ASC')
                ->getQuery()->getResult();
        }
    }

    // /**
    //  * @return Geolocation[] Returns an array of Geolocation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Geolocation
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
