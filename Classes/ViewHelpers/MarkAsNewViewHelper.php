<?php
namespace PeterBenke\PbConcertlist\ViewHelpers;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractConditionViewHelper;
use \DateTime;

/**
 *
 * MarkAsNewViewHelper
 *
 */
class MarkAsNewViewHelper extends AbstractConditionViewHelper {

	/**
	 * Initialize arguments
	 */
	public function initializeArguments(){
		$this->registerArgument('markAsNewUntil', 'object', 'DateTime object');
		parent::initializeArguments();
	}

	/**
	 * Evaluate
	 * @param array|null $arguments
	 * @return bool
	 */
	protected static function evaluateCondition($arguments = null) {

		if(isset($arguments['markAsNewUntil'])){
			$date = $arguments['markAsNewUntil'];
			if ($date instanceof DateTime) {
				if(date('Ymd') <= $date->format('Ymd')){
					return true;
				}
			}

		}

		return false;

	}

}