<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package activehub-leeds
 */

?>

	<footer class="bg-dark container-fluid pt-4 pb-3">
        <!-- Content container -->
        <div class="container justify-content-center text-center g-0 col-xs-10 col-lg-8 col-xl-8">
            <!-- Back to top -->
            <div class="row g-0 mb-3">
                <div class="col"><a href="#page-top" class="btn btn-sm btn-outline-primary">Back to top <span class="material-symbols-rounded">arrow_upward</span></a></div>
            </div>
            <!-- Contact links -->
            <div class="row row-cols-1 row-cols-md-2 g-0 mb-4">
                <!-- Social media -->
                <div class="col">
                    <p class="lead">Follow us for the latest news and offers</p>
                    <div class="container d-flex justify-content-center gap-4">
                        <a href="#" aria-label="Link to Facebook"><i class="iconoir-facebook"></i></a>
                        <a href="#" aria-label="Link to X"><i class="iconoir-x"></i></a>
                        <a href="#" aria-label="Link to Instagram"><i class="iconoir-instagram"></i></a>
                        <a href="#" aria-label="Link to TikTok"><i class="iconoir-tiktok"></i></a>
                    </div>
                </div>
                <!-- Newsletter Signup -->
                <div class="col">
                    <form class="container px-4 text-start" action="newsletterSignup">
                        <label class="form-legend px-2 py-3" for="signup-email">Sign up to our newsletter...</label>
                        <div class="input-group">
                                <input id="signup-email" name="email" type="email" class="form-control" placeholder="youremail@example.com" required>
                                <button type="submit" class="btn btn-secondary"><span class="material-symbols-rounded">mail</span></button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Small print -->
            <div class="row row-cols-1 justify-content-center g-0">
                <div class="col-12 mb-3">
                    <div class="row row-cols-1 row-cols-sm-2 gx-0 gy-2 gx-sm-3 justify-content-center">
                        <a href="#" class="inline-link col text-sm-end">Terms and Conditions</a>
                        <a href="wordpress/privacy-policy" class="inline-link col text-sm-start">Privacy Policy</a>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <p>Leeds ActiveHub &copy;</p>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
