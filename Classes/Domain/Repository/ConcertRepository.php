<?php
namespace PeterBenke\PbConcertlist\Domain\Repository;

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
 * ConcertRepository
 *
 */
class ConcertRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * Returns all objects of this repository (MIT Sortierung)
	 * @var array Sorting
	 *
	 * @return array An array of objects, empty if no objects found
	*/
	public function findAll($sorting = array('date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING)) {
		
		$query = $this->createQuery();
		$query->setOrderings($sorting);
		
		return $query->execute();
		
	}
	
	/**
	 * Returns all objects of this repository
	 * @var int Selection
	 * @var string Public all/public/private
	 * @var string Sorting ASC/DESC
	 * @var int Limit
	 * @var int Date from timestamp
	 * @var int Date to timestamp
	 *
	 * @return array An array of objects, empty if no objects found
	*/
	public function findAllBySelection(
		$selection,
		$public,
		$sorting,
		$number,
		$dateFrom,
		$dateTo
	) {

		$selection = intval($selection);
		
		if($sorting != 'ASC'){
			$sortArray = array('date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING);
		} else{
			$sortArray = array('date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);
		}
		
		$number = intval($number);
		
		$query = $this->createQuery();
		$query->setOrderings($sortArray);
		if($number > 0){
			$query->setLimit($number);
		}
		
		$dateFrom	= intval($dateFrom);
		$dateTo		= intval($dateTo);
		
		$where = array();
		
		switch ($selection){
			
			// All concerts => nothing more to do

			// Only new concerts
			case 2:
				#$query->matching($query->logicalAnd($query->greaterThanOrEqual('date', time())));
				
				
				// subtract one day (86400), because date of concert is saved as 0:00
				// for example 04.07.2013 is over when this day begins
				$where[] = $query->greaterThanOrEqual('date', time()-86400);
				break;

			// Only prospective concerts
			case 3:
				#$query->matching($query->logicalAnd($query->lessThan('date', time())));
				$where[] = $query->lessThan('date', time()-86400);
				break;

			// Only the next concert
			case 4:
				#$query->matching($query->logicalAnd($query->greaterThanOrEqual('date', time())));
				$where[] = $query->greaterThanOrEqual('date', time()-86400);
				$query->setOrderings(array('date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
				$query->setLimit(1);

			break;

			// Within a period
			case 5:
				#$query->matching(
				#	$query->logicalAnd(
				#		$query->greaterThanOrEqual('date', $dateFrom),
				#		$query->lessThanOrEqual('date', $dateTo)
				#	)
				#);
				$where[] = $query->greaterThanOrEqual('date', $dateFrom);
				$where[] = $query->lessThanOrEqual('date', $dateTo);

			break;

		}

		if($public == 'public'){
			$where[] = $query->equals("privateconcert", "0");
		}
		if($public == 'private'){
			$where[] = $query->equals("privateconcert", "1");
		}

		if(!empty($where)){
			$query->matching($query->logicalAnd($where));
		}

		return $query->execute();
		
	}	

}