<?php
/**
 * Post form.
 *
 * @var object|null $post
 * @var string      $name
 * @var string      $description
 * @var array       $places
 * @var array       $age_ids
 * @var array       $interest_ids
 * @var array       $directions
 * @var array       $ages
 * @var array       $interests
 * @var string      $route
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$id      = $post ? (int) $post->post_id : 0;
$form_id = 'fcc-form-post';
$save_url = FCC_Router::url( $route, 'save' );
$max_tags = fcc_get_page_tags_max();
$image    = $post ? (string) $post->image : '';
$url      = $post ? (string) $post->url : '';
?>
<form id="<?php echo esc_attr( $form_id ); ?>" method="post" action="<?php echo esc_url( $save_url ); ?>" class="form-horizontal ai-calculator-form fcc-page-meta-fields">
	<?php wp_nonce_field( 'fcc_post_save' ); ?>
	<input type="hidden" name="post_id" value="<?php echo esc_attr( (string) $id ); ?>">

	<div class="panel panel-default">
		<div class="panel-heading"><h3 class="panel-title"><?php esc_html_e( 'Название и описание', 'family-comfort-calc' ); ?></h3></div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label" for="fcc-post-name"><?php esc_html_e( 'Название', 'family-comfort-calc' ); ?></label>
				<input type="text" class="form-control" id="fcc-post-name" name="name" value="<?php echo esc_attr( $name ); ?>" required>
			</div>
			<div class="form-group">
				<label class="control-label" for="fcc-post-desc"><?php esc_html_e( 'Описание', 'family-comfort-calc' ); ?></label>
				<textarea class="form-control" rows="4" id="fcc-post-desc" name="description"><?php echo esc_textarea( $description ); ?></textarea>
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading"><h3 class="panel-title"><?php esc_html_e( 'Направление (категория)', 'family-comfort-calc' ); ?></h3></div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label" for="fcc-post-direction"><?php esc_html_e( 'Направление', 'family-comfort-calc' ); ?></label>
				<select class="form-control" id="fcc-post-direction" name="direction_id" required>
					<option value=""><?php esc_html_e( '— Выберите направление —', 'family-comfort-calc' ); ?></option>
					<?php foreach ( $directions as $dir ) : ?>
						<?php
						$did = (int) $dir->category_id;
						if ( (int) $dir->status !== 1 && ( ! $post || (int) $post->direction_id !== $did ) ) {
							continue;
						}
						?>
						<option value="<?php echo esc_attr( (string) $did ); ?>" <?php selected( $post ? (int) $post->direction_id : 0, $did ); ?>>
							<?php echo esc_html( $dir->name ? $dir->name : '#' . $did ); ?>
						</option>
					<?php endforeach; ?>
				</select>
				<p class="help-block"><?php esc_html_e( 'Пост привязывается к направлению. На карточке название направления — город.', 'family-comfort-calc' ); ?></p>
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading"><h3 class="panel-title"><?php esc_html_e( 'Фильтры калькулятора', 'family-comfort-calc' ); ?></h3></div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label"><?php esc_html_e( 'Возраст детей', 'family-comfort-calc' ); ?></label>
				<div class="fcc-page-meta-checkboxes">
					<?php foreach ( $ages as $cat ) : ?>
						<?php
						$cid = (int) $cat->category_id;
						if ( (int) $cat->status !== 1 && ! in_array( $cid, $age_ids, true ) ) {
							continue;
						}
						?>
						<label class="fcc-page-meta-checkbox">
							<input type="checkbox" name="age_ids[]" value="<?php echo esc_attr( (string) $cid ); ?>" <?php checked( in_array( $cid, $age_ids, true ) ); ?>>
							<span><?php echo esc_html( $cat->name ? $cat->name : '#' . $cid ); ?></span>
						</label>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label"><?php esc_html_e( 'Интересы', 'family-comfort-calc' ); ?></label>
				<div class="fcc-page-meta-checkboxes">
					<?php foreach ( $interests as $cat ) : ?>
						<?php
						$cid = (int) $cat->category_id;
						if ( (int) $cat->status !== 1 && ! in_array( $cid, $interest_ids, true ) ) {
							continue;
						}
						?>
						<label class="fcc-page-meta-checkbox">
							<input type="checkbox" name="interest_ids[]" value="<?php echo esc_attr( (string) $cid ); ?>" <?php checked( in_array( $cid, $interest_ids, true ) ); ?>>
							<span><?php echo esc_html( $cat->name ? $cat->name : '#' . $cid ); ?></span>
						</label>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading"><h3 class="panel-title"><?php esc_html_e( 'Достопримечательности (теги)', 'family-comfort-calc' ); ?></h3></div>
		<div class="panel-body">
			<div class="fcc-page-tags" data-max="<?php echo esc_attr( (string) $max_tags ); ?>">
				<div class="fcc-page-tags__list" id="fcc-page-tags-list">
					<?php foreach ( $places as $tag ) : ?>
						<span class="fcc-page-tag" data-label="<?php echo esc_attr( $tag['label'] ); ?>" data-url="<?php echo esc_attr( $tag['url'] ); ?>">
							<span class="fcc-page-tag__text"><?php echo esc_html( $tag['label'] ); ?></span>
							<?php if ( '' !== $tag['url'] ) : ?>
								<span class="fcc-page-tag__url" title="<?php echo esc_attr( $tag['url'] ); ?>"><?php echo esc_html( $tag['url'] ); ?></span>
							<?php endif; ?>
							<button type="button" class="fcc-page-tag__remove" aria-label="<?php esc_attr_e( 'Удалить', 'family-comfort-calc' ); ?>">&times;</button>
						</span>
					<?php endforeach; ?>
				</div>
				<input type="hidden" name="fcc_page_tags_json" id="fcc-page-tags-json" value="<?php echo esc_attr( wp_json_encode( $places ) ); ?>">

				<div class="fcc-attraction-picker">
					<label class="control-label" for="fcc-attraction-search"><?php esc_html_e( 'Поиск страницы достопримечательности', 'family-comfort-calc' ); ?></label>
					<div class="fcc-city-page-picker__field">
						<input type="search" class="form-control" id="fcc-attraction-search" autocomplete="off" placeholder="<?php esc_attr_e( 'Начните вводить название страницы (от 3 букв)…', 'family-comfort-calc' ); ?>">
						<ul class="fcc-city-page-results" id="fcc-attraction-results" hidden></ul>
					</div>
					<p class="fcc-city-page-status help-block" id="fcc-attraction-status"></p>

					<div class="fcc-attraction-selected" id="fcc-attraction-selected" hidden>
						<div class="fcc-attraction-selected__page" id="fcc-attraction-selected-page"></div>
						<div class="fcc-attraction-selected__link-wrap">
							<span class="fcc-attraction-selected__link-label"><?php esc_html_e( 'Ссылка', 'family-comfort-calc' ); ?></span>
							<a class="fcc-attraction-selected__link" id="fcc-attraction-selected-link" href="#" target="_blank" rel="noopener noreferrer"></a>
						</div>
						<div class="fcc-attraction-selected__name-wrap">
							<label class="control-label" for="fcc-attraction-tag-name"><?php esc_html_e( 'Название достопримечательности', 'family-comfort-calc' ); ?></label>
							<input type="text" class="form-control" id="fcc-attraction-tag-name" autocomplete="off" placeholder="<?php esc_attr_e( 'Как будет на круге (теге)', 'family-comfort-calc' ); ?>">
						</div>
						<p class="fcc-attraction-selected__actions">
							<button type="button" class="button button-primary" id="fcc-attraction-add"><?php esc_html_e( 'Добавить', 'family-comfort-calc' ); ?></button>
							<button type="button" class="button" id="fcc-attraction-cancel"><?php esc_html_e( 'Отмена', 'family-comfort-calc' ); ?></button>
						</p>
					</div>
				</div>

				<p class="fcc-page-tags__actions">
					<span class="fcc-page-tags__counter" id="fcc-page-tags-counter"><?php echo esc_html( sprintf( __( '%1$d / %2$d', 'family-comfort-calc' ), count( $places ), $max_tags ) ); ?></span>
				</p>
				<p class="help-block"><?php esc_html_e( 'Сначала найдите страницу, затем задайте название тега. Ссылка подтянется из страницы.', 'family-comfort-calc' ); ?></p>
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading"><h3 class="panel-title"><?php esc_html_e( 'Параметры', 'family-comfort-calc' ); ?></h3></div>
		<div class="panel-body">
			<div class="form-group fcc-city-page-picker">
				<label class="control-label" for="fcc-city-page-search"><?php esc_html_e( 'Поиск страницы города', 'family-comfort-calc' ); ?></label>
				<input type="hidden" id="fcc-city-page-id" value="">
				<input type="hidden" name="image" id="fcc-page-image" value="<?php echo esc_attr( $image ); ?>">
				<input type="hidden" name="url" id="fcc-post-url" value="<?php echo esc_attr( $url ); ?>">
				<div class="fcc-city-page-picker__field">
					<input type="search" class="form-control" id="fcc-city-page-search" autocomplete="off" placeholder="<?php esc_attr_e( 'Начните вводить название (от 3 букв)…', 'family-comfort-calc' ); ?>">
					<ul class="fcc-city-page-results" id="fcc-city-page-results" hidden></ul>
				</div>
				<p class="fcc-city-page-status help-block" id="fcc-city-page-status"></p>

				<div class="fcc-city-page-preview" id="fcc-city-page-preview" <?php echo ( '' === $image && '' === $url ) ? 'hidden' : ''; ?>>
					<div class="fcc-city-page-preview__thumb" id="fcc-city-page-preview-thumb">
						<?php if ( '' !== $image ) : ?>
							<img src="<?php echo esc_url( $image ); ?>" alt="">
						<?php endif; ?>
					</div>
					<div class="fcc-city-page-preview__meta">
						<div class="fcc-city-page-preview__label"><?php esc_html_e( 'Ссылка города', 'family-comfort-calc' ); ?></div>
						<a class="fcc-city-page-preview__url" id="fcc-city-page-preview-url" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $url ); ?></a>
					</div>
				</div>

				<p class="help-block"><?php esc_html_e( 'Поиск среди страниц Default. Фото (thumbnail) и ссылка подтянутся автоматически.', 'family-comfort-calc' ); ?></p>
			</div>
			<div class="form-group">
				<label class="control-label" for="fcc-post-sort"><?php esc_html_e( 'Сортировка', 'family-comfort-calc' ); ?></label>
				<input type="number" class="form-control" id="fcc-post-sort" name="sort_order" value="<?php echo $post ? (int) $post->sort_order : 0; ?>">
			</div>
			<div class="form-group">
				<label class="control-label"><?php esc_html_e( 'Статус', 'family-comfort-calc' ); ?></label>
				<label><input type="checkbox" name="status" value="1" <?php checked( ! $post || (int) $post->status ); ?>> <?php esc_html_e( 'Включено', 'family-comfort-calc' ); ?></label>
			</div>
		</div>
	</div>
</form>
