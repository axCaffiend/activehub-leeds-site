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
	
	<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		endif;
	?>

	<?php activehub_leeds_post_thumbnail(); ?>

	<div class="entry-content">
		<?php the_content(); ?>
		
		<!-- Phone number -->
		<p>
			<?php the_field('phone_number'); ?>
		</p>

		<p>
			<?php the_field('email') ?>
		</p>

		<p>
			<a class="btn btn-primary" href="<?php the_field('website')?>" target="_blank">Go to Website<span class="material-symbols-rounded">language</span></a>
		</p>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
