<?php

$xml_data = simplexml_load_file(get_site_url().'/export.xml');
if ($xml_data):
    $event = $xml_data->events->xpath('event[@id="' . $event_id . '"]');
    $arr_event = array(
        'duration' => (int)$event[0]->duration,
        'genre' => (string)$event[0]->genre,

    );


    $session = $xml_data->sessions->xpath('session[@event="' . $event_id . '"]');

// get default price
//$price = $session->price->xpath('price[@type="' . 1001000 . '"]');
    if ($price = $session[0]->xpath('price[@type="' . 1001000 . '"]'))
        $def_price = $price[0]['sum'];
    else $def_price = null;
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
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <!-- .entry-header -->

        <div class="entry-content">
            <header class="entry-header" style="padding-bottom: 10px;">

                <h1 class="entry-title"><?= $event[0]->title; ?></h1>


            </header>

            <div class="col-xs-12 col-md-6 col-lg-6" style="padding-left: 0;">
                <div class="main-slider">
                    <div class="slider performance-slider">
                        <?php foreach ($videos as $video): ?>
                            <?php if ($video['type'] == 'youtube'): ?>
                                <?= $video->code; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php foreach ($images as $image): ?>
                            <?php if ((int)$image['main'] == 0): ?>
                                <div class="item-slider">
                                    <img src="<?= $image->url ?>" alt="<?= $image->alt ?>" title="<?= $image->alt ?>"/>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>
                    <div class="slider performance-slider-nav hidden-xs">
                        <?php foreach ($videos as $video): ?>
                            <?php if ($video['type'] == 'youtube'): ?>
                                <img src="<?= $video->image; ?>" alt="" title=""/>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php foreach ($images as $image): ?>
                            <?php if ((int)$image['main'] == 0): ?>
                                <div class="item-slider">
                                    <img src="<?= $image->url ?>" alt="<?= $image->alt ?>" title="<?= $image->alt ?>"/>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-md-6 col-lg-6">

                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <p><b>Ұзақтығы:</b>&nbsp;<?php
                            $time = $arr_event['duration'];
                            $hours = floor($time / 60);
                            $minutes = $time % 60;
                            printf('%02d:%02d:00', $hours, $minutes);
                            ?></p>
                        <p><b>Жанры:</b>&nbsp;<?= $arr_event['genre']; ?></p>
                        <p><b>Зал:</b>&nbsp;<?= $arr_session['hall']; ?></p>
                        <p class="btn-sale">
                            <button class="btn-sale btn btn-danger custom-button  btn-home"
                                    onclick="ticketon.openFilmSchedule(<?= $event_id; ?>);">Сатып алу
                            </button>
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <!----data----->
                        <div class="text-center">
                            <?php

                            //echo date('D M j ', time());
                            $date = str_replace('.', '-', $arr_session['date']);
                            $date = date('d-l-F', strtotime($date));
                            $date_ar = explode('-', $date);

                            $trans_date = translateDate($date_ar[1], $date_ar[2]);

                            ?>
                            <?php if ($arr_session['date']): ?>

                                <h3 class="day"><?= $date_ar[0]; ?></h3>
                                <p class="month marg10b"><?= $trans_date[1]; ?></p>
                                <p class="week marg10b"><?= $trans_date[0]; ?></p>

                            <?php endif; ?>
                            <p class="time" style="text-align: center;"><?= $arr_session['time']; ?></p>
                            <h4 class="price"><b><?= $def_price; ?> <span>тенге</span></b></h4>
                        </div>
                    </div>

                </div>
                <div class="clearfix"></div>

                <div class="row">


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

        </div><!-- .entry-content -->

    </article><!-- #post-## -->
    <?php
    function slick_slider()
    { ?>
        <script type="text/javascript">
            (function ($) {

                "use strict";


                $(".performance-slider").slick({
                    dots: false,
                    arrows: false,
                    infinite: !0,
                    speed: 500,
                    fade: !1,
                    cssEase: "linear",
                    asNavFor: ".performance-slider-nav",
                    responsive: [{
                        breakpoint: 480,
                        settings: {
                            arrows: !0
                        }
                    }]
                });
                $(".performance-slider-nav").slick({
                    lazyLoad: "ondemand",
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    dots: !1,
                    infinite: !0,
                    speed: 500,
                    fade: !1,
                    cssEase: "linear",
                    adaptiveHeight: true,
                    focusOnSelect: !0,
                    asNavFor: ".performance-slider",
                    prevArrow: '<div class="slick-prev"></span></div>',

                    nextArrow: '<div class="slick-next"></span></div>'
                });


            })(jQuery);

        </script>
        <?php
    }

    add_action('wp_footer', 'slick_slider', 60);
else:
    echo '<h4 class="text-center">Ошибка  ticketon.kz обратитесь  с администраторам или не найденно файл export.xml</h4>';
endif;

?>
