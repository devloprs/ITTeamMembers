<?php

/**
 * IT Team Member Custom Post Type Taxonomy functionality.
 *
 * @package     jellifish\ITTeamMembers\Custom\ITTeamMembers-TAX
 * @since       1.0.0
 * @author      Bradley Hamilton
 * @link        https://jellifish.io
 * @license     GNU General Public License 2.0+
 *
 */


namespace jellifish\ITTeamMembers\Custom;

add_action ( 'init', __NAMESPACE__ . '\register_custom_taxonomy' );

/**
 * Register the taxonomy.
 *
 * @since 1.0.0
 *
 * @return void
 */

function register_custom_taxonomy()
{


    $labels = array (
        'name' => _x ( 'Departments', 'taxonomy general name', 'itteammembers' ),
        'singular_name' => _x ( 'department', 'taxonomy singular name', 'itteammembers' ),
        'search_items' => __ ( 'Search Departments', 'itteammembers' ),
        'popular_items' => __ ( 'Popular Departments', 'itteammembers' ),
        'all_items' => __ ( 'All Departments', 'itteammembers' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __ ( 'Edit Departments', 'itteammembers' ),
        'update_item' => __ ( 'Update Departments', 'itteammembers' ),
        'add_new_item' => __ ( 'Add New Departments', 'itteammembers' ),
        'new_item_name' => __ ( 'New Departments Name', 'itteammembers' ),
        'separate_items_with_commas' => __ ( 'Separate department with commas', 'itteammembers' ),
        'add_or_remove_items' => __ ( 'Add or remove department', 'itteammembers' ),
        'choose_from_most_used' => __ ( 'Choose from the most used department', 'itteammembers' ),
        'not_found' => __ ( 'No department found.', 'itteammembers' ),
        'menu_name' => __ ( 'Departments', 'itteammembers' ),
    );

    $args = array (
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array ( 'slug' => 'department' ),
    );

    register_taxonomy ( 'department', 'it_team_members', $args );
    wp_insert_term ( 'Development', 'department' );
    wp_insert_term ( 'Development', 'department' );
    wp_insert_term ( 'Project Management', 'department' );
    wp_insert_term ( 'Infrastructure', 'department' );
    wp_insert_term ( 'Database', 'department' );

}


