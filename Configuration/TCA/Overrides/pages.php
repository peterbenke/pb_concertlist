<?php

defined('TYPO3') or die();

// Add new entry for folder properties "Contains plugin"
$GLOBALS['TCA']['pages']['columns']['module']['config']['items'][] = [
    'label' => 'LLL:EXT:pb_concertlist/Resources/Private/Language/locallang_db.xlf:tx_pbconcertlist_domain_model_concert.list',
    'value' => 'pb_concertlist',
    'icon' => 'apps-pagetree-folder-contains-pb_concertlist',
];

// Add the icon to this folder type
$GLOBALS['TCA']['pages']['ctrl']['typeicon_classes']['contains-pb_concertlist'] = 'apps-pagetree-folder-contains-pb_concertlist';

// Todo: remove
/**
 * Add folder icon
 */

/*
$pageType = 'pbconclist'; // a maximum of 10 characters
$iconReference = 'apps-pagetree-folder-contains-' . $pageType;

$addToModuleSelection = true;
foreach ($GLOBALS['TCA']['pages']['columns']['module']['config']['items'] as $item) {
    if ($item['1'] == $pageType) {
        $addToModuleSelection = false;
        break;
    }
}

if ($addToModuleSelection) {
    $GLOBALS['TCA']['pages']['ctrl']['typeicon_classes']['contains-' . $pageType] = $iconReference;
    $GLOBALS['TCA']['pages']['columns']['module']['config']['items'][] = [
        0 => 'LLL:EXT:pb_concertlist/Resources/Private/Language/locallang_db.xlf:tx_pbconcertlist_domain_model_concert.list',
        1 => $pageType,
        2 => $iconReference
    ];
}
*/