<?php
namespace PeterBenke\PbConcertlist\Controller;

/**
 *
 * ConcertController
 *
 */
class ConcertController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * concertRepository
	 *
	 * @var \PeterBenke\PbConcertlist\Domain\Repository\ConcertRepository
	 */
	protected $concertRepository;

	/**
	 * @param \PeterBenke\PbConcertlist\Domain\Repository\ConcertRepository $concertRepository
	 */
	public function injectConcertRepository(\PeterBenke\PbConcertlist\Domain\Repository\ConcertRepository $concertRepository)
	{
		$this->concertRepository = $concertRepository;
	}

	/**
	 * @return void
	 * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
	 */
	public function listAction() {

		// $sorting = Array('date' => Tx_Extbase_Persistence_Query::ORDER_ASCENDING);
		// setlocale (LC_ALL, 'de_DE');
		// echo '<pre>';
		// print_r($this->settings);
		// echo '</pre>';

		// die();

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