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
class tx_OnpageSeo_tcemainprocdm {
    public function processDatamap_preProcessFieldArray(&$incomingFieldArray, $table, $id, $callingTCEMAIN) {
        if($table == 'pages') {
            $sql = "SELECT keyword.title as title
                    FROM  tx_onpageseo_page_keyword_mm mm
                        LEFT JOIN tx_onpageseo_domain_model_keyword keyword
                            ON (keyword.uid = mm.uid_foreign)
                    WHERE mm.uid_local = ".$id."
                    ORDER BY mm.sorting";

            $res = $GLOBALS['TYPO3_DB']->sql_query($sql);

            $keywords = array();
            while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
                $keywords[] = $row['title'];
            }

            $incomingFieldArray["keywords"] = implode(', ', $keywords);
        }
    }
}
?>