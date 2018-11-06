<?php
/*
Plugin Name: Ninja Forms - Mods for City Dogs, Roanoke
Description: A Ninja Forms support plugin
    1. Alter the functionality of the Datepicker (calendar pop up in a form date field0
        a. display the month from SUN - SAT
        b. block specific dates from use (dates the business is closed to the public)
        c. block use of dates before today (for drop off and pick up dates) (accomplished by Pikaday)
        d. for pick up date, block dates before drop off date plus one day
Version: 1.0.0
License: GNU GPL
License URI: https://www.gnu.org/licenses/gpl.html
Author: Based on script examples by Ninja Forms, edits by Erin Contour
Author URI: http://developer.ninjaforms.com/codex/datepicker/, https://escape2.design
*/

/* from index.php http://developer.ninjaforms.com/codex/datepicker/ */
/* This radio msg is triggered after the date field's view is rendered, so the datepicker has already been initialized. */

/* filters are 1 of 2 types of hooks (the other is actions), providing a way for functions to modify the data of other functions
  function passes string $tag, callable function_to_add */
add_filter( 'ninja_forms_enqueue_scripts', 'nf_datepicker_options' );
/* wp_enqueue_script - enqueue a script, i.e. links a script file to the generated page at the right time according to the
  script dependencies (if the script has not been already included and if all the dependencies have been registered.)
  This is the recommended way to link Javascript to a WordPress generated page.
  function passes $handle (full name of script, unique), $src (full URL of the script or the path of the script relative
  to WordPress root directory), $deps (an array of registered script handles this script depends on), $ver (string specifying
  script version number, if it has one), $in_footer (whether to enqueue the script before </body> insted of in the <head>) */
/* plugin_dir_url(__FILE__) gets the URL (with trailing slash) for the plugin __FILE__ passed in
   __FILE__ is a predefined constant containing the path and name of the currently executing file.
   The function plugin_dir_url then stripes off the filename. */
function nf_datepicker_options() {
    wp_enqueue_script( 'nf_datepicker_options', plugin_dir_url(__FILE__).'customDatePicker.js', array( 'jquery' ), false, true );
}
