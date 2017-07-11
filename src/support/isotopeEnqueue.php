<?php
/**
 * isotopeEnqueue.php
 * Date: 7/2/2017
 * Time: 11:12 AM
 * @package namespace jellifish\ITTeamMembers\Support\isotopeEnqueue
 * @since   1.0.0
 * @author  Midi Hipi
 * @link    https://jellifish.io
 * @link http://isotope.metafizzy.co
 * @link https://github.com/metafizzy/isotope
 * @link http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @link http://codex.wordpress.org/Function_Reference/wp_register_script
 * @link http://codex.wordpress.org/Function_Reference/get_post_meta
 * @uses wps_enqueue_jquery() Registers and enqueues Google CDN jQuery or WordPress jQuery.
 * @uses wp_register_script() Registers javascripts for use with wp_enqueue_script() later.
 * @uses wp_enqueue_script() Enqueues javascript.
 * @uses get_post_meta() Gets post meta for a specific post.
 * @license GNU General Public License 3.0
 */

namespace jellifish\ITTeamMembers\Support;


add_action ( 'wp_enqueue_scripts', __NAMESPACE__ . '\ittm_load_scripts' );
add_action ( 'wp_enqueue_scripts', __NAMESPACE__ . '\replace_jquery' );

function replace_jquery()
{
    //        if (!is_admin()) {
    // comment out the next two lines to load the local copy of jQuery
    wp_deregister_script ( 'jquery' );
    wp_register_script ( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', false, '1.11.3' );
    //            wp_register_script('isotope', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', false, '3.0.4');
    wp_enqueue_script ( 'jquery' );
    //            wp_enqueue_script('isotope');
    //        }
}


function ittm_load_scripts()
{
    // Setup suffix according to WordPress Coding Standards and jQuery Conventions
    // Load dev version if in debug mode
    // Must have dev versions and minified versions in js folder

    $suffix = (WP_DEBUG || WP_SCRIPT_DEBUG) ? '.js' : '.min.js';

    // Enqueue jQuery, always
    // See https://gist.github.com/4083811
    // Feel free to remove this line below, and everything will still work fine!
    //    // Register Isotope, so it can be called anytime
    //    // Prefix everything!

    wp_register_script ( 'ittm-isotope', ITTeamMembers_URL . 'src/js/isotope.pkgd.min' . $suffix, array ( 'jquery' ), '3.0.4', true );

    // Register Isotope Parameters, so it can be called anytime
    // Create minified isotope-parameters version at http://jscompress.com
    // isotope-parameters file named: isotope-parameters.min.js

    wp_enqueue_script ( 'ittm-isotope' );

    wp_register_script ( 'ittm-isotope-parameters', ITTeamMembers_URL . 'src/js/isotope-parameters.min' . $suffix, array ( 'ittm-isotope' ), '3.0.4', true );

    //    // Enqueue Isotope Scripts only when needed (home, page template, custom field set)
    //    global $post; // Remove if not using get_post_meta()
    //    if ( is_home() || is_page_template( 'my-super-cool-template.php' ) || get_post_meta( $post->ID, 'ittm_isotope' ) )

    wp_enqueue_script ( 'ittm-isotope-parameters' );

}