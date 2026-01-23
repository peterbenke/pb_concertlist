<?php

/**
 * TYPO3
 */

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

// see: https://docs.typo3.org/m/typo3/reference-coreapi/12.4/en-us/ApiOverview/FlexForms/Index.html

ExtensionUtility::registerPlugin(
    'PbConcertlist',
    'Fepluginconcertlist',
    'LLL:EXT:pb_concertlist/Resources/Private/Language/locallang_be.xlf:plugin_title'
);

$pluginSignature = 'pbconcertlist_fepluginconcertlist';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:pb_concertlist/Configuration/FlexForms/flexform.xml'
);
