<?php
// Add comment for push event on github
$EM_CONF[$_EXTKEY] = [
	'title' => 'Concert list',
	'description' => 'This extension generates a list of concerts for bands',
	'category' => 'fe',
	'version' => '10.4.0',
	'state' => 'stable',
	'author' => 'Peter Benke',
	'author_email' => 'info@typomotor.de',
	'author_company' => 'TYPO motor',
	'constraints' =>[
		'depends' => [
			'typo3' => '10.4.0-10.5.99',
		],
	],
];


