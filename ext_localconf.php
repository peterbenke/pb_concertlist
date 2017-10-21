<?php
defined('TYPO3_MODE') or die();

/**
 * Configure plugin
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(

	'PeterBenke.' . $_EXTKEY,

	'Fepluginconcertlist',

	[
		'Concert' => 'list',
	],

	// non-cacheable actions
	[]

);

/**
 * Register icons
 */
if (TYPO3_MODE == 'BE') {
	$pageType = 'pbconclist'; // a maximum of 10 characters
	$icons = [
		'ext-pbconcertlist-wizard-icon' => 'plugin_wizard.svg',
		'apps-pagetree-folder-contains-' . $pageType => 'apps-pagetree-folder-contains-pb_concertlist.svg'
	];
	/** @var \TYPO3\CMS\Core\Imaging\IconRegistry $iconRegistry */
	$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
	foreach ($icons as $identifier => $filename) {
		$iconRegistry->registerIcon(
			$identifier,
			$iconRegistry->detectIconProvider($filename),
			['source' => 'EXT:' . $_EXTKEY . '/Resources/Public/Icons/' . $filename]
		);
	}
}

/**
 * Page TsConfig
 */
// -----------------------------------------------------------------------------------------------------------------------------------------
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:pb_concertlist/Configuration/TSConfig/ContentElementWizard.ts">');
