<?php
namespace PeterBenke\PbConcertlist\Controller;

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
	 * @return void
	 */
	public function initializeView(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view){

		$this->concertRepository = $this->objectManager->get('PeterBenke\\PbConcertlist\\Domain\\Repository\\ConcertRepository');

	}


	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {

		// $sorting = Array('date' => Tx_Extbase_Persistence_Query::ORDER_ASCENDING);
		// setlocale (LC_ALL, 'de_DE');
		#echo '<pre>';
		#print_r($this->settings);
		#echo '</pre>';

		#die();
		
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