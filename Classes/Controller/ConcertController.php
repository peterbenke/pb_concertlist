<?php

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
     * @var ConcertRepository
     */
    protected ConcertRepository $concertRepository;

    /**
     * Constructor.
     * @param ConcertRepository $concertRepository
     */
    public function __construct(
        ConcertRepository $concertRepository
    ) {
        $this->concertRepository = $concertRepository;
    }

    /**
     * List the concerts
     * @return ResponseInterface
     * @throws InvalidQueryException
     * @noinspection PhpUnused
     */
    public function listAction(): ResponseInterface
    {

        $concerts = $this->concertRepository->findAllBySelection(
            intval($this->settings['selection']),
            $this->settings['public'],
            $this->settings['sorting'],
            intval($this->settings['number']),
            $this->settings['dateFrom'],
            $this->settings['dateTo']
        );

        $this->view->assign('concerts', $concerts);
        return $this->htmlResponse();

    }

}