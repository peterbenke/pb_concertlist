<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'PeterBenke.' . $_EXTKEY,
	'Fepluginconcertlist',
	'Konzertliste'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Concertlist');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_pbconcertlist_domain_model_concert', 'EXT:pb_concertlist/Resources/Private/Language/locallang_csh_tx_pbconcertlist_domain_model_concert.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_pbconcertlist_domain_model_concert');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_pbconcertlist_domain_model_url', 'EXT:pb_concertlist/Resources/Private/Language/locallang_csh_tx_pbconcertlist_domain_model_url.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_pbconcertlist_domain_model_url');


/**
 * Flexform
 */
$pluginSignature	= 'pbconcertlist_fepluginconcertlist';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	$pluginSignature,
	'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform.xml'
);
