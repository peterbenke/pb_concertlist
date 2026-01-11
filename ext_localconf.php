<?php

/**
 * PbConcertlist
 */

use PeterBenke\PbConcertlist\Controller\ConcertController;

/**
 * TYPO3
 */

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die();

/**
 * Configure plugin
 */
ExtensionUtility::configurePlugin(
    'PbConcertlist',
    'Concertlist',
    [
        ConcertController::class => 'list',
    ],
    [],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
