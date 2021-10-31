<?php
namespace PeterBenke\PbConcertlist\Domain\Repository;

/**
 * TYPO3
 */
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * ConcertRepository
 */
class ConcertRepository extends Repository
{

	/**
	 * Returns all objects of this repository (incl. ordering)
	 * @var array Sorting
	 * @return array|QueryResultInterface An array of objects, empty if no objects found
	*/
	public function findAll($sorting = ['date' => QueryInterface::ORDER_DESCENDING])
	{
		$query = $this->createQuery();
		$query->setOrderings($sorting);
		return $query->execute();
	}

	/**
	 * Returns all objects of this repository
	 *
	 * @param int|null $selection
	 * @param string|null $public all/public/private
	 * @param string|null $sorting ASC/DESC
	 * @param int|null $number Limit
	 * @param string|null $dateFrom timestamp
	 * @param string|null $dateTo timestamp
	 * @return array|QueryResultInterface
	 * @throws InvalidQueryException
	 */
	public function findAllBySelection(
		?int $selection,
		?string $public,
		?string $sorting,
		?int $number,
		?string $dateFrom,
		?string $dateTo
	) {

		$selection = intval($selection);
		
		if($sorting != 'ASC'){
			$sortArray = ['date' => QueryInterface::ORDER_DESCENDING];
		} else{
			$sortArray = ['date' => QueryInterface::ORDER_ASCENDING];
		}
		
		$number = intval($number);
		
		$query = $this->createQuery();
		$query->setOrderings($sortArray);
		if($number > 0){
			$query->setLimit($number);
		}

		$dateFrom = intval($dateFrom);
		$dateTo	= intval($dateTo);
		
		$where = [];
		
		switch($selection){
			
			// All concerts => nothing more to do

			// Only new concerts
			case 2:
				// subtract one day (86400), because date of concert is saved as 0:00
				// for example 04.07.2013 is over when this day begins
				$where[] = $query->greaterThanOrEqual('date', time()-86400);
				break;

			// Only prospective concerts
			case 3:
				$where[] = $query->lessThan('date', time()-86400);
				break;

			// Only the next concert
			case 4:
				$where[] = $query->greaterThanOrEqual('date', time()-86400);
				$query->setOrderings(['date' => QueryInterface::ORDER_ASCENDING]);
				$query->setLimit(1);

			break;

			// Within a period
			case 5:
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