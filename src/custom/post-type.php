<?php

/**
 * IT Team Member Custom Post Type functionality
 *
 * @package     jellifish\ITTeamMembers\Custom
 * @since       1.0.0
 * @author      Bradley Hamilton
 * @link        https://jellifish.io
 * @license     GNU General Public License 2.0+
 *
 */

namespace jellifish\ITTeamMembers\Custom;


add_action ( 'init', __NAMESPACE__ . '\custom_post_type' );

/**
 * Register the custom post type.
 *
 * @since 1.0.0
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 *
 * @return void
 */

// Register Custom Post Type
function custom_post_type()
{

    $labels = array (
        'name' => _x ( 'ITTeamMembers', 'Post Type General Name', 'itteammembers' ),
        'singular_name' => _x ( 'ITTeamMember', 'Post Type Singular Name', 'itteammembers' ),
        'menu_name' => __ ( 'IT Team Members', 'itteammembers' ),
        'name_admin_bar' => __ ( 'IT Team Member', 'itteammembers' ),
        'archives' => __ ( 'IT Team Member Archives', 'itteammembers' ),
        'attributes' => __ ( 'IT Team Member Attributes', 'itteammembers' ),
        'parent_item_colon' => __ ( 'IT Team Member:', 'itteammembers' ),
        'all_items' => __ ( 'All IT Team Members', 'itteammembers' ),
        'add_new_item' => __ ( 'Add New IT Team Member', 'itteammembers' ),
        'add_new' => __ ( 'Add New IT Team Member', 'itteammembers' ),
        'new_item' => __ ( 'New Item IT Team Member', 'itteammembers' ),
        'edit_item' => __ ( 'Edit IT Team Member', 'itteammembers' ),
        'update_item' => __ ( 'Update IT Team Member', 'itteammembers' ),
        'view_item' => __ ( 'View IT Team Member', 'itteammembers' ),
        'view_items' => __ ( 'View IT Team Members', 'itteammembers' ),
        'search_items' => __ ( 'Search IT Team Members', 'itteammembers' ),
        'not_found' => __ ( 'IT Team Member Not found', 'itteammembers' ),
        'not_found_in_trash' => __ ( 'IT Team Member Not found in Trash', 'itteammembers' ),
        'featured_image' => __ ( 'IT Team Member Image', 'itteammembers' ),
        'set_featured_image' => __ ( 'IT Team Member image', 'itteammembers' ),
        'remove_featured_image' => __ ( 'Remove IT Team Member image', 'itteammembers' ),
        'use_featured_image' => __ ( 'Use as IT Team Member image', 'itteammembers' ),
        'uploaded_to_this_item' => __ ( 'IT Team Member Uploaded to this item', 'itteammembers' ),
        'items_list' => __ ( 'IT Team Members', 'itteammembers' ),
        'items_list_navigation' => __ ( 'IT Team Member navigation', 'itteammembers' ),
        'filter_items_list' => __ ( 'Filter IT Team Member', 'itteammembers' ),
    );
    $args = array (
        'label' => __ ( 'IT Team Member', 'itteammembers' ),
        'description' => __ ( 'IT Team Members', 'itteammembers' ),
        'labels' => $labels,
        'menu_icon' => 'dashicons-groups',
        'supports' => array ( 'title', 'editor', 'thumbnail', ),
        'taxonomies' => array ( 'post_tag', ' itteammembers' ),
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',


    );

    register_post_type ( 'it_team_members', $args );

}

//   Un comment the below code to add single and archive templates if desired ///////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

//function it_team_members_template($single_template) {
//
//    if ( is_singular ('it_team_members') ) {
//
//        $single_template = ITTeamMembers_DIR . '/src/custom/templates/it_team_members_template.php';
//    }
//    return $single_template;
//}
//add_filter( 'single_template', __NAMESPACE__ . '\it_team_members_template' );
//
//function it_team_members_archive_template( $archive_template ) {
//
//    if ( is_post_type_archive ( 'it_team_members' ) ) {
//
//        $archive_template = ITTeamMembers_DIR . '/src/custom/templates/it_team_members_archive_template.php';
//    }
//    return $archive_template;
//}
//
//add_filter( 'archive_template', __NAMESPACE__ . '\it_team_members_archive_template' ) ;
