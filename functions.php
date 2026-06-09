<?php
/**
 * Daniyal Pharma Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'DANIYAL_VERSION', '1.0.0' );
define( 'DANIYAL_DIR', get_template_directory() );
define( 'DANIYAL_URI', get_template_directory_uri() );

/* =========================================
   THEME SETUP
========================================= */
function daniyal_setup() {
    load_theme_textdomain( 'daniyal-pharma', DANIYAL_DIR . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo', [
        'height'      => 100,
        'width'       => 400,
        'flex-width'  => true,
        'flex-height' => true,
    ] );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'editor-styles' );

    register_nav_menus( [
        'primary'   => __( 'Primary Navigation', 'daniyal-pharma' ),
        'footer'    => __( 'Footer Navigation', 'daniyal-pharma' ),
    ] );

    add_image_size( 'daniyal-hero',    1400, 600, true );
    add_image_size( 'daniyal-card',    600,  400, true );
    add_image_size( 'daniyal-thumb',   400,  300, true );
    add_image_size( 'daniyal-product', 400,  400, true );
}
add_action( 'after_setup_theme', 'daniyal_setup' );

/* =========================================
   ENQUEUE ASSETS
========================================= */
function daniyal_assets() {
    // Google Fonts
    wp_enqueue_style(
        'daniyal-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;600&display=swap',
        [],
        null
    );
    // Main stylesheet
    wp_enqueue_style( 'daniyal-style', get_stylesheet_uri(), ['daniyal-fonts'], DANIYAL_VERSION );
    // Main JS
    wp_enqueue_script( 'daniyal-main', DANIYAL_URI . '/js/main.js', [], DANIYAL_VERSION, true );
    wp_localize_script( 'daniyal-main', 'daniyalData', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'daniyal_nonce' ),
    ] );
}
add_action( 'wp_enqueue_scripts', 'daniyal_assets' );

/* =========================================
   WIDGETS
========================================= */
function daniyal_widgets() {
    $sidebars = [
        [ 'name' => __('Blog Sidebar','daniyal-pharma'), 'id' => 'sidebar-1' ],
        [ 'name' => __('Footer Col 1','daniyal-pharma'),  'id' => 'footer-1' ],
        [ 'name' => __('Footer Col 2','daniyal-pharma'),  'id' => 'footer-2' ],
        [ 'name' => __('Footer Col 3','daniyal-pharma'),  'id' => 'footer-3' ],
    ];
    foreach ( $sidebars as $s ) {
        register_sidebar( [
            'name'          => $s['name'],
            'id'            => $s['id'],
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ] );
    }
}
add_action( 'widgets_init', 'daniyal_widgets' );

/* =========================================
   CUSTOM POST TYPE: Products
========================================= */
function daniyal_register_cpt() {
    $labels = [
        'name'               => __( 'Products', 'daniyal-pharma' ),
        'singular_name'      => __( 'Product', 'daniyal-pharma' ),
        'menu_name'          => __( 'Products', 'daniyal-pharma' ),
        'add_new'            => __( 'Add Product', 'daniyal-pharma' ),
        'add_new_item'       => __( 'Add New Product', 'daniyal-pharma' ),
        'edit_item'          => __( 'Edit Product', 'daniyal-pharma' ),
        'view_item'          => __( 'View Product', 'daniyal-pharma' ),
        'search_items'       => __( 'Search Products', 'daniyal-pharma' ),
        'not_found'          => __( 'No products found', 'daniyal-pharma' ),
        'all_items'          => __( 'All Products', 'daniyal-pharma' ),
    ];
    register_post_type( 'dp_product', [
        'labels'        => $labels,
        'public'        => true,
        'has_archive'   => 'products',
        'rewrite'       => [ 'slug' => 'products' ],
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'menu_icon'     => 'dashicons-pills',
        'show_in_rest'  => true,
    ] );

    // Taxonomy: Therapeutic Segment
    register_taxonomy( 'dp_segment', 'dp_product', [
        'label'        => __( 'Therapeutic Segments', 'daniyal-pharma' ),
        'hierarchical' => true,
        'rewrite'      => [ 'slug' => 'segment' ],
        'show_in_rest' => true,
    ] );

    // Taxonomy: Product Type
    register_taxonomy( 'dp_type', 'dp_product', [
        'label'        => __( 'Product Types', 'daniyal-pharma' ),
        'hierarchical' => false,
        'rewrite'      => [ 'slug' => 'product-type' ],
        'show_in_rest' => true,
    ] );
}
add_action( 'init', 'daniyal_register_cpt' );

