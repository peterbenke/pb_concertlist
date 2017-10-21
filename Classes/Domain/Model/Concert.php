<?php
namespace PeterBenke\PbConcertlist\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012-2017 Peter Benke <info@typomotor.de>, TYPO motor
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 * Concert
 *
 */
class Concert extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * date
	 *
	 * @var \DateTime
	 * @validate NotEmpty
	 */
	protected $date;

	/**
	 * location
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $location;

	/**
	 * address
	 *
	 * @var string
	 */
	protected $address;

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description;

	/**
	 * contact
	 *
	 * @var string
	 */
	protected $contact;

	/**
	 * privateconcert
	 * @var integer
	 */
	protected $privateconcert;
	
	/**
	 * status
	 *
	 * @var string
	 */
	protected $status;

	/**
	 * fee
	 *
	 * @var string
	 */
	protected $fee;

	/**
	 * markAsNewUntil
	 *
	 * @var \DateTime
	 */
	protected $markAsNewUntil;

	/**
	 * url
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PeterBenke\PbConcertlist\Domain\Model\Url>
	 */
	protected $url;

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the date
	 *
	 * @return \DateTime $date
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * Sets the date
	 *
	 * @param \DateTime $date
	 * @return void
	 */
	public function setDate($date) {
		$this->date = $date;
	}

	/**
	 * Returns the location
	 *
	 * @return string $location
	 */
	public function getLocation() {
		return $this->location;
	}

	/**
	 * Sets the location
	 *
	 * @param string $location
	 * @return void
	 */
	public function setLocation($location) {
		$this->location = $location;
	}

	/**
	 * Returns the address
	 *
	 * @return string $address
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * Sets the address
	 *
	 * @param string $address
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}
	
	/**
	 * Returns the contact
	 *
	 * @return string $contact
	 */
	public function getContact() {
		return $this->contact;
	}

	/**
	 * Sets the contact
	 *
	 * @param string $contact
	 * @return void
	 */
	public function setContact($contact) {
		$this->contact = $contact;
	}

	/**
	 * Returns the privateconcert
	 *
	 * @return integer privateconcert
	 */
	public function getPrivateconcert() {
		return $this->privateconcert;
	}
	
	/**
	 * Setter for privateconcert
	 *
	 * @param integer $privateconcert
	 * @return void
	 */
	public function setPrivateconcert($privateconcert) {
		$this->privateconcert = $privateconcert;
	}

	/**
	 * Returns the status
	 *
	 * @return string status
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * Setter for status
	 *
	 * @param string $status
	 * @return void
	 */
	public function setStatus($status) {
		$this->status = $status;
	}

	/**
	 * Returns the fee
	 *
	 * @return string fee
	 */
	public function getFee() {
		return $this->fee;
	}

	/**
	 * Setter for fee
	 *
	 * @param string $fee
	 * @return void
	 */
	public function setFee($fee) {
		$this->fee = $fee;
	}

	/**
	 * Returns the markAsNewUntil
	 *
	 * @return \DateTime $markAsNewUntil
	 */
	public function getMarkAsNewUntil() {
		return $this->markAsNewUntil;
	}

	/**
	 * Sets the markAsNewUntil
	 *
	 * @param \DateTime $markAsNewUntil
	 * @return void
	 */
	public function setMarkAsNewUntil($markAsNewUntil) {
		$this->markAsNewUntil = $markAsNewUntil;
	}

	/**
	 * Adds a Url
	 *
	 * @param \PeterBenke\PbConcertlist\Domain\Model\Url $url
	 * @return void
	 */
	public function addUrl(\PeterBenke\PbConcertlist\Domain\Model\Url $url) {
		$this->url->attach($url);
	}

	/**
	 * Removes a Url
	 *
	 * @param \PeterBenke\PbConcertlist\Domain\Model\Url $urlToRemove The Url to be removed
	 * @return void
	 */
	public function removeUrl(\PeterBenke\PbConcertlist\Domain\Model\Url $urlToRemove) {
		$this->url->detach($urlToRemove);
	}

	/**
	 * Returns the url
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PeterBenke\PbConcertlist\Domain\Model\Url> $url
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * Sets the url
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PeterBenke\PbConcertlist\Domain\Model\Url> $url
	 * @return void
	 */
	public function setUrl(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $url) {
		$this->url = $url;
	}

}