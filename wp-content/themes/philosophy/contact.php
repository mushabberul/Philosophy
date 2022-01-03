<?php

/**
 * Template Name: Contact Page
 */
get_header();
?>


<!-- s-content
	================================================== -->
<section class="s-content s-content--narrow">

	<div class="row">

		<div class="s-content__header col-full">
			<h1 class="s-content__header-title">
				<?php the_title(); ?>
			</h1>
		</div> <!-- end s-content__header -->

		<div class="s-content__media col-full">
			<?php
			if (is_active_sidebar("wp-google-maps")) {
				dynamic_sidebar("wp-google-maps");
			}
			?>
		</div> <!-- end s-content__media -->

		<div class="col-full s-content__main">

			<?php the_content(); ?>

			<div class="row">
				<?php
				if (is_active_sidebar("contact-info")) {
					dynamic_sidebar("contact-info");
				}
				?>
			</div> <!-- end row -->

			<h3>Say Hello.</h3>

			<?php
			if (get_field("contact_form_shortcode")) {
				echo do_shortcode(get_field("contact_form_shortcode"));
			}
			?>


		</div> <!-- end s-content__main -->

	</div> <!-- end row -->

</section> <!-- s-content -->

<?php get_footer(); ?>