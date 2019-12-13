<?php

namespace Bean\Tests\Geolocation\Doctrine\Orm;

use Bean\Geolocation\Doctrine\Orm\Entity\Geolocation;
use Bean\Geolocation\Doctrine\Orm\Repository\GeolocationRepository;
use Bean\Thing\Model\Thing;
use Doctrine\ORM\Tools\SchemaTool;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class GeolocationTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    protected function clearDatabase()
    {
        $em = $this->entityManager;
        if (!isset($metadatas)) {
            $metadatas = $em->getMetadataFactory()->getAllMetadata();
        }
        $schemaTool = new SchemaTool($em);
        $schemaTool->dropDatabase();
        if (!empty($metadatas)) {
            $schemaTool->createSchema($metadatas);
        }
    }

    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->clearDatabase();

        $loc = new Geolocation();
        $loc->setSlug('magenta-location');

        $loc
            ->setAddress('Trivex, 8 Burn Rd, Singapour 369977')
            ->setStreet('Burn Road')
            ->setNumber('8')
            ->setCountry('Singapore')
            ->setGooglePlaceId('ChIJc8ffAZIX2jERAznb5rk00U0')
            ->setLongitude(103.885446)
            ->setLatitude(1.3358564);

        $loc->setName('Trivex Building, Singapore');
        $loc->setStatus(Thing::STATUS_PUBLISHED);
        $now = $loc->getCreatedAt();
        $now->setTimezone(new \DateTimeZone('Asia/Singapore'));
        $loc->setDescription($now->format('Y-m-d H:i:s'));

        $this->entityManager->persist($loc);
        $this->entityManager->flush();
    }

    public function testSearchBySlug()
    {
        /** @var Geolocation $loc */
        $loc = $this->entityManager->getRepository(Geolocation::class)->findOneBySlug('magenta-location');
        $this->assertNotEmpty($loc);
        $this->assertIsArray($data = $loc->getData());
        $this->assertEquals('Trivex, 8 Burn Rd, Singapour 369977', $loc->getAddress());
    }

    public function testSearchNearBy()
    {
        /** @var GeolocationRepository $repo */
        $repo = $this->entityManager->getRepository(Geolocation::class);
        $locs = $repo->findNearbyLocations(103.8482644, 1.2767434);

        $this->assertIsArray($locs);
        $this->assertNotEmpty($locs);
        /** @var Geolocation $loc */
        $loc = $locs[0]['geolocation'];
        $distance = $locs[0]['distance'];
        echo $loc->getName().'  '.$distance;
        $this->assertEquals('Trivex, 8 Burn Rd, Singapour 369977', $loc->getAddress());
    }
}