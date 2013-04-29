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

// Hook for adding the keywordlist to the standard keyowrd-field
$GLOBALS["TYPO3_CONF_VARS"]["SC_OPTIONS"]["t3lib/class.t3lib_tcemain.php"]["processDatamapClass"][] = 'EXT:onpage_seo/Classes/Hook/PageHook.php:tx_OnpageSeo_tcemainprocdm';


// from seobasics
/*
     // registering sitemap.xml for each hierachy of configuration to realurl (meaning to every website in a multisite installation)
if ($extconf['xmlSitemap'] == '1') {
    $realurl = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'];
    if (is_array($realurl))    {
        foreach ($realurl as $host => $cnf) {
            // we won't do anything with string pointer (e.g. example.org => www.example.org)
            if (!is_array($realurl[$host])) {
                continue;
            }

            if (!isset($realurl[$host]['fileName'])) {
                $realurl[$host]['fileName'] = array();
            }
            $realurl[$host]['fileName']['index']['sitemap.xml']['keyValues']['type'] = 776;
        }
        $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'] = $realurl;
    }
}
 * */
?>