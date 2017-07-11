<?php

/**
 * createIT Recruitment plugin
 *
 * @package     jellifish\ITTeamMembers
 * @author      Bradley Hamilton
 * @license     GPL-2.0+
 * @wordpress-plugin
 *
 * Plugin Name: createIT Recruitment plugin
 * Plugin URI:  https://jellfish.io
 * Description: IT Team Member Plugin for the display of custom post type: IT Team Member
 * Version:     1.0.1
 * Author:      Bradley Hamilton
 * Author URI:  https://jellifsih.io
 * Text Domain: itteammembers
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace jellifish\ITTeamMembers;

if (!defined ( 'ABSPATH' )) {
    exit( 'Cheatin&#8217; uh?' );
}

/**
 * Setup the plugin's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */


function init_constants()
{
    $plugin_url = plugin_dir_url ( __FILE__ );
    if (is_ssl ()) {
        $plugin_url = str_replace ( 'http://', 'https://', $plugin_url );
    }
    define ( 'ITTeamMembers_URL', $plugin_url );
    define ( 'ITTeamMembers_DIR', plugin_dir_path ( __DIR__ ) );
}

/**
 * Initialize the plugin hooks.
 *
 * @since 1.0.0
 *
 * @return void
 */


function init_hooks()
{
    register_activation_hook ( __FILE__, __NAMESPACE__ . '\flush_rewrites' );
    register_deactivation_hook ( __FILE__, __NAMESPACE__ . '\deactivate_plugin' );
}

/**
 * During Plugin Activation only, flush the rewrites to avoid having to go into permalink settings.
 *
 * @since 1.0.0
 *
 * @return void
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type/ see: Flushing Rewrite on Activation.
 *
 */
function flush_rewrites()
{
    init_autoloader ();

    Custom\custom_post_type ();

    flush_rewrite_rules ();
}

/**
 * During Plugin Deactivation only, delete out the rewrite rules option.
 *
 * @since 1.0.1
 *
 * @return void
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type/ see: Flushing Rewrite on Activation.
 *
 */
function deactivate_plugin()
{
    delete_option ( 'rewrite_rules' );
}

/**
 * Kick off the plugin by initializing the plugin files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_autoloader()
{
    require_once ('src/support/autoloader.php');

    Support\autoload_files ( __DIR__ . '/src/' );
}


/**
 * Launch the plugin.
 *
 * @since 1.0.0
 *
 * @return void
 */

function launch()
{
    init_constants ();
    init_hooks ();
    init_autoloader ();
}


launch ();