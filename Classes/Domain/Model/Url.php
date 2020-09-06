<?php
namespace PeterBenke\PbConcertlist\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractValueObject;

/**
 *
 * Url
 *
 */
class Url extends AbstractValueObject {

	/**
	 * url
	 *
	 * @var string
	 */
	protected $url;

	/**
	 * Returns the url
	 *
	 * @return string $url
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * Sets the url
	 *
	 * @param string $url
	 * @return void
	 */
	public function setUrl($url) {
		$this->url = $url;
	}

}