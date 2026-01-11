<?php

/**
 * TYPO3
 */

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die();

// see: https://docs.typo3.org/m/typo3/reference-coreapi/12.4/en-us/ApiOverview/FlexForms/Index.html

$pluginSignature = ExtensionUtility::registerPlugin(
    'PbConcertlist',
    // 'Fepluginconcertlist',
    'Concertlist',
    'LLL:EXT:pb_concertlist/Resources/Private/Language/locallang_be.xlf:plugin_title',
    'ext-pbconcertlist-wizard-icon',
    // 'default',
    'plugins',
    'LLL:EXT:pb_concertlist/Resources/Private/Language/locallang_db.xlf:tx_pbconcertlist_feplugin.description'
);

ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;Configuration,pi_flexform,',
    $pluginSignature,
    'after:subheader',
);

ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:pb_concertlist/Configuration/FlexForms/flexform.xml',
    $pluginSignature,
);

// $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';