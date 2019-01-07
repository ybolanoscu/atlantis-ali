<?php

require_once __DIR__ . '/includes/icon-functions.php';
require_once __DIR__ . '/includes/template-tags.php';

function atlantis_theme_setup() {
	register_nav_menu( 'top-menu', __( 'Top Menu' ) );
	register_nav_menu( 'top-right-menu', __( 'Top Right Menu' ) );
	register_nav_menu( 'social-links', __( 'Social Menu' ) );
	register_nav_menu( 'footer-menu-1', __( 'Footer Menu Column 1' ) );
	register_nav_menu( 'footer-menu-2', __( 'Footer Menu Column 2' ) );
	register_nav_menu( 'footer-menu-3', __( 'Footer Menu Column 3' ) );
	register_nav_menu( 'footer-menu-4', __( 'Footer Menu Column 4' ) );
	register_nav_menu( 'squared-button-links', __( 'Squared Top Buttons' ) );
	register_nav_menu( 'section-1-menu', __( 'Section 1 Red Bg' ) );
	register_nav_menu( 'section-2-menu', __( 'Section 2 Big Red Menus' ) );

//	load_theme_textdomain( 'documentation', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	$starter_content = array(

		// Default to a static front page and assign the front and posts pages.
		'options'    => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{blog}}',
			'panel_5' => '{{contact}}',
			'panel_6' => '{{contact}}',
			'panel_7' => '{{contact}}',
		),

	);

//	Mainly for customize the defaults content
//	$starter_content = apply_filters( 'atlantis_starter_content', $starter_content );
	add_theme_support( 'starter-content', $starter_content );

	add_theme_support( 'atlantis_customizer', array( 'all' ) );
	require_if_theme_supports( 'atlantis_customizer', get_template_directory() . '/includes/customizer.php' );
//	require_if_theme_supports('atlantis_customizer', get_template_directory() . '/includes/customizer_class.php');

	add_filter( 'wp_nav_menu_objects', 'menu_has_children', 10, 1 );

	function menu_has_children( $sorted_menu_items ) {
		$parents = array();
		foreach ( $sorted_menu_items as $key => $obj ) {
			$parents[] = $obj->menu_item_parent;
		}
		foreach ( $sorted_menu_items as $key => $obj ) {
			$sorted_menu_items[ $key ]->has_children = ( in_array( $obj->ID, $parents ) ) ? true : false;
		}

		return $sorted_menu_items;
	}

	add_filter( 'upload_mimes', 'custom_upload_mimes' );
	function custom_upload_mimes( $existing_mimes = array() ) {
		$existing_mimes['svg'] = 'image/svg+xml';

		return $existing_mimes;
	}
}

add_action( 'after_setup_theme', 'atlantis_theme_setup' );

function atlantis_widgets_setup() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'atlantis' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'atlantis' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'atlantis' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'atlantis' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

//	register_sidebar( array(
//		'name'          => __( 'Footer 2', 'atlantis' ),
//		'id'            => 'sidebar-3',
//		'description'   => __( 'Add widgets here to appear in your footer.', 'atlantis' ),
//		'before_widget' => '<section id="%1$s" class="widget %2$s">',
//		'after_widget'  => '</section>',
//		'before_title'  => '<h2 class="widget-title">',
//		'after_title'   => '</h2>',
//	) );
}

add_action( 'widgets_init', 'atlantis_widgets_setup' );

function atlantis_register_scripts_css() {
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/css/bootstrap.min.css' ) );
	wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/css/font-awesome.min.css' ) );
	wp_enqueue_style( 'font-open', get_theme_file_uri( '/css/font-open-sans.min.css' ) );
//	wp_enqueue_style( 'styles', get_theme_file_uri( '/css/style.min.css' ) );
	wp_enqueue_style( 'styles', get_theme_file_uri( '/css/style.min.css' ) );

	wp_enqueue_script( 'last-jquery', get_theme_file_uri( '/js/jquery.min.js' ), array(), '2.0.3', true );
	wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/js/bootstrap.min.js' ), array(), '3.3.7', true );
	wp_enqueue_script( 'script', get_theme_file_uri( '/js/script.min.js' ), array( 'bootstrap' ), '0.0.5', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$locales = array(
		'menu' => __( 'menu' ),
		'down' => __( 'down' ),
		'up'   => __( 'up' ),
	);
	wp_localize_script( 'script', 'atl_lng', $locales );
}

add_action( 'wp_enqueue_scripts', 'atlantis_register_scripts_css' );

add_filter( 'style_loader_tag', function ( $link, $handle ) {
	if ( in_array( $handle, array( 'bootstrap', 'styles' ) ) ) {
		return $link;
	}
	$link = str_replace( "media='all'", 'media="none" onload="if(media==\'none\')media=\'all\'"', $link );
	$link = str_replace( 'media="all"', 'media="none" onload="if(media==\'none\')media=\'all\'"', $link );

	return $link;
}, 10, 2 );

if ( ! function_exists( 'atlantis_get_theme_options' ) ):
	function atlantis_get_theme_options() {
		return wp_parse_args( get_option( 'atlantis_theme_options', array() ), atlantis_get_option_defaults_values() );
	}
endif;
if ( ! function_exists( 'atlantis_get_theme_option' ) ):
	function atlantis_get_theme_option( $name ) {
		$options = wp_parse_args( get_option( 'atlantis_theme_options', array() ), atlantis_get_option_defaults_values() );

		return $options[ $name ];
	}
endif;

// Copy everything below this line.
function custom_cf7_scripts() { ?>
	<script type="text/javascript">
        var wpcf7Elm = document.querySelector('#popmake-1072 .wpcf7');
        wpcf7Elm.addEventListener('wpcf7submit', function (event) {
            var $form = $(event.target),
                $popup = $form.parents('.pum');
            if (!$popup.length) {
                return;
            }
            $popup.trigger('pumSetCookie');
            setTimeout(function () {
                $popup.popmake('close');
            }, 2000);
        }, false);
	</script><?php
}

add_action( 'wp_footer', 'custom_cf7_scripts' );

require_once __DIR__ . '/includes/customizer/theme-options-default-values.php';
