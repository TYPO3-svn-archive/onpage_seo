<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Sitemap',
	array(
		'Pages' => 'list, show',
		'Keywords' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Pages' => '',
		'Keywords' => '',
		
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Keywordmap',
	array(
		'Pages' => 'list, show',
		'Keywords' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Pages' => '',
		'Keywords' => '',
		
	)
);

?>