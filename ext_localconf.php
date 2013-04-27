<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Sitemap',
	array(
		'Page' => 'list, show, new, create, edit, update, delete, test',
		'Keyword' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Page' => 'create, update, delete, ',
		'Keyword' => 'create, update, delete',
		
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Keywordmap',
	array(
		'Page' => 'list, show',
		'Keyword' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Page' => '',
		'Keyword' => '',
		
	)
);
?>