<?php

namespace PeterBenke\PbConcertlist\Domain\Model;

/**
 * TYPO3
 */

use TYPO3\CMS\Extbase\DomainObject\AbstractValueObject;

/**
 * Class Url
 * @noinspection PhpUnused
 */
class Url extends AbstractValueObject
{

    /**
     * @var string|null
     */
    protected ?string $url = null;

    /**
     * @return string|null
     * @noinspection PhpUnused
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @noinspection PhpUnused
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

}