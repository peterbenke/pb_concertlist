<?php
namespace PeterBenke\PbConcertlist\ViewHelpers;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use \DateTime;

/**
 *
 * WeekdayViewHelper
 *
 */
class WeekdayViewHelper extends AbstractViewHelper {

	/**
	 * Initialize arguments
	 */
	public function initializeArguments(){
		parent::initializeArguments();
		$this->registerArgument('date', 'object', 'DateTime object');
	}

	/**
	 * Returns a weekday as a number
	 * @param array|null $arguments
	 * @return string
	 */
	public function render() {

		if(isset($this->arguments['date'])){
			$date = $this->arguments['date'];
			if ($date instanceof DateTime) {
				return $date->format('w');
			}
		}

		return '';

	}

}
