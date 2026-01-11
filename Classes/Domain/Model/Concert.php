<?php

namespace PeterBenke\PbConcertlist\Domain\Model;

/**
 * TYPO3
 */

use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * DateTime
 */

use DateTime;

/**
 * Class Concert
 * @noinspection PhpUnused
 */
class Concert extends AbstractEntity
{

    /**
     * @var string|null
     */
    #[Validate(['validator' => 'NotEmpty'])]
    protected ?string $title = null;

    /**
     * @var DateTime|null
     */
    #[Validate(['validator' => 'NotEmpty'])]
    protected ?DateTime $date = null;

    /**
     * @var string|null
     */
    #[Validate(['validator' => 'NotEmpty'])]
    protected ?string $location = null;

    /**
     * @var string|null
     */
    protected ?string $address = null;

    /**
     * @var string|null
     */
    protected ?string $description = null;

    /**
     * @var string|null
     */
    protected ?string $contact = null;

    /**
     * @var int|null
     */
    protected ?int $privateconcert = null;

    /**
     * @var string|null
     */
    protected ?string $status = null;

    /**
     * @var string|null
     */
    protected ?string $fee = null;

    /**
     * @var DateTime|null
     */
    protected ?DateTime $markAsNewUntil = null;

    /**
     * Attention: qualifier has to be complete and cannot be replaced with an import!
     * @var ObjectStorage<Url>|null
     */
    protected ?ObjectStorage $url = null;

    /**
     * @return string|null
     * @noinspection PhpUnused
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @noinspection PhpUnused
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return DateTime|null
     * @noinspection PhpUnused
     */
    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime|null $date
     * @noinspection PhpUnused
     */
    public function setDate(?DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string|null
     * @noinspection PhpUnused
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * @param string|null $location
     * @noinspection PhpUnused
     */
    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string|null
     * @noinspection PhpUnused
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     * @noinspection PhpUnused
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     * @noinspection PhpUnused
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @noinspection PhpUnused
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     * @noinspection PhpUnused
     */
    public function getContact(): ?string
    {
        return $this->contact;
    }

    /**
     * @param string|null $contact
     * @noinspection PhpUnused
     */
    public function setContact(?string $contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @return integer|null
     * @noinspection PhpUnused
     */
    public function getPrivateconcert(): ?int
    {
        return $this->privateconcert;
    }

    /**
     * @param integer|null $privateconcert
     * @noinspection PhpUnused
     */
    public function setPrivateconcert(?int $privateconcert): void
    {
        $this->privateconcert = $privateconcert;
    }

    /**
     * @return string|null
     * @noinspection PhpUnused
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @noinspection PhpUnused
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string|null
     * @noinspection PhpUnused
     */
    public function getFee(): ?string
    {
        return $this->fee;
    }

    /**
     * @param string|null $fee
     * @noinspection PhpUnused
     */
    public function setFee(?string $fee): void
    {
        $this->fee = $fee;
    }

    /**
     * @return DateTime|null
     * @noinspection PhpUnused
     */
    public function getMarkAsNewUntil(): ?DateTime
    {
        return $this->markAsNewUntil;
    }

    /**
     * @param DateTime|null $markAsNewUntil
     * @noinspection PhpUnused
     */
    public function setMarkAsNewUntil(?DateTime $markAsNewUntil): void
    {
        $this->markAsNewUntil = $markAsNewUntil;
    }

    /**
     * @param Url|null $url
     * @noinspection PhpUnused
     */
    public function addUrl(?Url $url): void
    {
        $this->url->attach($url);
    }

    /**
     * @param Url|null $urlToRemove
     * @noinspection PhpUnused
     */
    public function removeUrl(?Url $urlToRemove): void
    {
        $this->url->detach($urlToRemove);
    }

    /**
     * @return ObjectStorage<Url>|null $url
     * @noinspection PhpUnused
     */
    public function getUrl(): ?ObjectStorage
    {
        return $this->url;
    }

    /**
     * @param ObjectStorage<Url> $url
     * @return void
     * @noinspection PhpUnused
     */
    public function setUrl(ObjectStorage $url): void
    {
        $this->url = $url;
    }

}