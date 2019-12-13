<?php
namespace Bean\Geolocation\Doctrine\Orm;

use Bean\Geolocation\Model\GeolocationInterface;
use Bean\Thing\Doctrine\Orm\Thing;
use Bean\Thing\Model\ThingInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Storage agnostic user object
 *
 * @author Binh Le <binh@bean-project.org>
 */

/**
 * @ORM\Entity()
 * @ORM\Table(name="test__geolocation")
 * @ORM\HasLifecycleCallbacks
 */
class Geolocation extends \Bean\Geolocation\Model\Geolocation implements GeolocationInterface
{
    //    Mapping from Thing Component
    /**
     * @var array|null
     * @ORM\Column(type="json", nullable=true)
     */
    protected $data = [];


    public function getData(): ?array
    {
        return $this->data;
    }

    public function setData(?array $data): ThingInterface
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @var integer|null
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="bigint", options={"unsigned":true})
     */
    protected $id;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $slug;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $address;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    protected $country;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $firstDivision;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $secondDivision;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $thirdDivision;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $fourthDivision;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $fifthDivision;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $street;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    protected $number;

    /**
     * @var float|null
     * @ORM\Column(type="float")
     */
    protected $latitude;

    /**
     * @var float|null
     * @ORM\Column(type="float")
     */
    protected $longitude;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $googlePlaceId;

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): GeolocationInterface
    {
        $this->address = $address;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): GeolocationInterface
    {
        $this->country = $country;

        return $this;
    }

    public function getFirstDivision(): ?string
    {
        return $this->firstDivision;
    }

    public function setFirstDivision(?string $firstDivision): GeolocationInterface
    {
        $this->firstDivision = $firstDivision;

        return $this;
    }

    public function getSecondDivision(): ?string
    {
        return $this->secondDivision;
    }

    public function setSecondDivision(?string $secondDivision): GeolocationInterface
    {
        $this->secondDivision = $secondDivision;

        return $this;
    }

    public function getThirdDivision(): ?string
    {
        return $this->thirdDivision;
    }

    public function setThirdDivision(?string $thirdDivision): GeolocationInterface
    {
        $this->thirdDivision = $thirdDivision;

        return $this;
    }

    public function getFourthDivision(): ?string
    {
        return $this->fourthDivision;
    }

    public function setFourthDivision(?string $fourthDivision): GeolocationInterface
    {
        $this->fourthDivision = $fourthDivision;

        return $this;
    }

    public function getFifthDivision(): ?string
    {
        return $this->fifthDivision;
    }

    public function setFifthDivision(?string $fifthDivision): GeolocationInterface
    {
        $this->fifthDivision = $fifthDivision;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): GeolocationInterface
    {
        $this->street = $street;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): GeolocationInterface
    {
        $this->number = $number;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): GeolocationInterface
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): GeolocationInterface
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getGooglePlaceId(): ?string
    {
        return $this->googlePlaceId;
    }

    public function setGooglePlaceId(?string $placeId): GeolocationInterface
    {
        $this->googlePlaceId = $placeId;
        return $this;
    }
}