<?php
/**
 * Данные для фронтового калькулятора направлений.
 *
 * @package family-comfort-calc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Рейтинг карточки: 4.5–5.0, чаще ближе к 5.
 *
 * @param int $post_id
 * @return float
 */
function fcc_get_card_rating( $post_id = 0 ) {
	$post_id = (int) $post_id;
	// Взвешенный пул: 5.0 преобладает.
	$pool = array(
		5.0, 5.0, 5.0, 5.0, 5.0, 5.0,
		4.9, 4.9, 4.9,
		4.8, 4.8,
		4.7,
		4.6,
		4.5,
	);
	$index = $post_id > 0 ? abs( $post_id ) % count( $pool ) : mt_rand( 0, count( $pool ) - 1 );
	return (float) $pool[ $index ];
}

/**
 * @return array<int, array<string, mixed>>
 */
function fcc_get_direction_cards_data() {
	require_once FCC_PATH . 'admin/models/class-fcc-post-model.php';

	$model = new FCC_Post_Model();
	$rows  = $model->get_enabled_for_front( fcc_get_default_language_id() );
	$cards = array();

	foreach ( $rows as $row ) {
		$direction_id = (int) $row->direction_id;
		$city         = ! empty( $row->direction_name ) ? (string) $row->direction_name : '';
		if ( $direction_id <= 0 || '' === $city ) {
			continue;
		}

		$post_id      = (int) $row->post_id;
		$age_ids      = fcc_decode_id_list( $row->age_ids );
		$interest_ids = fcc_decode_id_list( $row->interest_ids );
		$places       = fcc_decode_id_list( $row->places, true );
		$image        = ! empty( $row->image ) ? (string) $row->image : '';
		$url          = ! empty( $row->url ) ? (string) $row->url : '';
		$post_title   = ! empty( $row->post_name ) ? (string) $row->post_name : '';

		$cards[] = array(
			'page_id'      => $post_id,
			'post_type'    => 'fcc_internal_post',
			'direction_id' => $direction_id,
			'title'        => $city,
			'post_title'   => $post_title,
			'url'          => $url,
			'image'        => $image,
			'tags'         => $places,
			'age_ids'      => $age_ids,
			'interest_ids' => $interest_ids,
			'rating'       => fcc_get_card_rating( $post_id ),
		);
	}

	return $cards;
}

/**
 * @return array<int, string>
 */
function fcc_get_select_options( $group ) {
	$options = array();
	foreach ( fcc_get_categories( $group ) as $cat ) {
		if ( (int) $cat->status !== 1 ) {
			continue;
		}
		$id = (int) $cat->category_id;
		$options[ $id ] = $cat->name ? (string) $cat->name : '#' . $id;
	}
	return $options;
}
