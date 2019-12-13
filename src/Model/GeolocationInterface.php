<?php

namespace Bean\Geolocation\Model;

/**
 * @author Binh Le <peterbean@bean-component.com>
 */
interface GeolocationInterface
{
    public function getAddress(): ?string;

    public function setAddress(?string $address): self;

    public function getCountry(): ?string;

    public function setCountry(?string $country): self;

    public function getFirstDivision(): ?string;

    public function setFirstDivision(?string $firstDivision): self;

    public function getSecondDivision(): ?string;

    public function setSecondDivision(?string $secondDivision): self;

    public function getThirdDivision(): ?string;

    public function setThirdDivision(?string $thirdDivision): self;

    public function getFourthDivision(): ?string;

    public function setFourthDivision(?string $fourthDivision): self;

    public function getFifthDivision(): ?string;

    public function setFifthDivision(?string $fifthDivision): self;

    public function getStreet(): ?string;

    public function setStreet(?string $street): self;

    public function getNumber(): ?string;

    public function setNumber(?string $number): self;

    public function getLatitude(): ?float;

    public function setLatitude(float $latitude): self;

    public function getLongitude(): ?float;

    public function setLongitude(float $longitude): self;

    public function getGooglePlaceId(): ?string;

    public function setGooglePlaceId(?string $placeId): self;
}