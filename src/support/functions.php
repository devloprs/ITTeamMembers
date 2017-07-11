<?php
/**
 * functions.php
 * Adds Short Code Functionality to the IT Team Members Plugin
 *
 * Date: 6/30/2017
 * Time: 5:09 PM
 * @package jellifish\ITTeamMembers\Support;
 * @since   1.0.0
 * @author  Midi Hipi
 * @link    https://jellifish.io
 * @license GNU General Public License 2.0
 */

namespace jellifish\ITTeamMembers\Support;

add_shortcode ( ct_team, __NAMESPACE__ . '\shortcode_query' );

use wp_query;

/*
 * shortcode_query
 * performs query and provides structure w/ markup for ct_team
 */

function shortcode_query()
{

    $atts = array (
        'post_type' => 'it_team_members',
        'order' => 'ASC',
        'post_status' => 'publish'
    );


    ?>
    <div class="ittm">
        <ul id="filters">
            <button type="button" class="ittm btn btn-secondary"><a href="" data-filter="*"
                                                                    class="selected">Everything</a></button>
            <?php
            $terms = get_terms ( 'department' ); // you can use any taxonomy
            $count = count ( $terms ); //How many are they?
            if ($count > 0) {  //If there are more than 0 terms
                foreach ($terms as $term) {  //for each term:
                    echo "<button type=\"button\" class=\"ittm btn btn-secondary\"><a href='' data-filter='." . $term->slug . "'>" . $term->name . "</a></button>\n";
                    //create a list item with the current term slug for sorting, and name for label
                }
            } ?>
        </ul>
        <?php
        $terms_ID_array = array ();
        foreach ($terms as $term) {
            $terms_ID_array[] = $term->term_id;
        }

        $terms_ID_string = implode ( ',', $terms_ID_array ); // Create a string with all the IDs, separated by commas
        $the_query = new WP_Query( $atts, $options, 'cat=' . $terms_ID_string ); // Display 50 posts that belong to the categories in the string
        ?>
        <?php if ($the_query->have_posts ()) : ?>

        <div id="isotope-list" class="grid">

            <?php while ($the_query->have_posts ()) : $the_query->the_post ();
                $termsArray = get_the_terms ( $post->ID, "department" );  //Get the terms for this particular item
                $termsString = ""; //initialize the string that will contain the terms
                foreach ($termsArray as $term) { // for each term
                    $termsString .= $term->slug . ' '; //create a string that has all the slugs
                } ?>
                <div class="<?php echo $termsString; ?> col-sm-6 col-md-4 card isotope-item item">
                    <?php if (has_post_thumbnail ()) : ?>
                        <a href="<?php the_permalink (); ?>" title="<?php the_title_attribute (); ?>">
                            <?php the_post_thumbnail (); ?>
                        </a>
                    <?php endif; ?>
                    <div class="ittm-title">
                        <B><?php the_title (); ?></B>
                    </div>
                </div> <!-- end item -->
            <?php endwhile; ?>
            <?php endif; ?>
        </div><!--#isotope-list -->
    </div>
    <?php wp_reset_postdata ();
} ?>


