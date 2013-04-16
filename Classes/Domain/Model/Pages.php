<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Arne Lorenz <me@arnelorenz.de>, LRNZ
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package onpage_seo
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_OnpageSeo_Domain_Model_Pages extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * SEO-Title
	 *
	 * @var string
	 */
	protected $titletag;

	/**
	 * canonicaltag
	 *
	 * @var string
	 */
	protected $canonicaltag;

	/**
	 * Facebook Image
	 *
	 * @var string
	 */
	protected $fbimage;

	/**
	 * Facebook Description
	 *
	 * @var string
	 */
	protected $fbdesc;

	/**
	 * Google Plus Description
	 *
	 * @var string
	 */
	protected $gplusdesc;

	/**
	 * Add Keywords from List - use them like tags
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_OnpageSeo_Domain_Model_Keywords>
	 */
	protected $keywords;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->keywords = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the titletag
	 *
	 * @return string $titletag
	 */
	public function getTitletag() {
		return $this->titletag;
	}

	/**
	 * Sets the titletag
	 *
	 * @param string $titletag
	 * @return void
	 */
	public function setTitletag($titletag) {
		$this->titletag = $titletag;
	}

	/**
	 * Returns the canonicaltag
	 *
	 * @return string $canonicaltag
	 */
	public function getCanonicaltag() {
		return $this->canonicaltag;
	}

	/**
	 * Sets the canonicaltag
	 *
	 * @param string $canonicaltag
	 * @return void
	 */
	public function setCanonicaltag($canonicaltag) {
		$this->canonicaltag = $canonicaltag;
	}

	/**
	 * Returns the fbimage
	 *
	 * @return string $fbimage
	 */
	public function getFbimage() {
		return $this->fbimage;
	}

	/**
	 * Sets the fbimage
	 *
	 * @param string $fbimage
	 * @return void
	 */
	public function setFbimage($fbimage) {
		$this->fbimage = $fbimage;
	}

	/**
	 * Returns the fbdesc
	 *
	 * @return string $fbdesc
	 */
	public function getFbdesc() {
		return $this->fbdesc;
	}

	/**
	 * Sets the fbdesc
	 *
	 * @param string $fbdesc
	 * @return void
	 */
	public function setFbdesc($fbdesc) {
		$this->fbdesc = $fbdesc;
	}

	/**
	 * Returns the gplusdesc
	 *
	 * @return string $gplusdesc
	 */
	public function getGplusdesc() {
		return $this->gplusdesc;
	}

	/**
	 * Sets the gplusdesc
	 *
	 * @param string $gplusdesc
	 * @return void
	 */
	public function setGplusdesc($gplusdesc) {
		$this->gplusdesc = $gplusdesc;
	}

	/**
	 * Adds a Keywords
	 *
	 * @param Tx_OnpageSeo_Domain_Model_Keywords $keyword
	 * @return void
	 */
	public function addKeyword(Tx_OnpageSeo_Domain_Model_Keywords $keyword) {
		$this->keywords->attach($keyword);
	}

	/**
	 * Removes a Keywords
	 *
	 * @param Tx_OnpageSeo_Domain_Model_Keywords $keywordToRemove The Keywords to be removed
	 * @return void
	 */
	public function removeKeyword(Tx_OnpageSeo_Domain_Model_Keywords $keywordToRemove) {
		$this->keywords->detach($keywordToRemove);
	}

	/**
	 * Returns the keywords
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_OnpageSeo_Domain_Model_Keywords> $keywords
	 */
	public function getKeywords() {
		return $this->keywords;
	}

	/**
	 * Sets the keywords
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_OnpageSeo_Domain_Model_Keywords> $keywords
	 * @return void
	 */
	public function setKeywords(Tx_Extbase_Persistence_ObjectStorage $keywords) {
		$this->keywords = $keywords;
	}

}
?>