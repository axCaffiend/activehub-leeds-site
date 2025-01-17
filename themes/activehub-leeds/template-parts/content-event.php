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
		
		<!-- Event hero slider -->
		<div class="hero-slider">Hero Slider placeholder</div>
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
							
							if( $tags ):
								?>
								<!-- Dynamic -->
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
							
							
							<p class="col-auto card-key-info">
								<span class="material-symbols-rounded">event</span>
								<?php 
								$date_time_start = get_field('date_time')['start'];
								$date_time_end = get_field('date_time')['end'];
								
								?>
							</p>
							<p class="col-auto card-key-info"><span class="material-symbols-rounded">schedule</span>6:30AM - 7:15AM</p>
							<p class="col-12 card-key-info"><span class="material-symbols-rounded">distance</span>2.7 miles</p>
							<p class="col-12">Springhead Park Oulton Lane Rothwell</p>
							<p class="col-12 card-key-info"><span class="material-symbols-rounded">currency_pound</span>8.00</p>
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
					<h2>Event Details</h2>
					<p>Fitness Success Boot Camp: Burns Fat, Tone Body And Get You Fit In The Great Outdoors</p>
					<p>Sessions are modified according to your fitness level you will be training with an amazing group of people who will support and motivate you our instructors will give you the tools to achieve your fitness goals.</p>
					<p>THINK OUTSIDE THE GYM</p>
					<p>We are based in Rothwell Park Leeds LS26</p>
				</section>
					<!-- ----- End Event Details ----- -->

				<!-- ----- VENUE INFO ----- -->
				<section class="container-lg mb-3 mb-sm-4 mb-lg-5">
					<h2>Venue</h2>
					<p>Rothwell Park Leeds LS26</p>
					<div class="hero-slider mb-3">Google map embed placeholder</div>
					<h3>Facilities</h3>
					<div class="row">
						<p class="col-auto"><span class="material-symbols-rounded">local_parking</span>Free Parking</p>
						<p class="col-auto"><span class="material-symbols-rounded">wc</span>Public Toilets</p>
					</div>
				</section>
				<!-- ----- End Venue Info ----- -->
			</div>
			<!-- END Page col 2 -->
		</div>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->