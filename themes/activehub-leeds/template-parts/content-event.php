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
	<header class="entry-header container-lg mb-3 mb-sm-4 mb-lg-5">

		<!-- Back to search results -->
		<a class="inline-link" href="#"><span class="material-symbols-rounded">arrow_left_alt</span>Back to search results</a>

		<!-- Page heading -->
		<?php
		the_title( '<h1 class="entry-title">', '</h1>' );
		if ( has_post_thumbnail()) :
			the_post_thumbnail();
		endif?>
		
		<!-- Event cover image -->
		 <?php $cover_image = get_field('cover_image'); ?>
		<div class="hero-slider">
			<img class="w-100 h-100" src="<?php echo esc_html($cover_image['url']); ?>" alt="<?php echo esc_html($cover_image['alt']); ?>">
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content container-lg">

		<div class="row">
			<!-- Page col 1 (Key Info & Organiser Info) -->
			<div class="col-10 col-md-5 mx-auto">
				<!-- ----- KEY INFO ----- -->
				<section class="container-lg mb-3 mb-sm-4 mb-lg-5">
					<h2 class="visually-hidden">Event key info</h2>
					<div class="card mx-3">
						<div class="card-body row mx-auto">

						<!-- Tags -->
						 <!-- For Ability level -->
							<?php 
							// Retrieve ACF field input
							$tags = get_field('event_tags');

							// Get term object for Ability level to use term_id for displaying its child terms.
							$ability_level = get_term_by('slug', 'ability-level', 'event_tags');
							// Get term object for Facilities (used further down underneath Google Map)
							$facilities = get_term_by('slug', 'venue-facilities', 'event_tags');
							
							if( $tags ):
								?>
								<div class="card-tags container-fluid mb-2 text-center">

									<!-- Ability level tags -->
									<?php foreach($tags as $tag ):?>
										<?php if(
											$tag->parent == $ability_level->term_id
											): 
											?>
											<span class="badge rounded-pill tag-level">
												<?php echo esc_html($tag->name) ?>
											</span>
										<?php endif ?>
									<?php endforeach ?>
									<!-- end Ability level tags -->

									<!-- Event Type -->
									<?php foreach(get_the_terms(get_the_ID(), 'types') as $eventtype) : ?>
										<span class="badge rounded-pill tag-location"><?php echo esc_html($eventtype->name) ?></span>
									 <?php endforeach ?>
									 <!-- end Event Type -->
									
								</div>
							<?php endif ?>
							
							
							<!-- Date and Time -->
							 <!-- 
								Convert to datetime objects to split display day/date and time separately
							 -->
							<?php 
								date_default_timezone_set(('Europe/London'));
								$date_today = date('D d/m/Y');
								// Expected input format from ACF field (in ACF field settings)
								$date_input_format = 'd/m/Y g:i a';

								// Get start date time and format
								$date_time_start = DateTimeImmutable::createFromFormat($date_input_format, get_field('date_time')['start']);
								$date_start = $date_time_start->format('D d/m/Y');
								$time_start = $date_time_start->format('g:i A');
								// Get end date time and format
								$date_time_end = DateTimeImmutable::createFromFormat($date_input_format, get_field('date_time')['end']);
								$date_end = $date_time_end->format('D d/m/Y');
								$time_end = $date_time_end->format('g:i A');
							?>

							<!-- Date -->
							<p class="col-auto card-key-info">
								<span class="material-symbols-rounded">event</span>
								<?php if($date_start == $date_today) {
									echo esc_html('TODAY');
								} elseif($date_start == $date_end) {
									echo esc_html($date_start);
								} else {
									echo esc_html(sprintf("{$date_start} - {$date_end}"));
								}
								?>
							</p>

							<!-- Time -->
							<p class="col-auto card-key-info">
								<span class="material-symbols-rounded">schedule</span>
								<?php echo esc_html(sprintf("{$time_start} - {$time_end}"))?>
							</p>

							<!-- Distance -->
							<p class="col-12 card-key-info">
								<span class="material-symbols-rounded">distance</span>
								2.7 miles
							</p>
							
							<!-- Address -->
							<?php
							// Code from acf docs page on google maps field
								$location = get_field('location');
								if ($location) {
									    // Loop over segments and construct HTML.
										$address = '';
										foreach( array('name', 'street_name_short', 'city', 'post_code') as $i => $k ) {
											if( isset( $location[ $k ] ) ) {
												$address .= sprintf( '<span class="segment-%s">%s</span>, ', $k, $location[ $k ] );
											}
										}
										// Trim trailing comma.
										$address = trim( $address, ', ' );
									}
							?>
							<p class="col-12">

								<?php 
									echo ($address);
								?>
							</p>
							<p class="col-12 card-key-info">
								<span class="material-symbols-rounded">currency_pound</span>
								<?php echo the_field('price') ?>
							</p>
							<a href="#" class="btn btn-lg btn-secondary">BOOK NOW<span class="material-symbols-rounded">arrow_right_alt</span></a>
						</div>
					</div>
				</section>
				<!-- ----- End Key Info ----- -->

				<!-- ----- ORGANISER INFO ----- -->
				<section class="container-lg mb-3 mb-sm-4 mb-lg-5">
					<h3>Organiser Info</h3>
					<p class="lead">Fitness Success Bootcamps</p>
					<p><span class="material-symbols-rounded">phone</span>07412 665677</p>
					<p><span class="material-symbols-rounded">mail</span>oblackford33@googlemail.com</p>
					<div class="text-center">
						<a href="" class="btn btn-primary"><span class="material-symbols-rounded">language</span>Website</a>
					</div>
				</section>
				<!-- ----- End Organiser Info ----- -->
			</div>
			<!-- END Page col 1 -->

			<!-- Page col 2 -->
			<div class="col-12 col-md-7">
				<!-- ----- EVENT DETAILS ----- -->
				<section class="container-lg mb-3 mb-sm-4 mb-lg-5">
					<h2>Details</h2>
					<?php the_content();?>
				</section>
					<!-- ----- End Event Details ----- -->

				<!-- ----- VENUE INFO ----- -->
				<section class="container-lg mb-3 mb-sm-4 mb-lg-5">
					<h2>Venue</h2>
					<p>
						<?php echo esc_html(sprintf("{$location['address']} {$location['post_code']}")) ?>
					</p>
					<div class="mb-3">
						<?php 
						if($location){
							acf_make_map($location);
						}
						?>
					</div>
					<h3>Facilities</h3>
					<div class="row">
						<?php if ($tags): ?>
							<!-- Ability level tags -->
							<?php foreach($tags as $tag ):?>
								<?php if(
									$tag->parent == $facilities->term_id
									): 
									?>
									<p class="col-auto">
										<?php
											$material_icon = get_field('material_icon', $tag);
											if ($material_icon):
										?>
											<span class="material-symbols-rounded">
												<?php echo esc_html($material_icon) ?>
											</span>
										<?php endif ?>
										<?php echo esc_html($tag->name) ?>
									</p>
								<?php endif ?>
							<?php endforeach ?>
									<!-- end Ability level tags -->
						<?php endif ?>
					</div>
				</section>
				<!-- ----- End Venue Info ----- -->
			</div>
			<!-- END Page col 2 -->
		</div>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->