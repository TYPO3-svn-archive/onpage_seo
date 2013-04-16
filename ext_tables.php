<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Sitemap',
	'Sitemap'
);

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Keywordmap',
	'Keywordmap'
);

if (TYPO3_MODE === 'BE') {

	/**
	 * Registers a Backend Module
	 */
	Tx_Extbase_Utility_Extension::registerModule(
		$_EXTKEY,
		'web',	 // Make module a submodule of 'web'
		'seo',	// Submodule key
		'',						// Position
		array(
			'Pages' => 'list, show','Keywords' => 'list, show',
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_seo.xml',
		)
	);

}

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'OnPage SEO');

$tmp_onpage_seo_columns = array(

	'titletag' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:onpage_seo/Resources/Private/Language/locallang_db.xml:tx_onpageseo_domain_model_pages.titletag',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'canonicaltag' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:onpage_seo/Resources/Private/Language/locallang_db.xml:tx_onpageseo_domain_model_pages.canonicaltag',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'fbimage' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:onpage_seo/Resources/Private/Language/locallang_db.xml:tx_onpageseo_domain_model_pages.fbimage',
		'config' => array(
			'type' => 'group',
			'internal_type' => 'file',
			'uploadfolder' => 'uploads/tx_onpageseo',
			'show_thumbs' => 1,
			'size' => 5,
			'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
			'disallowed' => '',
		),
	),
	'fbdesc' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:onpage_seo/Resources/Private/Language/locallang_db.xml:tx_onpageseo_domain_model_pages.fbdesc',
		'config' => array(
			'type' => 'text',
			'cols' => 40,
			'rows' => 15,
			'eval' => 'trim'
		),
	),
	'gplusdesc' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:onpage_seo/Resources/Private/Language/locallang_db.xml:tx_onpageseo_domain_model_pages.gplusdesc',
		'config' => array(
			'type' => 'text',
			'cols' => 40,
			'rows' => 15,
			'eval' => 'trim'
		),
	),
	'keywords' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:onpage_seo/Resources/Private/Language/locallang_db.xml:tx_onpageseo_domain_model_pages.keywords',
		'config' => array(
			'type' => 'select',
			'foreign_table' => 'tx_onpageseo_domain_model_keywords',
			'MM' => 'tx_onpageseo_pages_keywords_mm',
			'size' => 10,
			'autoSizeMax' => 30,
			'maxitems' => 9999,
			'multiple' => 0,
			'wizards' => array(
				'_PADDING' => 1,
				'_VERTICAL' => 1,
				'edit' => array(
					'type' => 'popup',
					'title' => 'Edit',
					'script' => 'wizard_edit.php',
					'icon' => 'edit2.gif',
					'popup_onlyOpenIfSelected' => 1,
					'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
					),
				'add' => Array(
					'type' => 'script',
					'title' => 'Create new',
					'icon' => 'add.gif',
					'params' => array(
						'table' => 'tx_onpageseo_domain_model_keywords',
						'pid' => '###CURRENT_PID###',
						'setValue' => 'prepend'
						),
					'script' => 'wizard_add.php',
				),
			),
		),
	),
);

t3lib_extMgm::addTCAcolumns('pages',$tmp_onpage_seo_columns);

$TCA['pages']['columns'][$TCA['pages']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:onpage_seo/Resources/Private/Language/locallang_db.xml:pages.tx_extbase_type.Tx_OnpageSeo_Pages','Tx_OnpageSeo_Pages');

$TCA['pages']['types']['Tx_OnpageSeo_Pages']['showitem'] = $TCA['pages']['types']['1']['showitem'];
$TCA['pages']['types']['Tx_OnpageSeo_Pages']['showitem'] .= ',--div--;LLL:EXT:onpage_seo/Resources/Private/Language/locallang_db.xml:tx_onpageseo_domain_model_pages,';
$TCA['pages']['types']['Tx_OnpageSeo_Pages']['showitem'] .= 'titletag, canonicaltag, fbimage, fbdesc, gplusdesc, keywords';

t3lib_extMgm::addLLrefForTCAdescr('tx_onpageseo_domain_model_keywords', 'EXT:onpage_seo/Resources/Private/Language/locallang_csh_tx_onpageseo_domain_model_keywords.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_onpageseo_domain_model_keywords');
$TCA['tx_onpageseo_domain_model_keywords'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:onpage_seo/Resources/Private/Language/locallang_db.xml:tx_onpageseo_domain_model_keywords',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Keywords.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_onpageseo_domain_model_keywords.gif'
	),
);

?>