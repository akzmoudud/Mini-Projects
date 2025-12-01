<?php
/*
Plugin Name: WeTuts
Description: A plugin for WeTuts tutorials.
Version: 1.00
Author: Moudud
Author URL: https://moududahmed.com
License: GPL2
Text Domain: wetuts
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if( is_admin() ) {
    require_once plugin_dir_path( __FILE__ ) . 'includes/admin/profile.php';
}

function wetuts_seo_tags() {
    ?>
        <!-- WeTuts SEO Meta Tags -->
        <meta name="description" content="This is a WeTuts tutorial post.">';
        <meta name="keywords" content="WeTuts, tutorial, WordPress, plugin">';
        <!-- End of WeTuts SEO Meta Tags -->
    <?php
}
add_action( 'wp_head', 'wetuts_seo_tags');

function wetuts_wp_footer()
{
    echo '<!-- WeTuts Footer Message -->';
    echo '<h1>Hello Sunshine</h1>';
    echo '<!-- End of WeTuts Footer Message -->';
}
add_action('wp_footer', 'wetuts_wp_footer');

function wetuts_author_bio($content) {
    global $post;
    $author = get_user_by( 'id', $post->post_author);
    $bio = get_user_meta( $author->ID, 'description', true );
    $facebook = get_user_meta( $author->ID, 'facebook', true );
    $twitter = get_user_meta( $author->ID, 'twitter', true );
    $linkedin = get_user_meta( $author->ID, 'linkedin', true );
    ob_start();
    ?>
    <div class="author-box">
        <h3 class="author-box__title">
            About the Author: <?php echo esc_html( $author->display_name ); ?>
        </h3>

        <p class="author-box__bio">
            <?php echo esc_html( $bio ); ?>
        </p>

        <div class="author-box__socials">
            <?php if ( $facebook ) : ?>
                <a class="author-box__social-link" href="<?php echo esc_url( $facebook ); ?>" target="_blank">
                    Facebook
                </a>
            <?php endif; ?>

            <?php if ( $twitter ) : ?>
                <a class="author-box__social-link" href="<?php echo esc_url( $twitter ); ?>" target="_blank">
                    Twitter
                </a>
            <?php endif; ?>

            <?php if ( $linkedin ) : ?>
                <a class="author-box__social-link" href="<?php echo esc_url( $linkedin ); ?>" target="_blank">
                    LinkedIn
                </a>
            <?php endif; ?>
        </div>
    </div>

    <?php
    $bio_content = ob_get_clean();
    return $content . $bio_content;
}
add_filter('the_content', 'wetuts_author_bio');

function wetuts_enqueue_scripts() {
    wp_enqueue_style( 'wetuts-style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
    //wp_enqueue_script( 'wetuts-script', plugin_dir_url( __FILE__ ) . 'assets/js/wetuts-script.js', array('jquery'), null, true );
}
add_action( 'wp_enqueue_scripts', 'wetuts_enqueue_scripts' );
