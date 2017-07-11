<?php
/**
 * ITTeamMembers.php
 * Description
 *
 * Date: 6/30/2017
 * Time: 10:51 AM
 * @package jellifish\ITTeamMembers\Support
 * @since   1.0.0
 * @author  Midi Hipi
 * @link    https://jellifish.com
 * @link    https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @license GNU General Public License 2.0
 */

namespace jellifish\ITTeamMembers\Support;

add_action ( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_styles' );

function enqueue_styles()
{

    wp_register_style ( 'IsotopeStyle', ITTeamMembers_URL . 'src/css/app.css' );

    wp_enqueue_style ( 'IsotopeStyle' );
}

