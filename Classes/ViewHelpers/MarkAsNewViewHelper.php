<?php

namespace PeterBenke\PbConcertlist\ViewHelpers;

/**
 * TYPO3Fluid
 */

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractConditionViewHelper;

/**
 * Php
 */

use DateTime;

/**
 * MarkAsNewViewHelper
 * @noinspection PhpUnused
 */
class MarkAsNewViewHelper extends AbstractConditionViewHelper
{

    /**
     * Initialize arguments
     */
    #[\Override]
    public function initializeArguments(): void
    {
        $this->registerArgument('markAsNewUntil', 'object', 'DateTime object');
        parent::initializeArguments();
    }

    /**
     * Evaluate
     * @param array $arguments
     * @param RenderingContextInterface $renderingContext
     * @return bool
     */
    public static function verdict(array $arguments, RenderingContextInterface $renderingContext): bool
    {

        if (isset($arguments['markAsNewUntil'])) {
            $date = $arguments['markAsNewUntil'];
            if ($date instanceof DateTime && date('Ymd') <= $date->format('Ymd')) {
                return true;
            }
        }

        return false;

    }

}