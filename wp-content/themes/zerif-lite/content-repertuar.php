<?php
/**
 * The default template used for displaying page content
 *
 * @package zerif-lite
 */
?>
<div class="col-md-3 col-sm-6 col-xs-6" style="     ">
<article id="post-<?php the_ID(); ?>" itemtype="http://schema.org/BlogPosting" itemtype="http://schema.org/BlogPosting">


	<?php


		$post_thumbnail_url = get_the_post_thumbnail( get_the_ID() );

		if ( ! empty( $post_thumbnail_url ) ) {

			echo '<div class="">';

			echo '<a href="' . esc_url( get_permalink() ) . '" title="' . the_title_attribute( 'echo=0' ) . '" >';

			echo $post_thumbnail_url;

			echo '</a>';
			?>
            <p class="" style="text-align: center; padding-top: 2px; text-transform: uppercase; overflow: hidden;"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></p>
			<?php
			echo '</div>';

		}

	?>






</article><!-- #post-## -->
</div>