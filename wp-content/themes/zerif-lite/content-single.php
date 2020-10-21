<?php
/**
 * Content used in single.php
 *
 * @package zerif-lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">

			<?php zerif_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php
        the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'zerif-lite' ),
					'after'  => '</div>',
				)
			);
		?>

	</div><!-- .entry-content -->



</article><!-- #post-## -->
