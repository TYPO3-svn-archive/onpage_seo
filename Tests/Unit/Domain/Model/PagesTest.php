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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Tx_OnpageSeo_Domain_Model_Pages.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage OnPage SEO
 *
 * @author Arne Lorenz <me@arnelorenz.de>
 */
class Tx_OnpageSeo_Domain_Model_PagesTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_OnpageSeo_Domain_Model_Pages
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_OnpageSeo_Domain_Model_Pages();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getTitletagReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitletagForStringSetsTitletag() { 
		$this->fixture->setTitletag('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitletag()
		);
	}
	
	/**
	 * @test
	 */
	public function getCanonicaltagReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setCanonicaltagForStringSetsCanonicaltag() { 
		$this->fixture->setCanonicaltag('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getCanonicaltag()
		);
	}
	
	/**
	 * @test
	 */
	public function getFbimageReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setFbimageForStringSetsFbimage() { 
		$this->fixture->setFbimage('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getFbimage()
		);
	}
	
	/**
	 * @test
	 */
	public function getFbdescReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setFbdescForStringSetsFbdesc() { 
		$this->fixture->setFbdesc('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getFbdesc()
		);
	}
	
	/**
	 * @test
	 */
	public function getGplusdescReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setGplusdescForStringSetsGplusdesc() { 
		$this->fixture->setGplusdesc('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getGplusdesc()
		);
	}
	
	/**
	 * @test
	 */
	public function getKeywordsReturnsInitialValueForObjectStorageContainingTx_OnpageSeo_Domain_Model_Keywords() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getKeywords()
		);
	}

	/**
	 * @test
	 */
	public function setKeywordsForObjectStorageContainingTx_OnpageSeo_Domain_Model_KeywordsSetsKeywords() { 
		$keyword = new Tx_OnpageSeo_Domain_Model_Keywords();
		$objectStorageHoldingExactlyOneKeywords = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneKeywords->attach($keyword);
		$this->fixture->setKeywords($objectStorageHoldingExactlyOneKeywords);

		$this->assertSame(
			$objectStorageHoldingExactlyOneKeywords,
			$this->fixture->getKeywords()
		);
	}
	
	/**
	 * @test
	 */
	public function addKeywordToObjectStorageHoldingKeywords() {
		$keyword = new Tx_OnpageSeo_Domain_Model_Keywords();
		$objectStorageHoldingExactlyOneKeyword = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneKeyword->attach($keyword);
		$this->fixture->addKeyword($keyword);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneKeyword,
			$this->fixture->getKeywords()
		);
	}

	/**
	 * @test
	 */
	public function removeKeywordFromObjectStorageHoldingKeywords() {
		$keyword = new Tx_OnpageSeo_Domain_Model_Keywords();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($keyword);
		$localObjectStorage->detach($keyword);
		$this->fixture->addKeyword($keyword);
		$this->fixture->removeKeyword($keyword);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getKeywords()
		);
	}
	
}
?>