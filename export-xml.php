<?php
/**
 * The template for displaying Archive pages.
 *
 * @package zerif-lite
 */
//get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->
<?php zerif_after_header_trigger(); ?>

<div id="content" class="site-content">

	<div class="container">

		<?php zerif_before_archive_content_trigger(); ?>

		<div class="content-left-wrap col-md-12">

			<?php zerif_top_archive_content_trigger(); ?>

			<div id="primary" class="content-area">

				<main id="main" class="site-main container">


				</main><!-- #main -->

			</div><!-- #primary -->

			<?php zerif_bottom_archive_content_trigger(); ?>

		</div><!-- .content-left-wrap -->

		<?php zerif_after_archive_content_trigger(); ?>


	</div><!-- .container -->

<!--	--><?php //get_footer(); ?>
