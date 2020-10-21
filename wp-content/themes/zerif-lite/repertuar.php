<?php
/**
 * Content used in single.php
 *
 * @package zerif-lite
 */
?>
<p>test</p>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">

			<?php zerif_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content container">
		<div class="row">
			<div class="col-md-6 col-lg-6">

				<?=(get_field('photo_albom')?get_field('photo_albom'):'');?>

			</div>
			<div class="col-md-6 col-lg-6">

				<div class="row">
					<div class="col-md-6 col-lg-6">
						<?=(get_field('ext_field')?get_field('ext_field'):'');?>
					</div>
					<div class="col-md-6 col-lg-6">
						<?php if( get_field('date_pub') ): ?>
							<?php
							$date_pub=get_field('date_pub');
							$date_pub=explode("-", $date_pub);
							$day=$date_pub[0];
							$month=$date_pub[1];
							$week=$date_pub[2];
							?>
							<h3 class=""><?=$day; ?></h3>
							<p class=""><?=$month; ?></p>
							<p class=""><?=$week; ?></p>
						<?php endif; ?>
						<?php if($time=get_field('time_pub')):?>
							<p><?=$time;?></p>

						<?php endif;?>
					</div>

				</div>
				<div class="clearfix"></div>
				<div class="col-md-12 col-lg-12">


					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'zerif-lite' ),
							'after'  => '</div>',
						)
					);
					?>

				</div>
			</div>



		</div>
	</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'zerif-lite' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
