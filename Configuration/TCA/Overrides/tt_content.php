<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'PeterBenke.pb_concertlist',
	'Fepluginconcertlist',
	'LLL:EXT:pb_concertlist/Resources/Private/Language/locallang_be.xlf:plugin_title'
);


$pluginSignature	= 'pbconcertlist_fepluginconcertlist';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	$pluginSignature,
	'FILE:EXT:pb_concertlist/Configuration/FlexForms/flexform.xml'
);
