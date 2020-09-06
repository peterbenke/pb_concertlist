<?php

$EM_CONF[$_EXTKEY] = [
	'title' => 'Concert list',
	'description' => 'This extension generates a list of concerts for bands',
	'category' => 'fe',
	'version' => '4.0.0',
	'state' => 'stable',
	'author' => 'Peter Benke',
	'author_email' => 'info@typomotor.de',
	'author_company' => 'TYPO motor',
	'constraints' =>[
		'depends' => [
			'typo3' => '9.5.0-9.5.99',
			'php' => '7.2',
		],
	],
];


