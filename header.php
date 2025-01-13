<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package activehub-leeds
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'activehub-leeds' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding navbar-brand">
			
			<button type="button" class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#main-navigation" aria-controls="main-navigation" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div><!-- .site-branding -->
	
	<!-- Main nav -->
		<nav id="site-navigation" class="navbar fixed-top navbar-expand-lg navbar-dark main-navigation">
            <div class="container">
                <!-- Brand -->
                <a class="navbar-brand" href="/index.html" aria-label="Link to ActiveHub Leeds Home Page">
                    <?php the_custom_logo() ?>
                </a>
                <!-- Menu toggle button  -->
                <button
                    class="navbar-toggler d-lg-none"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#main-navigation"
                    aria-controls="main-navigation"
                    aria-expanded="false"
                    aria-label="Toggle main site navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Main Nav offcanvas -->
                <div class="offcanvas offcanvas-end navbar-dark" id="main-navigation">

                    <div class="offcanvas-header">
                        <!-- Close button -->
                        <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body">

                        <!-- Search bar -->
                        <form method="POST" action="search" class="my-2 mx-lg-3">
                            <div class="input-group">
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Search ActiveHub...">
                                <button
                                    class="btn btn-secondary"
                                    type="submit">
                                    <span class="material-symbols-rounded">
                                        search
                                        </span>
                                </button>
                            </div>
                        </form>

                        <!-- Options -->
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'menu_class' =>
									'navbar-nav me-auto align-items-lg-end',
									'container' => false,
									// Added filters in functions.php to add Bootstrap classes to list nav-items and anchors nav-links
									'add_nav_link_bs_class' => 'nav-link',
									'add_nav_item_bs_class' => 'nav-item'
								)
							);
						?>
                    </div>
                </div>
            </div>
        </nav> <!-- end Main nav -->
		
	</header><!-- #masthead -->

	<main class="container-fluid">
