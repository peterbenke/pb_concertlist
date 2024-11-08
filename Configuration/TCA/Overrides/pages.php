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
