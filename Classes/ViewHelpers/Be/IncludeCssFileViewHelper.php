<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012-2013 Armin Rüdiger Vieweg <armin@v.ieweg.de>
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
 * This view helper adds css file to pagerenderer
 *
 * @copyright  2012-2013 Copyright belongs to the respective authors
 * @license    http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_OnpageSeo_ViewHelpers_Be_IncludeCssFileViewHelper extends Tx_Fluid_ViewHelpers_Be_AbstractBackendViewHelper {

    /**
     * Adds css file to pagerenderer
     *
     * @param string $path to css file
     * @return void
     */
    public function render($path) {
        $doc = $this->getDocInstance();
        $pageRenderer = $doc->getPageRenderer();
        $pageRenderer->addCssFile($path);
    }
}
?>