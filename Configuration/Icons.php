<?php

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

/**
 * IMPORTANT note:
 * If you add new icons and nothing happens, clear also the browser cache, because javascript for backend might be dynamically generated.
 * =====================================================================================================================
 */

$icons = [
    'ext-pbconcertlist-wizard-icon' => 'EXT:pb_concertlist/Resources/Public/Icons/plugin_wizard.svg',
    'apps-pagetree-folder-contains-pb_concertlist' => 'EXT:pb_concertlist/Resources/Public/Icons/apps-pagetree-folder-contains-pb_concertlist.svg',
];

// Register icons
$iconList = [];
foreach ($icons as $identifier => $path) {
    $iconList[$identifier] = [
        'provider' => SvgIconProvider::class,
        'source' => $path,
    ];
}

unset($icons);

return $iconList;