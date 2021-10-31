<?php
namespace PeterBenke\PbConcertlist\ViewHelpers;

/**
 * TYPO3Fluid
 */
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractConditionViewHelper;

/**
 * DateTime
 */
use DateTime;

/**
 * IsOverViewHelper
 */
class IsOverViewHelper extends AbstractConditionViewHelper
{

	/**
	 * Initialize arguments
	 */
	public function initializeArguments(){
		$this->registerArgument('date', 'object', 'DateTime object');
		parent::initializeArguments();
	}

	/**
	 * Evaluate
	 * @param array|null $arguments
	 * @return bool
	 */
	protected static function evaluateCondition($arguments = null): bool
	{

		if(isset($arguments['date'])){
			$date = $arguments['date'];
			if ($date instanceof DateTime) {
				if(date('Ymd') > $date->format('Ymd')){
					return true;
				}
			}
		}

		return false;

	}

}
