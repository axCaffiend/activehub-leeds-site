<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package activehub-leeds
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<!-- Hero Slider -->
		<div class="hero-slider d-flex">
			<?php
			// $promo_header = get_field('promo_hero');
			// $count_promo_rows = count(get_field('promo_hero'));
			// echo("Rows in promo_hero: {$count_promo_rows}<br>");
			// echo ("--- attempt 2 ---");

			if ( have_rows('promo_hero')): ?>
				<?php while( have_rows('promo_hero') ): the_row(); ?>

					<?php for ($ri = 1; $ri <= 7; $ri++): ?>
						<?php 
						// Get sub field values
						$img = get_sub_field(sprintf('img_%u', $ri));	
						?>
						<div class="slide-item">
							<img src="<?php echo esc_url($img['url'])?>" alt="">
							<p><?php echo esc_html($img['caption'])?></p>
						</div>
					<?php endfor; ?>

				<?php endwhile ?>
			<?php else : ?>
				<p>Promo header not loading</p>
			<?php endif; ?>
		</div>
		
	</header>

	<?php activehub_leeds_post_thumbnail(); ?>

	<div class="entry-content">
		<!-- Site intro - displays content from default WYSIWYG WordPress field -->
		<?php
		the_content();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php activehub_leeds_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->