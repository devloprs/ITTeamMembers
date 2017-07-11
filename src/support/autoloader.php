<?php
/**
 * File autoloader functionality *
 * @package     jellifish\ITTeamMembers\Support
 * @since       1.0.0
 * @author      Bradley Hamilton
 * @link        https://jellifish.io
 * @license     GNU General Public License 2.0+
 */

namespace jellifish\ITTeamMembers\Support;

/**
 * Load all of the plugin's files.
 *
 * @since 1.0.0
 *
 * @param string $src_root_dir Root directory for the source files
 *
 * @return void
 */
function autoload_files($src_root_dir)
{

    $filenames = array (
        'custom/post-type',
        'custom/taxonomy',
        'support/styles',
        'support/functions',
        'support/isotopeEnqueue',

    );

    foreach ($filenames as $filename) {
        include_once ($src_root_dir . $filename . '.php');
    }
}







