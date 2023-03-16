<?php
// Add comment for push event on github
$EM_CONF[$_EXTKEY] = [
	'title' => 'Concert list',
	'description' => 'This extension generates a list of concerts for bands',
	'category' => 'fe',
	'version' => '11.5.0',
	'state' => 'stable',
	'author' => 'Peter Benke',
	'author_email' => 'info@typomotor.de',
	'author_company' => 'TYPO motor',
	'constraints' =>[
		'depends' => [
			'typo3' => '11.5.0-11.5.99',
		],
	],
];


