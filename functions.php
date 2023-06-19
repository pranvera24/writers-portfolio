<?php


// Enqueuing
function load_css()
{

    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', [], 1, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', [], 1, 'all');
    wp_enqueue_style('main');

    

}
add_action('wp_enqueue_scripts', 'load_css');

function load_js()
{
    wp_enqueue_script('jquery');

    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', ['jquery'], 1, true);
    wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'load_js');


// Nav Menus
register_nav_menus( array(
    'top-menu' => __( 'Top Menu', 'theme' ),
    'footer-menu' => __( 'Footer Menu', 'theme' ),
) );

// Theme Support
add_theme_support('menus');
add_theme_support( 'post-thumbnails' );

// Image Sizes
add_image_size('small', 600, 600, false);


function display_all_posts_shortcode($atts) {
    $query = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => -1,
    ));

    $output = '';

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $image = get_field('image');
            $picture = ($image && isset($image['sizes']['large'])) ? $image['sizes']['large'] : '';
            $output .= '<div class="post">';
            if ($picture) {
                $output .= '<div class="post-content">';
                $output .= '<img src="' . $picture . '" alt="homeimg" class="post-image-small">';
                $output .= '<h1 class="writings-title">' . get_the_title() . '</h1>';
                $output .= '</div>';
            }
            $output .= '<div class="content">' . get_the_content() . '</div>';
            
            $output .= '<div class="file">';
            $file = get_field('upload_file');
            $fileurl = ($file && isset($file['url'])) ? $file['url'] : '';
            if ($fileurl) {
                $output .= '<a href="' . $fileurl . '" download class="read-btn">Read the book</a>';
            }
            $output .= '</div>';
            $output .= '</div>';
        }
        wp_reset_postdata();
    } else {
        $output = '<p>No posts found.</p>';
    }

    return $output;
}
add_shortcode('display_all_posts', 'display_all_posts_shortcode');











function display_posts_by_category_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => '',
    ), $atts);

    $query_args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'category_name' => $atts['category'],
    );

    $query = new WP_Query($query_args);

    $output = '';

    if ($query->have_posts()) {
        $output .= '<div class="row">';
        while ($query->have_posts()) {
            $query->the_post();
            $image = get_field('image');
            $picture = ($image && isset($image['sizes']['large'])) ? $image['sizes']['large'] : '';
            $output .= '<div class="col-lg-4 col-md-6 mb-4">';
            $output .= '<div class="post-wrapper">';
            if ($picture) {
                $output .= '<img src="' . $picture . '" alt="homeimg" class="post-image">';
            }
            $output .= '<div class="post-content">';
            $output .= '<h2 class="post-title">' . get_the_title() . '</h2>';

            
            $publication_details = get_field('publication_details');
            $link = get_field('link');
            $excerpt = get_field('excerpt');

            if ($publication_details) {
                $output .= '<div class="publication-details">';
                $output .= '<span class="label">Publication Details:</span>';
                $output .= $publication_details;
                $output .= '</div>';
            }

            if ($excerpt) {
                $output .= '<div class="post-excerpt">';
                $output .= '<span class="label">Excerpt:</span>';
                $output .= $excerpt;
                $output .= '</div>';
            }

            if ($link) {
                $output .= '<div class="post-link"><a href="' . $link . '">Check out the writing.</a></div>';
            }

            $output .= '</div>'; 
            $output .= '</div>'; 
            $output .= '</div>'; 
        }
        $output .= '</div>'; 
        wp_reset_postdata();
    } else {
        $output = '<p>No posts found.</p>';
    }

    return $output;
}
add_shortcode('display_posts_by_category', 'display_posts_by_category_shortcode');