/* =========================================
   CUSTOM META BOXES
========================================= */
function daniyal_add_meta_boxes() {
    add_meta_box( 'dp-product-details', __('Product Details','daniyal-pharma'), 'daniyal_product_meta_box', 'dp_product', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'daniyal_add_meta_boxes' );

function daniyal_product_meta_box( $post ) {
    wp_nonce_field( 'daniyal_product_meta', 'daniyal_product_nonce' );
    $fields = [
        'dp_composition'   => 'Composition / Salt',
        'dp_dosage_form'   => 'Dosage Form (Tablet/Capsule/etc.)',
        'dp_pack_size'     => 'Pack Size',
        'dp_rx_required'   => 'Prescription Required? (yes/no)',
        'dp_segment_label' => 'Therapeutic Segment',
        'dp_benefits'      => 'Key Benefits (one per line)',
        'dp_uses'          => 'Uses / Indications (one per line)',
        'dp_side_effects'  => 'Side Effects',
        'dp_storage'       => 'Storage Instructions',
        'dp_seo_keywords'  => 'SEO Keywords',
    ];
    echo '<table class="form-table">';
    foreach ( $fields as $key => $label ) {
        $val = get_post_meta( $post->ID, $key, true );
        $is_ta = in_array( $key, ['dp_benefits', 'dp_uses', 'dp_side_effects', 'dp_storage'] );
        echo '<tr><th><label for="' . esc_attr($key) . '">' . esc_html($label) . '</label></th><td>';
        if ( $is_ta ) {
            echo '<textarea id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" rows="4" style="width:100%">' . esc_textarea($val) . '</textarea>';
        } else {
            echo '<input type="text" id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" value="' . esc_attr($val) . '" style="width:100%" />';
        }
        echo '</td></tr>';
    }
    echo '</table>';
}

function daniyal_save_product_meta( $post_id ) {
    if ( ! isset( $_POST['daniyal_product_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['daniyal_product_nonce'], 'daniyal_product_meta' ) ) return;
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
    $fields = ['dp_composition','dp_dosage_form','dp_pack_size','dp_rx_required','dp_segment_label','dp_benefits','dp_uses','dp_side_effects','dp_storage','dp_seo_keywords'];
    foreach ( $fields as $field ) {
        if ( isset( $_POST[$field] ) ) {
            update_post_meta( $post_id, $field, sanitize_textarea_field( $_POST[$field] ) );
        }
    }
}
add_action( 'save_post_dp_product', 'daniyal_save_product_meta' );

/* =========================================
   TEMPLATE HELPERS
========================================= */
function daniyal_the_hero_badge( $text ) {
    echo '<div class="hero-badge">🏥 ' . esc_html($text) . '</div>';
}

function daniyal_section_header( $label, $title, $subtitle = '', $center = false ) {
    $class = $center ? ' text-center' : '';
    echo '<div class="section-header' . $class . '">';
    if ( $label ) echo '<span class="section-label">' . esc_html($label) . '</span>';
    echo '<h2 class="section-title">' . wp_kses_post($title) . '</h2>';
    if ( $subtitle ) echo '<p class="section-subtitle">' . esc_html($subtitle) . '</p>';
    echo '</div>';
}

function daniyal_get_contact_details() {
    return [
        'company' => 'Daniyal Pharma Private Limited',
        'address' => 'Shop No. 27, Sarai Julaina, Near Mother Dairy, Sukhdev Vihar, New Delhi – 110025',
        'email'   => 'info@daniyalpharma.com',
        'phone'   => '+91-85878 70997',
    ];
}

/* =========================================
   EXCERPT LENGTH
========================================= */
add_filter( 'excerpt_length', fn() => 28 );
add_filter( 'excerpt_more', fn() => '...' );

/* =========================================
   CUSTOM BODY CLASSES
========================================= */
function daniyal_body_classes( $classes ) {
    if ( is_page_template() ) $classes[] = 'custom-template';
    return $classes;
}
add_filter( 'body_class', 'daniyal_body_classes' );

/* =========================================
   THEME CUSTOMIZER
========================================= */
function daniyal_customizer( $wp_customize ) {
    // Company Info Section
    $wp_customize->add_section( 'daniyal_company', [
        'title'    => __( 'Company Information', 'daniyal-pharma' ),
        'priority' => 30,
    ] );

    $settings = [
        'daniyal_phone'   => [ 'label' => 'Phone Number',   'default' => '+91-85878 70997' ],
        'daniyal_email'   => [ 'label' => 'Email Address',  'default' => 'info@daniyalpharma.com' ],
        'daniyal_address' => [ 'label' => 'Address',         'default' => 'Shop No. 27, Sarai Julaina, Near Mother Dairy, Sukhdev Vihar, New Delhi – 110025' ],
    ];
    foreach ( $settings as $id => $args ) {
        $wp_customize->add_setting( $id, [ 'default' => $args['default'], 'sanitize_callback' => 'sanitize_text_field' ] );
        $wp_customize->add_control( $id, [ 'label' => $args['label'], 'section' => 'daniyal_company', 'type' => 'text' ] );
    }
}
add_action( 'customize_register', 'daniyal_customizer' );

/* =========================================
   CONTACT FORM (AJAX)
========================================= */
function daniyal_handle_contact() {
    check_ajax_referer( 'daniyal_nonce', 'nonce' );
    $name    = sanitize_text_field( $_POST['name'] ?? '' );
    $email   = sanitize_email( $_POST['email'] ?? '' );
    $phone   = sanitize_text_field( $_POST['phone'] ?? '' );
    $company = sanitize_text_field( $_POST['company'] ?? '' );
    $message = sanitize_textarea_field( $_POST['message'] ?? '' );

    if ( ! $name || ! $email ) {
        wp_send_json_error( ['message' => 'Please fill in required fields.'] );
    }

    $to      = 'info@daniyalpharma.com';
    $subject = 'Business Inquiry from ' . $name;
    $body    = "Name: $name\nEmail: $email\nPhone: $phone\nCompany: $company\n\nMessage:\n$message";
    $headers = [ 'Content-Type: text/plain; charset=UTF-8', 'From: ' . $name . ' <' . $email . '>' ];

    if ( wp_mail( $to, $subject, $body, $headers ) ) {
        wp_send_json_success( ['message' => 'Thank you! We will get back to you shortly.'] );
    } else {
        wp_send_json_error( ['message' => 'Could not send message. Please try again.'] );
    }
}
add_action( 'wp_ajax_daniyal_contact',        'daniyal_handle_contact' );
add_action( 'wp_ajax_nopriv_daniyal_contact', 'daniyal_handle_contact' );

/* =========================================
   AUTO-SET LOGO ON THEME ACTIVATION
========================================= */
function daniyal_setup_default_logo() {
    if ( ! has_custom_logo() ) {
        $logo_path = get_template_directory() . '/logo.png';
        if ( file_exists( $logo_path ) ) {
            $upload = wp_upload_bits( 'daniyal-logo.png', null, file_get_contents( $logo_path ) );
            if ( ! $upload['error'] ) {
                $attachment = [
                    'post_mime_type' => 'image/png',
                    'post_title'     => 'Daniyal Pharma Logo',
                    'post_content'   => '',
                    'post_status'    => 'inherit',
                ];
                $attach_id = wp_insert_attachment( $attachment, $upload['file'] );
                require_once ABSPATH . 'wp-admin/includes/image.php';
                $attach_data = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
                wp_update_attachment_metadata( $attach_id, $attach_data );
                set_theme_mod( 'custom_logo', $attach_id );
            }
        }
    }
}
add_action( 'after_switch_theme', 'daniyal_setup_default_logo' );
add_action( 'after_setup_theme', 'daniyal_setup_default_logo' );
