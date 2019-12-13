<?php
declare(strict_types=1);

namespace Bean\Geolocation\Model;

use Bean\Thing\Model\Thing;

/**
 * @author Binh Le <peterbean@bean-component.com>
 */
class Geolocation extends Thing implements GeolocationInterface
{
    /**
     * @var string|null
     */
    protected $address;

    /**
     * @var string|null
     */
    protected $country;

    /**
     * @var string|null
     */
    protected $firstDivision;

    /**
     * @var string|null
     */
    protected $secondDivision;

    /**
     * @var string|null
     */
    protected $thirdDivision;

    /**
     * @var string|null
     */
    protected $fourthDivision;

    /**
     * @var string|null
     */
    protected $fifthDivision;

    /**
     * @var string|null
     */
    protected $street;

    /**
     * @var string|null
     */
    protected $number;

    /**
     * @var float|null
     */
    protected $latitude;

    /**
     * @var float|null
     */
    protected $longitude;

    /**
     * @var string|null
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