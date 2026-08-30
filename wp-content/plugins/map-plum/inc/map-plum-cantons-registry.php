<?php
/**
 * Реестр кантонов Швейцарии для карт Map Plum.
 *
 * @package map-plum
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @return array<string, array<string, mixed>>
 */
function map_plum_cantons_registry() {
	static $registry = null;
	if ( null !== $registry ) {
		return $registry;
	}

	$registry = array(
		'zurich'                  => array(
			'name'                 => 'Zürich',
			'aliases'              => array( 'zuerich', 'zh' ),
			'manufacturer_needles' => array( 'zürich', 'zurich', 'zuerich' ),
			'map_center'           => array( 47.37, 8.54 ),
			'map_zoom'             => 10,
			'bbox'                 => array( 47.13, 8.38, 47.70, 8.85 ),
			'title'                => 'Canton of Zürich',
			'subtitle'             => 'Click on a district',
		),
		'bern'                    => array(
			'name'                 => 'Bern',
			'aliases'              => array( 'berne' ),
			'manufacturer_needles' => array( 'bern', 'berne' ),
			'map_center'           => array( 46.95, 7.45 ),
			'map_zoom'             => 9,
			'bbox'                 => array( 46.35, 6.86, 47.35, 8.45 ),
			'title'                => 'Canton of Bern',
			'subtitle'             => 'Click on a district',
		),
		'lucerne'                 => array(
			'name'                 => 'Luzern',
			'aliases'              => array( 'luzern' ),
			'manufacturer_needles' => array( 'lucerne', 'luzern' ),
			'map_center'           => array( 47.05, 8.18 ),
			'map_zoom'             => 11,
			'bbox'                 => array( 46.80, 7.70, 47.25, 8.50 ),
			'title'                => 'Canton of Lucerne',
			'subtitle'             => 'Click on a district',
		),
		'uri'                     => array(
			'name'                 => 'Uri',
			'aliases'              => array(),
			'manufacturer_needles' => array( 'uri' ),
			'map_center'           => array( 46.77, 8.64 ),
			'map_zoom'             => 10,
			'bbox'                 => array( 46.52, 8.35, 47.05, 9.00 ),
			'title'                => 'Canton of Uri',
			'subtitle'             => 'Click on a district',
		),
		'schwyz'                  => array(
			'name'                 => 'Schwyz',
			'aliases'              => array(),
			'manufacturer_needles' => array( 'schwyz' ),
			'map_center'           => array( 47.02, 8.65 ),
			'map_zoom'             => 11,
			'bbox'                 => array( 46.88, 8.45, 47.18, 8.95 ),
			'title'                => 'Canton of Schwyz',
			'subtitle'             => 'Click on a district',
		),
		'obwalden'                => array(
			'name'                 => 'Obwalden',
			'aliases'              => array(),
			'manufacturer_needles' => array( 'obwalden' ),
			'map_center'           => array( 46.88, 8.25 ),
			'map_zoom'             => 11,
			'bbox'                 => array( 46.75, 8.05, 47.02, 8.45 ),
			'title'                => 'Canton of Obwalden',
			'subtitle'             => 'Click on a district',
		),
		'nidwalden'               => array(
			'name'                 => 'Nidwalden',
			'aliases'              => array(),
			'manufacturer_needles' => array( 'nidwalden' ),
			'map_center'           => array( 46.95, 8.38 ),
			'map_zoom'             => 11,
			'bbox'                 => array( 46.82, 8.25, 47.08, 8.55 ),
			'title'                => 'Canton of Nidwalden',
			'subtitle'             => 'Click on a district',
		),
		'glarus'                  => array(
			'name'                 => 'Glarus',
			'aliases'              => array(),
			'manufacturer_needles' => array( 'glarus' ),
			'map_center'           => array( 47.04, 9.07 ),
			'map_zoom'             => 11,
			'bbox'                 => array( 46.88, 8.85, 47.20, 9.30 ),
			'title'                => 'Canton of Glarus',
			'subtitle'             => 'Click on a district',
		),
		'zug'                     => array(
			'name'                 => 'Zug',
			'aliases'              => array(),
			'manufacturer_needles' => array( 'zug' ),
			'map_center'           => array( 47.17, 8.52 ),
			'map_zoom'             => 11,
			'bbox'                 => array( 47.08, 8.40, 47.28, 8.65 ),
			'title'                => 'Canton of Zug',
			'subtitle'             => 'Click on a district',
		),
		'fribourg'                => array(
			'name'                 => 'Fribourg',
			'aliases'              => array( 'freiburg' ),
			'manufacturer_needles' => array( 'fribourg', 'freiburg' ),
			'map_center'           => array( 46.79, 7.15 ),
			'map_zoom'             => 10,
			'bbox'                 => array( 46.52, 6.70, 47.05, 7.45 ),
			'title'                => 'Canton of Fribourg',
			'subtitle'             => 'Click on a district',
		),
		'solothurn'               => array(
			'name'                 => 'Solothurn',
			'aliases'              => array(),
			'manufacturer_needles' => array( 'solothurn' ),
			'map_center'           => array( 47.21, 7.54 ),
			'map_zoom'             => 10,
			'bbox'                 => array( 47.05, 7.35, 47.40, 7.75 ),
			'title'                => 'Canton of Solothurn',
			'subtitle'             => 'Click on a district',
		),
		'basel-stadt'             => array(
			'name'                 => 'Basel-Stadt',
			'aliases'              => array( 'baselstadt', 'basel_stadt' ),
			'manufacturer_needles' => array( 'basel-stadt', 'basel stadt', 'baselstadt' ),
			'map_center'           => array( 47.56, 7.59 ),
			'map_zoom'             => 12,
			'bbox'                 => array( 47.52, 7.55, 47.60, 7.65 ),
			'title'                => 'Canton of Basel-Stadt',
			'subtitle'             => 'Click on a district',
		),
		'basel-landschaft'        => array(
			'name'                 => 'Basel-Landschaft',
			'aliases'              => array( 'baselland', 'basel_landschaft' ),
			'manufacturer_needles' => array( 'basel-landschaft', 'basel landschaft', 'baselland' ),
			'map_center'           => array( 47.45, 7.75 ),
			'map_zoom'             => 11,
			'bbox'                 => array( 47.30, 7.50, 47.58, 7.95 ),
			'title'                => 'Canton of Basel-Landschaft',
			'subtitle'             => 'Click on a district',
		),
		'schaffhausen'            => array(
			'name'                 => 'Schaffhausen',
			'aliases'              => array(),
			'manufacturer_needles' => array( 'schaffhausen' ),
			'map_center'           => array( 47.70, 8.65 ),
			'map_zoom'             => 11,
			'bbox'                 => array( 47.58, 8.45, 47.82, 8.85 ),
			'title'                => 'Canton of Schaffhausen',
			'subtitle'             => 'Click on a district',
		),
		'appenzell-ausserrhoden'  => array(
			'name'                 => 'Appenzell Ausserrhoden',
			'aliases'              => array( 'ausserrhoden', 'ar' ),
			'manufacturer_needles' => array( 'appenzell ausserrhoden', 'ausserrhoden' ),
			'map_center'           => array( 47.36, 9.40 ),
			'map_zoom'             => 11,
			'bbox'                 => array( 47.28, 9.25, 47.45, 9.55 ),
			'title'                => 'Canton of Appenzell Ausserrhoden',
			'subtitle'             => 'Click on a district',
		),
		'appenzell-innerrhoden'   => array(
			'name'                 => 'Appenzell Innerrhoden',
			'aliases'              => array( 'innerrhoden', 'ai' ),
			'manufacturer_needles' => array( 'appenzell innerrhoden', 'innerrhoden' ),
			'map_center'           => array( 47.32, 9.40 ),
			'map_zoom'             => 11,
			'bbox'                 => array( 47.22, 9.30, 47.42, 9.55 ),
			'title'                => 'Canton of Appenzell Innerrhoden',
			'subtitle'             => 'Click on a district',
		),
		'st-gallen'               => array(
			'name'                 => 'St. Gallen',
			'aliases'              => array( 'stgallen', 'sankt_gallen' ),
			'manufacturer_needles' => array( 'st. gallen', 'st gallen', 'gallen' ),
			'map_center'           => array( 47.33, 9.10 ),
			'map_zoom'             => 9,
			'bbox'                 => array( 46.95, 8.65, 47.55, 9.65 ),
			'title'                => 'Canton of St. Gallen',
			'subtitle'             => 'Click on a district',
		),
		'graubunden'              => array(
			'name'                 => 'Graubünden',
			'aliases'              => array( 'graubuenden', 'grisons', 'gr' ),
			'manufacturer_needles' => array( 'graubünden', 'graubunden', 'grisons' ),
			'map_center'           => array( 46.65, 9.65 ),
			'map_zoom'             => 9,
			'bbox'                 => array( 46.15, 8.65, 47.05, 10.50 ),
			'title'                => 'Canton of Graubünden',
			'subtitle'             => 'Click on a district',
		),
		'aargau'                  => array(
			'name'                 => 'Aargau',
			'aliases'              => array( 'ag' ),
			'manufacturer_needles' => array( 'aargau' ),
			'map_center'           => array( 47.39, 8.05 ),
			'map_zoom'             => 10,
			'bbox'                 => array( 47.20, 7.75, 47.55, 8.35 ),
			'title'                => 'Canton of Aargau',
			'subtitle'             => 'Click on a district',
		),
		'thurgau'                 => array(
			'name'                 => 'Thurgau',
			'aliases'              => array( 'tg' ),
			'manufacturer_needles' => array( 'thurgau' ),
			'map_center'           => array( 47.55, 9.00 ),
			'map_zoom'             => 10,
			'bbox'                 => array( 47.38, 8.65, 47.72, 9.35 ),
			'title'                => 'Canton of Thurgau',
			'subtitle'             => 'Click on a district',
		),
		'ticino'                  => array(
			'name'                 => 'Ticino',
			'aliases'              => array( 'tessin' ),
			'manufacturer_needles' => array( 'ticino', 'tessin' ),
			'map_center'           => array( 46.32, 8.80 ),
			'map_zoom'             => 9,
			'bbox'                 => array( 45.82, 8.40, 46.55, 9.05 ),
			'title'                => 'Canton of Ticino',
			'subtitle'             => 'Click on a district',
		),
		'vaud'                    => array(
			'name'                 => 'Vaud',
			'aliases'              => array( 'waadt' ),
			'manufacturer_needles' => array( 'vaud', 'waadt' ),
			'map_center'           => array( 46.56, 6.65 ),
			'map_zoom'             => 9,
			'bbox'                 => array( 46.25, 6.05, 46.88, 7.15 ),
			'title'                => 'Canton of Vaud',
			'subtitle'             => 'Click on a district',
		),
		'valais'                  => array(
			'name'                 => 'Valais',
			'aliases'              => array( 'wallis' ),
			'manufacturer_needles' => array( 'valais', 'wallis' ),
			'map_center'           => array( 46.24, 7.36 ),
			'map_zoom'             => 9,
			'bbox'                 => array( 45.82, 6.75, 46.65, 8.15 ),
			'title'                => 'Canton of Valais',
			'subtitle'             => 'Click on a district',
		),
		'neuchatel'               => array(
			'name'                 => 'Neuchâtel',
			'aliases'              => array( 'neuenburg' ),
			'manufacturer_needles' => array( 'neuchâtel', 'neuchatel', 'neuenburg' ),
			'map_center'           => array( 46.99, 6.75 ),
			'map_zoom'             => 10,
			'bbox'                 => array( 46.85, 6.55, 47.15, 7.05 ),
			'title'                => 'Canton of Neuchâtel',
			'subtitle'             => 'Click on a district',
		),
		'geneva'                  => array(
			'name'                 => 'Genève',
			'aliases'              => array( 'geneve', 'genf' ),
			'manufacturer_needles' => array( 'genève', 'geneve', 'geneva', 'genf' ),
			'map_center'           => array( 46.20, 6.14 ),
			'map_zoom'             => 11,
			'bbox'                 => array( 46.10, 5.95, 46.32, 6.30 ),
			'title'                => 'Canton of Geneva',
			'subtitle'             => 'Click on a district',
		),
		'jura'                    => array(
			'name'                 => 'Jura',
			'aliases'              => array(),
			'manufacturer_needles' => array( 'jura' ),
			'map_center'           => array( 47.36, 7.15 ),
			'map_zoom'             => 10,
			'bbox'                 => array( 47.20, 6.95, 47.52, 7.35 ),
			'title'                => 'Canton of Jura',
			'subtitle'             => 'Click on a district',
		),
		'switzerland'             => array(
			'name'                 => 'Schweiz',
			'aliases'              => array( 'schweiz', 'swiss', 'ch' ),
			'manufacturer_needles' => array( 'schweiz', 'switzerland', 'suisse', 'швейцария' ),
			'map_center'           => array( 46.82, 8.23 ),
			'map_zoom'             => 7,
			'bbox'                 => array( 45.82, 5.95, 47.82, 10.50 ),
			'title'                => 'Switzerland',
			'subtitle'             => 'Click on a canton',
		),
	);

	return $registry;
}

