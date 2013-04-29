<?php
/**
 * This class is a view helper the BE-module. It changes the color for the title
 */
class Tx_OnpageSeo_ViewHelpers_TitleBackgroundViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

    /**
     * Renders the title with colors, this shows the user if his title has a good size or not
     *
     * @param string $type the content of the title tag
     * @return string the colored/formatted title
     */
    public function render($type='title') {
        $check_string = $this->renderChildren();
        return $this->backgroundFormat($check_string, $type);
    }

    /**
     * @return void
     */
    public function backgroundFormat($check_string = '', $type = ''){
        switch($type){
            case 'title': // for the 'title'
                $min_len = 50;
                $max_len = 75;
                $tolerance = 0.1;
                $len_type = char;
                break;
        }
        $min_tolerance = round( $min_len - ($min_len * $tolerance) );
        $max_tolerance = round( $max_len + ($max_len * $tolerance) );

        // check boundary
        if($len_type == 'char'){
            // check by char
            if( strlen($check_string) <= $max_len && strlen($check_string) >= $min_len ){
                // OK, in boundaries
                $color = 'green';
            } elseif(strlen($check_string) <= $max_tolerance && strlen($check_string) >= $min_tolerance) {
                $color = 'yellow';
            } else {
                $color = 'red';
            }
        } else {
            // check by word

        }

        // format + return the output
        return '<span class="title_' . $color . '">' . $check_string . '</span>';
    }
}

?>