<?php
/**
 * The default template used for displaying page content
 *
 * @package zerif-lite
 */
?>
<div class="row list-post-top">
<article id="post-id<?php the_ID(); ?>" <?php post_class(); ?> itemtype="http://schema.org/BlogPosting" itemtype="http://schema.org/BlogPosting">
    <div class="col-lg-2 col-md-2 text-center">
	    <?php if( get_field('date_pub') ): ?>
		    <?php
		    $date_pub=get_field('date_pub');
		    $date_pub=explode("-", $date_pub);
		    $day=$date_pub[0];
		    $month=$date_pub[1];
		    $week=$date_pub[2];
		    ?>
            <h3 class="day"><?=$day; ?></h3>
            <p class="month"><?=$month; ?></p>
            <p class="week"><?=$week; ?></p>
	    <?php endif; ?>


    </div>
    <div class="col-lg-2 col-md-2 text-center" >
	    <?php if($time=get_field('time_pub')):?>
            <p><b><?=$time;?></b></p>
	    <?php endif;?>
    </div>
    <div class="col-lg-5 col-md-5">
        <header class="entry-header">

            <h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>


        </header><!-- .entry-header -->
    </div>
    <div class="col-lg-3 col-md-3">
        <button class="btn btn-danger" style="width: 70%">Купить билет</button>

        <button class="btn btn-success" style="width: 70%">Бронировать билет</button>
    </div>



</article><!-- #post-## -->
</div>
