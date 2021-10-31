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
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;

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
	protected $concertRepository;

	/**
	 * Extbase standard function
	 * @param ViewInterface $view
	 * @return void
	 */
	public function initializeView(ViewInterface $view)
	{
		$this->concertRepository = $this->objectManager->get(ConcertRepository::class);
	}

	/**
	 * List the concerts
	 * @return void
	 * @throws InvalidQueryException
	 */
	public function listAction() {

		$concerts = $this->concertRepository->findAllBySelection(
			intval($this->settings['selection']),
			$this->settings['public'],
			$this->settings['sorting'],
			intval($this->settings['number']),
			$this->settings['dateFrom'],
			$this->settings['dateTo']
		);

		$this->view->assign('concerts', $concerts);

	}

}