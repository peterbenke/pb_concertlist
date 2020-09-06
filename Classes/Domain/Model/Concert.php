<?php
namespace PeterBenke\PbConcertlist\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

use DateTime;

/**
 *
 * Concert
 *
 */
class Concert extends AbstractEntity {

	/**
	 * @var string
	 * @TYPO3\CMS\Extbase\Annotation\Validate ("NotEmpty")
	 */
	protected $title;

	/**
	 * @var DateTime
	 * @TYPO3\CMS\Extbase\Annotation\Validate ("NotEmpty")
	 */
	protected $date;

	/**
	 * @var string
	 * @TYPO3\CMS\Extbase\Annotation\Validate ("NotEmpty")
	 */
	protected $location;

	/**
	 * @var string
	 */
	protected $address;

	/**
	 * @var string
	 */
	protected $description;

	/**
	 * @var string
	 */
	protected $contact;

	/**
	 * @var integer
	 */
	protected $privateconcert;
	
	/**
	 * @var string
	 */
	protected $status;

	/**
	 * @var string
	 */
	protected $fee;

	/**
	 * @var DateTime
	 */
	protected $markAsNewUntil;

	/**
	 * Attention: qualifier has to be complete and cannot be replaced with an import!
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PeterBenke\PbConcertlist\Domain\Model\Url>
	 */
	protected $url;

	/**
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return DateTime $date
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * @param DateTime $date
	 * @return void
	 */
	public function setDate($date) {
		$this->date = $date;
	}

	/**
	 * @return string $location
	 */
	public function getLocation() {
		return $this->location;
	}

	/**
	 * @param string $location
	 * @return void
	 */
	public function setLocation($location) {
		$this->location = $location;
	}

	/**
	 * @return string $address
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * @param string $address
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}
	
	/**
	 * @return string $contact
	 */
	public function getContact() {
		return $this->contact;
	}

	/**
	 * @param string $contact
	 * @return void
	 */
	public function setContact($contact) {
		$this->contact = $contact;
	}

	/**
	 * @return integer
	 */
	public function getPrivateconcert() {
		return $this->privateconcert;
	}
	
	/**
	 * @param integer $privateconcert
	 * @return void
	 */
	public function setPrivateconcert($privateconcert) {
		$this->privateconcert = $privateconcert;
	}

	/**
	 * @return string
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @param string $status
	 * @return void
	 */
	public function setStatus($status) {
		$this->status = $status;
	}

	/**
	 * @return string fee
	 */
	public function getFee() {
		return $this->fee;
	}

	/**
	 * @param string $fee
	 * @return void
	 */
	public function setFee($fee) {
		$this->fee = $fee;
	}

	/**
	 * @return DateTime $markAsNewUntil
	 */
	public function getMarkAsNewUntil() {
		return $this->markAsNewUntil;
	}

	/**
	 * @param DateTime $markAsNewUntil
	 * @return void
	 */
	public function setMarkAsNewUntil($markAsNewUntil) {
		$this->markAsNewUntil = $markAsNewUntil;
	}

	/**
	 * @param Url $url
	 * @return void
	 */
	public function addUrl(Url $url) {
		$this->url->attach($url);
	}

	/**
	 * @param Url $urlToRemove The Url to be removed
	 * @return void
	 */
	public function removeUrl(Url $urlToRemove) {
		$this->url->detach($urlToRemove);
	}

	/**
	 * Attention: qualifier has to be complete and cannot be replaced with an import!
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PeterBenke\PbConcertlist\Domain\Model\Url> $url
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * Attention: qualifier has to be complete and cannot be replaced with an import!
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PeterBenke\PbConcertlist\Domain\Model\Url> $url
	 * @return void
	 */
	public function setUrl(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $url) {
		$this->url = $url;
	}

}