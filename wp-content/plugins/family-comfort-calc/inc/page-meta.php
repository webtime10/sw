<?php
/**
 * Shared helpers formerly used by page meta (still used by post form).
 *
 * @package family-comfort-calc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @param mixed $raw
 * @return array<int>
 */
function fcc_normalize_page_category_ids( $raw ) {
	if ( is_array( $raw ) ) {
		$ids = array_map( 'intval', $raw );
		$ids = array_values( array_unique( array_filter( $ids ) ) );
		return $ids;
	}

	if ( is_numeric( $raw ) ) {
		$id = (int) $raw;
		return $id > 0 ? array( $id ) : array();
	}

	return array();
}

/**
 * @param string     $group
 * @param array<int> $category_ids
 * @return array<int>
 */
function fcc_sanitize_page_category_ids( $group, $category_ids ) {
	if ( ! fcc_is_valid_group( $group ) || ! is_array( $category_ids ) ) {
		return array();
	}

	$out = array();
	foreach ( $category_ids as $raw_id ) {
		$id = (int) $raw_id;
		if ( $id <= 0 || in_array( $id, $out, true ) ) {
			continue;
		}
		$cat = fcc_get_category( $group, $id );
		if ( $cat ) {
			$out[] = (int) $cat->category_id;
		}
	}

	return $out;
}

/**
 * @param string $group
 * @param int    $category_id
 * @return object|null
 */
function fcc_get_category( $group, $category_id ) {
	if ( ! fcc_is_valid_group( $group ) || $category_id <= 0 ) {
		return null;
	}

	require_once FCC_PATH . 'admin/models/class-fcc-category-model.php';
	$model = new FCC_Category_Model( $group );
	$row   = $model->get( (int) $category_id );

	if ( ! $row ) {
		return null;
	}

	$lang_id      = fcc_get_default_language_id();
	$descriptions = $model->get_descriptions( (int) $category_id );
	$name         = '';

	if ( isset( $descriptions[ $lang_id ] ) ) {
		$name = (string) $descriptions[ $lang_id ]->name;
	}

	$row->name = $name;
	return $row;
}

/**
 * Max attraction tags per plugin post.
 *
 * @return int
 */
function fcc_get_page_tags_max() {
	return 10;
}

/**
 * @param mixed $tags
 * @return array<int, array{label: string, url: string}>
 */
function fcc_sanitize_page_tags( $tags ) {
	if ( ! is_array( $tags ) ) {
		return array();
	}

	$out = array();
	$max = fcc_get_page_tags_max();

	foreach ( $tags as $tag ) {
		if ( count( $out ) >= $max ) {
			break;
		}

		if ( ! is_array( $tag ) ) {
			continue;
		}

		$label = isset( $tag['label'] ) ? sanitize_text_field( (string) $tag['label'] ) : '';
		$url   = isset( $tag['url'] ) ? esc_url_raw( (string) $tag['url'] ) : '';

		if ( '' === $label ) {
			continue;
		}

		$out[] = array(
			'label' => $label,
			'url'   => $url,
		);
	}

	return $out;
}
