<?php
namespace PeterBenke\PbConcertlist\Domain\Model;

/**
 * TYPO3
 */
use TYPO3\CMS\Extbase\DomainObject\AbstractValueObject;

/**
 *
 * Url
 *
 */
class Url extends AbstractValueObject
{

	/**
	 * @var string|null
	 */
	protected $url;

	/**
	 * @return string|null $url
	 */
	public function getUrl(): ?string
	{
		return $this->url;
	}

	/**
	 * @param string|null $url
	 */
	public function setUrl(?string $url)
	{
		$this->url = $url;
	}

}