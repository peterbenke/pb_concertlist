<?php

declare(strict_types = 1);

namespace PeterBenke\PbConcertlist\Controller;

/**
 * PbConcertlist
 */

use PeterBenke\PbConcertlist\Domain\Repository\ConcertRepository;

/**
 * TYPO3
 */

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;

/**
 * Psr
 */

use Psr\Http\Message\ResponseInterface;


/**
 *
 * ConcertController
 *
 */
class ConcertController extends ActionController
{

    /**
     * Constructor.
     * @param ConcertRepository $concertRepository
     */
    public function __construct(protected ConcertRepository $concertRepository)
    {
    }

    /**
     * List the concerts
     * @return ResponseInterface
     * @throws InvalidQueryException
     * @noinspection PhpUnused
     */
    public function listAction(): ResponseInterface
    {

        $selection = $this->settings['selection'] ?? 0;
        $public = $this->settings['public'] ?? 'public';
        $sorting = $this->settings['sorting'] ?? 'ASC';
        $number = $this->settings['number'] ?? 0;
        $dateFrom = $this->settings['dateFrom'] ?? '';
        $dateTo = $this->settings['dateTo'] ?? '';

        $concerts = $this->concertRepository->findAllBySelection(
            intval($selection),
            $public,
            $sorting,
            intval($number),
            $dateFrom,
            $dateTo
        );

        $this->view->assign('concerts', $concerts);
        return $this->htmlResponse();

    }

}