<?php

/**
 * PbConcertlist
 */

use PeterBenke\PbConcertlist\Controller\ConcertController;

/**
 * TYPO3
 */

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

/**
 * Configure plugin
 */
ExtensionUtility::configurePlugin(
    'PbConcertlist',
    'Fepluginconcertlist',
    [
        ConcertController::class => 'list',
    ]
);

/**
 * Page TsConfig
 */
ExtensionManagementUtility::addPageTSConfig('@import \'EXT:pb_concertlist/Configuration/TSConfig/ContentElementWizard.tsconfig\'');
