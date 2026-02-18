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
     * @param array $sorting
     * @return QueryResultInterface|list<array<string,mixed>>
     */
    #[\Override]
    public function findAll(array $sorting = ['date' => QueryInterface::ORDER_DESCENDING]): QueryResultInterface|array
    {
        $query = $this->createQuery();
        $query->setOrderings($sorting);
        return $query->execute();
    }

    /**
     * Returns all objects of this repository
     * @param int|null $selection
     * @param string|null $public
     * @param string|null $sorting
     * @param int|null $number
     * @param string|null $dateFrom
     * @param string|null $dateTo
     * @return QueryResultInterface|list<array<string,mixed>>
     * @throws InvalidQueryException
     */
    public function findAllBySelection(
        ?int    $selection,
        ?string $public,
        ?string $sorting,
        ?int    $number,
        ?string $dateFrom,
        ?string $dateTo
    ): QueryResultInterface|array
    {

        $selection = intval($selection);

        if ($sorting != 'ASC') {
            $sortArray = ['date' => QueryInterface::ORDER_DESCENDING];
        } else {
            $sortArray = ['date' => QueryInterface::ORDER_ASCENDING];
        }

        $number = intval($number);

        $query = $this->createQuery();
        $query->setOrderings($sortArray);
        if ($number > 0) {
            $query->setLimit($number);
        }

        $dateFrom = intval($dateFrom);
        $dateTo = intval($dateTo);

        $constraints = [];

        switch ($selection) {

            // All concerts => nothing more to do

            // Only new concerts
            case 2:
                // subtract one day (86400), because date of concert is saved as 0:00
                // for example 04.07.2013 is over when this day begins
                $constraints[] = $query->greaterThanOrEqual('date', time() - 86400);
                break;

            // Only prospective concerts
            case 3:
                $constraints[] = $query->lessThan('date', time() - 86400);
                break;

            // Only the next concert
            case 4:
                $constraints[] = $query->greaterThanOrEqual('date', time() - 86400);
                $query->setOrderings(['date' => QueryInterface::ORDER_ASCENDING]);
                $query->setLimit(1);
                break;

            // Within a period
            case 5:
                $constraints[] = $query->greaterThanOrEqual('date', $dateFrom);
                $constraints[] = $query->lessThanOrEqual('date', $dateTo);
                break;

        }

        if ($public == 'public') {
            $constraints[] = $query->equals("privateconcert", "0");
        }
        if ($public == 'private') {
            $constraints[] = $query->equals("privateconcert", "1");
        }
        if (!empty($constraints)) {
            $query->matching($query->logicalAnd(...array_values($constraints)));
        }

        // Ignore storage pid
        // $query->getQuerySettings()->setRespectStoragePage(false);

        // Debug
        // $typo3DbQueryParser = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);
        // $queryBuilder = $typo3DbQueryParser->convertQueryToDoctrineQueryBuilder($query);
        // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryBuilder->getSQL());
        // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryBuilder->getParameters());
        // die();

        return $query->execute();

    }

}