<?php
/**
 * Admin AJAX: search pages for post form.
 *
 * @package family-comfort-calc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register AJAX hooks.
 *
 * @return void
 */
function fcc_register_ajax() {
	add_action( 'wp_ajax_fcc_search_city_pages', 'fcc_ajax_search_city_pages' );
	add_action( 'wp_ajax_fcc_search_attraction_pages', 'fcc_ajax_search_attraction_pages' );
}

/**
 * City page picker — default template pages.
 *
 * @return void
 */
function fcc_ajax_search_city_pages() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_send_json_error( array( 'message' => 'forbidden' ), 403 );
	}

	check_ajax_referer( 'fcc_search_city_pages', 'nonce' );

	$term = isset( $_GET['q'] ) ? sanitize_text_field( wp_unslash( $_GET['q'] ) ) : '';
	if ( strlen( $term ) < fcc_page_search_min_chars() ) {
		wp_send_json_success( array( 'items' => array() ) );
	}

	wp_send_json_success(
		array(
			'items' => fcc_search_default_pages( $term, 20 ),
		)
	);
}

/**
 * Attractions picker — default template pages.
 *
 * @return void
 */
function fcc_ajax_search_attraction_pages() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_send_json_error( array( 'message' => 'forbidden' ), 403 );
	}

	check_ajax_referer( 'fcc_search_attraction_pages', 'nonce' );

	$term = isset( $_GET['q'] ) ? sanitize_text_field( wp_unslash( $_GET['q'] ) ) : '';
	if ( strlen( $term ) < fcc_page_search_min_chars() ) {
		wp_send_json_success( array( 'items' => array() ) );
	}

	wp_send_json_success(
		array(
			'items' => fcc_search_default_pages( $term, 20 ),
		)
	);
}
