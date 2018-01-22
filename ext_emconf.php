<?php

$EM_CONF[$_EXTKEY] = [
	'title' => 'Concertlist',
	'description' => 'This extension generates a list of concerts for bands',
	'category' => 'fe',
	'author' => 'Peter Benke',
	'author_email' => 'info@typomotor.de',
	'author_company' => 'TYPO motor',
	'state' => 'stable',
	'uploadfolder' => 0,
	'clearCacheOnLoad' => 1,
	'version' => '3.0.3',
	'constraints' => [
		'depends' => [
			'typo3' => '7.6.0-8.7.99',
		],
		'conflicts' => [],
		'suggests' => [],
	],
];


