<?php
namespace PeterBenke\PbConcertlist\Domain\Model;

/**
 * PbConcertlist
 */
use PeterBenke\PbConcertlist\Domain\Model\Url;

/**
 * TYPO3
 */
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * DateTime
 */
use DateTime;

/**
 *
 * Concert
 *
 */
class Concert extends AbstractEntity
{

	/**
	 * @var string|null
	 * @TYPO3\CMS\Extbase\Annotation\Validate ("NotEmpty")
	 */
	protected $title;

	/**
	 * @var DateTime|null
	 * @TYPO3\CMS\Extbase\Annotation\Validate ("NotEmpty")
	 */
	protected $date;

	/**
	 * @var string|null
	 * @TYPO3\CMS\Extbase\Annotation\Validate ("NotEmpty")
	 */
	protected $location;

	/**
	 * @var string|null
	 */
	protected $address;

	/**
	 * @var string|null
	 */
	protected $description;

	/**
	 * @var string|null
	 */
	protected $contact;

	/**
	 * @var int|null
	 */
	protected $privateconcert;
	
	/**
	 * @var string|null
	 */
	protected $status;

	/**
	 * @var string|null
	 */
	protected $fee;

	/**
	 * @var DateTime|null
	 */
	protected $markAsNewUntil;

	/**
	 * Attention: qualifier has to be complete and cannot be replaced with an import!
	 * @var ObjectStorage<Url>|null
	 */
	protected $url;

	/**
	 * @return string|null $title
	 */
	public function getTitle(): ?string
	{
		return $this->title;
	}

	/**
	 * @param string|null $title
	 */
	public function setTitle(?string $title)
	{
		$this->title = $title;
	}

	/**
	 * @return DateTime|null $date
	 */
	public function getDate(): ?DateTime
	{
		return $this->date;
	}

	/**
	 * @param DateTime|null $date
	 */
	public function setDate(?DateTime $date)
	{
		$this->date = $date;
	}

	/**
	 * @return string|null $location
	 */
	public function getLocation(): ?string
	{
		return $this->location;
	}

	/**
	 * @param string|null $location
	 */
	public function setLocation(?string $location)
	{
		$this->location = $location;
	}

	/**
	 * @return string|null $address
	 */
	public function getAddress(): ?string
	{
		return $this->address;
	}

	/**
	 * @param string|null $address
	 */
	public function setAddress(?string $address)
	{
		$this->address = $address;
	}

	/**
	 * @return string|null $description
	 */
	public function getDescription(): ?string
	{
		return $this->description;
	}

	/**
	 * @param string|null $description
	 */
	public function setDescription(?string $description)
	{
		$this->description = $description;
	}
	
	/**
	 * @return string|null $contact
	 */
	public function getContact(): ?string
	{
		return $this->contact;
	}

	/**
	 * @param string|null $contact
	 */
	public function setContact(?string $contact)
	{
		$this->contact = $contact;
	}

	/**
	 * @return integer|null
	 */
	public function getPrivateconcert(): ?int
	{
		return $this->privateconcert;
	}
	
	/**
	 * @param integer|null $privateconcert
	 */
	public function setPrivateconcert(?int $privateconcert)
	{
		$this->privateconcert = $privateconcert;
	}

	/**
	 * @return string|null
	 */
	public function getStatus(): ?string
	{
		return $this->status;
	}

	/**
	 * @param string|null $status
	 */
	public function setStatus(?string $status)
	{
		$this->status = $status;
	}

	/**
	 * @return string|null fee
	 */
	public function getFee(): ?string
	{
		return $this->fee;
	}

	/**
	 * @param string|null $fee
	 */
	public function setFee(?string $fee)
	{
		$this->fee = $fee;
	}

	/**
	 * @return DateTime|null $markAsNewUntil
	 */
	public function getMarkAsNewUntil(): ?DateTime
	{
		return $this->markAsNewUntil;
	}

	/**
	 * @param DateTime|null $markAsNewUntil
	 */
	public function setMarkAsNewUntil(?DateTime $markAsNewUntil)
	{
		$this->markAsNewUntil = $markAsNewUntil;
	}

	/**
	 * @param Url|null $url
	 */
	public function addUrl(?Url $url)
	{
		$this->url->attach($url);
	}

	/**
	 * @param Url|null $urlToRemove The Url to be removed
	 */
	public function removeUrl(?Url $urlToRemove)
	{
		$this->url->detach($urlToRemove);
	}

	/**
	 * Attention: qualifier has to be complete and cannot be replaced with an import!
	 * @return ObjectStorage<Url>|null $url
	 */
	public function getUrl(): ?ObjectStorage
	{
		return $this->url;
	}

	/**
	 * Attention: qualifier has to be complete and cannot be replaced with an import!
	 * @param ObjectStorage<Url> $url
	 * @return void
	 */
	public function setUrl(ObjectStorage $url)
	{
		$this->url = $url;
	}

}