/**
 * @param string $slug
 * @return string
 */
function map_plum_normalize_canton_slug( $slug ) {
	$slug = strtolower( sanitize_title( (string) $slug ) );
	$slug = str_replace( '_', '-', $slug );

	foreach ( map_plum_cantons_registry() as $canonical => $meta ) {
		if ( $canonical === $slug ) {
			return $canonical;
		}
		if ( ! empty( $meta['aliases'] ) && in_array( $slug, $meta['aliases'], true ) ) {
			return $canonical;
		}
	}

	return $slug;
}

/**
 * @param string $slug
 * @return array<string, mixed>|null
 */
function map_plum_get_canton_meta( $slug ) {
	$slug     = map_plum_normalize_canton_slug( $slug );
	$registry = map_plum_cantons_registry();

	return isset( $registry[ $slug ] ) ? $registry[ $slug ] : null;
}

/**
 * @return array<int, string>
 */
function map_plum_get_all_canton_shortcode_tags() {
	$tags = array();
	foreach ( map_plum_cantons_registry() as $slug => $meta ) {
		$tags[] = $slug;
		if ( ! empty( $meta['aliases'] ) ) {
			foreach ( $meta['aliases'] as $alias ) {
				$tags[] = $alias;
			}
		}
	}

	return array_values( array_unique( $tags ) );
}

/**
 * Строки для дашборда: кантон + все шорткоды для копирования.
 *
 * @return array<int, array{slug: string, name: string, tags: array<int, string>}>
 */
function map_plum_get_dashboard_shortcode_rows() {
	$rows = array();
	foreach ( map_plum_cantons_registry() as $slug => $meta ) {
		$tags = array( $slug );
		if ( ! empty( $meta['aliases'] ) ) {
			foreach ( $meta['aliases'] as $alias ) {
				$tags[] = $alias;
			}
		}
		$rows[] = array(
			'slug' => $slug,
			'name' => ! empty( $meta['name'] ) ? (string) $meta['name'] : $slug,
			'tags' => array_values( array_unique( $tags ) ),
		);
	}

	return $rows;
}
