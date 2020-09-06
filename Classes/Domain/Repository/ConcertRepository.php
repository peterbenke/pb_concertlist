<?php
namespace PeterBenke\PbConcertlist\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 *
 * ConcertRepository
 *
 */
class ConcertRepository extends Repository {

	/**
	 * Returns all objects of this repository (incl. ordering)
	 * @var array Sorting
	 *
	 * @return array An array of objects, empty if no objects found
	*/
	public function findAll($sorting = array('date' => QueryInterface::ORDER_DESCENDING)) {

		$query = $this->createQuery();
		$query->setOrderings($sorting);
		
		return $query->execute();
		
	}

	/**
	 * Returns all objects of this repository
	 * @param int $selection
	 * @param string $public all/public/private
	 * @param string $sorting ASC/DESC
	 * @param int $number Limit
	 * @param int $dateFrom timestamp
	 * @param int $dateTo timestamp
	 * @return array|QueryResultInterface
	 * @throws InvalidQueryException
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
			$sortArray = array('date' => QueryInterface::ORDER_DESCENDING);
		} else{
			$sortArray = array('date' => QueryInterface::ORDER_ASCENDING);
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
				$query->setOrderings(array('date' => QueryInterface::ORDER_ASCENDING));
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

		// $queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);
		// \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL());
		// \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getParameters());

		return $query->execute();
		
	}	

}