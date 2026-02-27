<?php
function my_cool_theme_setup() {
    // Register dynamic menu
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'my-cool-theme')
    ));
}
add_action('after_setup_theme', 'my_cool_theme_setup');

function my_cool_theme_assets() {
    // Load style.css
    wp_enqueue_style('my-cool-theme-style', get_stylesheet_uri());
    // Load Font Awesome for hamburger icon
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
    // Load JS for mobile toggle
    wp_enqueue_script('my-cool-theme-js', get_template_directory_uri() . '/js/header.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'my_cool_theme_assets');



function enqueue_fullcalendar_assets() {
    // FullCalendar CSS
    wp_enqueue_style(
        'fullcalendar-css',
        'https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css',
        [],
        null
    );

    // FullCalendar JS
    wp_enqueue_script(
        'fullcalendar-js',
        'https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js',
        [],
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_fullcalendar_assets');


add_action('after_setup_theme', function() {
    add_theme_support('woocommerce');
});
?>




<?php
/* ================================
   FULLCALENDAR + GOOGLE CALENDAR
   ================================ */

function enqueue_events_calendar_assets() {

    // FullCalendar core
    wp_enqueue_script(
        'fullcalendar',
        'https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js',
        array(),
        null,
        true
    );

    // Google Calendar plugin
    wp_enqueue_script(
        'fullcalendar-google',
        'https://cdn.jsdelivr.net/npm/@fullcalendar/google-calendar@6.0.3/index.global.min.js',
        array('fullcalendar'),
        null,
        true
    );

    // Calendar init JS
    wp_enqueue_script(
        'events-calendar-init',
        get_template_directory_uri() . '/js/calendar.js',
        array('fullcalendar', 'fullcalendar-google'),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_events_calendar_assets');


/* ================================
   SHORTCODE
   ================================ */

function events_calendar_shortcode() {
    return '
    <div class="max-w-6xl mx-auto px-4">
        <div id="calendar" class="events_calendar"></div>
    </div>
    ';
}
add_shortcode('events_calendar', 'events_calendar_shortcode');

function force_load_variation_scripts() {
    if ( is_product() ) {
        wp_enqueue_script( 'wc-add-to-cart-variation' );
    }
}
add_action( 'wp_enqueue_scripts', 'force_load_variation_scripts' );

// Search bar
add_action('pre_get_posts', function($query) {

    if (!is_admin() && $query->is_main_query() && $query->is_search()) {

        // Only search products
        $query->set('post_type', 'product');

        // Only published
        $query->set('post_status', 'publish');

        // Only this year's classes
        $query->set('tax_query', array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => '2026-classes',
            ),
        ));

    }

});