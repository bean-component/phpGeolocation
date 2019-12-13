<?php

namespace Bean\Geolocation\Model;

use Bean\Thing\Model\ThingInterface;

/**
 * @author Binh Le <peterbean@bean-component.com>
 */
interface GeolocationInterface extends ThingInterface
{
    public function getAddress(): ?string;

    public function setAddress(?string $address): GeolocationInterface;

    public function getCountry(): ?string;

    public function setCountry(?string $country): GeolocationInterface;

    public function getFirstDivision(): ?string;

    public function setFirstDivision(?string $firstDivision): GeolocationInterface;

    public function getSecondDivision(): ?string;

    public function setSecondDivision(?string $secondDivision): GeolocationInterface;

    public function getThirdDivision(): ?string;

    public function setThirdDivision(?string $thirdDivision): GeolocationInterface;

    public function getFourthDivision(): ?string;

    public function setFourthDivision(?string $fourthDivision): GeolocationInterface;

    public function getFifthDivision(): ?string;

    public function setFifthDivision(?string $fifthDivision): GeolocationInterface;

    public function getStreet(): ?string;

    public function setStreet(?string $street): GeolocationInterface;

    public function getNumber(): ?string;

    public function setNumber(?string $number): GeolocationInterface;

    public function getLatitude(): ?float;

    public function setLatitude(float $latitude): GeolocationInterface;

    public function getLongitude(): ?float;

    public function setLongitude(float $longitude): GeolocationInterface;

    public function getGooglePlaceId(): ?string;

    public function setGooglePlaceId(?string $placeId): GeolocationInterface;
}