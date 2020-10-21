<?php
global $xml_data;
$event = $xml_data->events->xpath('event[@id="' . $event_id . '"]');
$session = $xml_data->sessions->xpath('session[@event="' . $event_id . '"]');
$images = $event[0]->images->children();
$videos = $event[0]->videos->children();
//var_dump($event[0]);
$arr_session = array(
    'id' => (int)$session['id'],
    'event' => (string)$session[0]['event'],
    'date' => (string)$session[0]['date'],
    'time' => (string)$session[0]['time'],
    'hall' => (string)$session[0]['hall'],
);
//var_dump($arr_session);

?>
<style>
    .main-slider {

        width:100%
        display:block;
        margin:0 auto;
    }
 .item-slider {

    }

    /*.entry-content  .performance-slider,*/
    /*.entry-content  .performance-slider-nav {*/
        /*margin: 0*/
    /*}*/
    /*.entry-content  .performance-slider-nav .slick-slide,*/
    /*.entry-content  .performance-slider .slick-slide {*/
        /*padding: 0 10px*/
    /*}*/

    /*.entry-content  .performance-slider {*/
        /*margin-bottom: 20px*/
    /*}*/

    /*.entry-content  .performance-slider .slick-slide img {*/
        /*border: 2px solid #eaa811*/
    /*}*/

    /*.entry-content  .performance-slider-nav .slick-next,*/
    /*.entry-content  .performance-slider-nav .slick-prev,*/
    /*.entry-content  .performance-slider .slick-next,*/
    /*.entry-content  .performance-slider .slick-prev {*/
        /*width: 20px;*/
        /*height: 20px;*/
        /*background: transparent*/
    /*}*/

    /*.entry-content  .performance-slider-nav .slick-next:before,*/
    /*.entry-content  .performance-slider-nav .slick-prev:before,*/
    /*.entry-content  .performance-slider .slick-next:before,*/
    /*.entry-content  .performance-slider .slick-prev:before {*/
        /*width: 20px;*/
        /*height: 20px*/
    /*}*/

    /*.  .performance-slider-nav .slick-prev,*/
    /*.entry-content  .performance-slider .slick-prev {*/
        /*left: -15px*/
    /*}*/

    /*.entry-content  .performance-slider-nav .slick-prev:before,*/
    /*.entry-content  .performance-slider .slick-prev:before {*/
        /*background-position: -58px -61px*/
    /*}*/

    /*.entry-content  .performance-slider-nav .slick-next,*/
    /*.entry-content  .performance-slider .slick-next {*/
        /*right: -15px*/
    /*}*/

    /*.entry-content  .performance-slider-nav .slick-next:before,*/
    /*.entry-content  .performance-slider .slick-next:before {*/
        /*background-position: -80px -62px*/
    /*}*/

    /*.entry-content  .performance-slider-nav .video {*/
        /*position: relative*/
    /*}*/

    /*.entry-content  .performance-slider-nav .video a:after {*/
        /*content: "";*/
        /*background: url(../images/sprite.png);*/
        /*background-position: -104px -74px;*/
        /*width: 30px;*/
        /*height: 30px;*/
        /*display: block;*/
        /*position: absolute;*/
        /*top: 0;*/
        /*right: 0;*/
        /*bottom: 0;*/
        /*left: 0;*/
        /*margin: auto;*/
        /*cursor: pointer*/
    /*}*/

    /*.entry-content  .performance-slider-nav .slick-slide img:hover {*/
        /*cursor: pointer*/
    /*}*/

</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">

        <h1 class="entry-title"><?= $event[0]->title; ?></h1>


    </header><!-- .entry-header -->

    <div class="entry-content container">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="main-slider">
                    <div class="slider  slider-for">

                        <?php foreach ($images as $image): ?>
                            <?php if ((int)$image['main'] == 0): ?>
                                <div class="item-slider">
                                    <img src="<?= $image->url ?>" alt="<?= $image->alt ?>" title="<?= $image->alt ?>"/>
                                </div>
                           <?php endif; ?>
                        <?php endforeach; ?>
	                    <?php foreach ($videos as $video): ?>
		                    <?php if ($video['type'] == 'youtube'): ?>
<!--			                    --><?//=$video->code;?>
		                    <?php endif; ?>
	                    <?php endforeach; ?>
                    </div>
                    <div class="slider  slider-nav">

                        <?php foreach ($images as $image): ?>
                            <?php if ((int)$image['main'] == 0): ?>
                                <div class="item-slider">
                                    <img src="<?= $image->url ?>" alt="<?= $image->alt ?>" title="<?= $image->alt ?>"/>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
	                    <?php foreach ($videos as $video): ?>
		                    <?php if ($video['type'] == 'youtube'): ?>
                                <img src="<?= $video->image; ?>" alt="" title=""/>
		                    <?php endif; ?>
	                    <?php endforeach; ?>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-lg-6">

                <div class="row">
                    <div class="col-md-6 col-lg-6">

                    </div>
                    <div class="col-md-6 col-lg-6">
                        <!----data----->
                        <?php

                        //echo date('D M j ', time());
                        $date = str_replace('.', '-', $arr_session['date']);
                        $date = date('d-l-F', strtotime($date));
                        $date_ar = explode('-', $date);

                        $trans_date = translateDate($date_ar[1], $date_ar[2]);

                        ?>
                        <?php if ($arr_session['date']): ?>

                            <h3 class="day"><?= $date_ar[0]; ?></h3>
                            <p class="month"><?= $trans_date[1]; ?></p>
                            <p class="week"><?= $trans_date[0]; ?></p>

                        <?php endif; ?>
                        <p><b><?= $arr_session['time']; ?></b></p>
                    </div>

                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 col-lg-12">


                    <?= $event[0]->description; ?>

                    <?php wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . __('Pages:', 'zerif-lite'),
                            'after' => '</div>',
                        )
                    );
                    ?>

                </div>
            </div>


        </div>
    </div>

    </div><!-- .entry-content -->

</article><!-- #post-## -->
<?php
function slick_slider() { ?>
    <script type="text/javascript">
        (function( $ ) {

            "use strict";
console.log($(".slider-for"));
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: true,
                centerMode: true,
                focusOnSelect: true
            });
//            $(".performance-slider").slick({
//                dots: !1,
//                arrows: !1,
//                infinite: !0,
//                speed: 500,
//                fade: !1,
//                cssEase: "linear",
//                asNavFor: ".performance-slider-nav",
//                responsive: [{
//                    breakpoint: 480,
//                    settings: {
//                        arrows: !0
//                    }
//                }]
//            });
//            $(".performance-slider-nav").slick({
//                lazyLoad: "ondemand",
//                slidesToShow: 5,
//                slidesToScroll: 1,
//                dots: !1,
//                infinite: !0,
//                speed: 500,
//                fade: !1,
//                cssEase: "linear",
//                focusOnSelect: !0,
//                asNavFor: ".performance-slider"
//            });
//

        })(jQuery);

    </script>
    <?php
}
add_action( 'wp_footer', 'slick_slider',60 );
?>
