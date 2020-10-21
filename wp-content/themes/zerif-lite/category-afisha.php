<?php

/**
 * The template for displaying Archive pages.
 *
 * @package zerif-lite
 */
get_header();

?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->
<?php zerif_after_header_trigger(); ?>
<?
$event_id= get_data('eid');
$xml_data = simplexml_load_file(get_site_url().'/export.xml');
if($xml_data):
// pagination
// $data->sessions->children() the sessions for show in the page
$sessions = $xml_data->sessions->children();
$events = $xml_data->events->children();
?>
<?php if(!$event_id):?>
<div id="content" class="site-content">
    <div class="container">
        <?php zerif_before_archive_content_trigger(); ?>
        <div class="content-left-wrap">
            <?php zerif_top_archive_content_trigger(); ?>
            <div id="primary" class="content-area">
                <main id="main" class="site-main container">
                    <?php if (have_posts()) : ?>
                        <header class="page-header"><?php zerif_page_header_title_archive_trigger(); ?></header>
                            <?php
                            $page_num = (isset($_GET['page_num'])) ? $_GET['page_num'] : 1;
                            ///echo var_dump($sessions)."\n";

                            foreach ($sessions as $session) {
//
                                $arr_sessions[] = array(
                                    'id' => (int)$session['id'],
                                    'event' => (string)$session['event'],
                                    'date' => (string)$session['date'],
                                    'time' => (string)$session['time'],
                                    'hall' => (string)$session['hall'],
                                );
                            }
                            //	var_dump($arr_sessions);
                            // array to iterator objects
                            $itt_sessions = new ArrayIterator($arr_sessions);
                            //				echo var_dump($sessions->count())."\n";

                            $pagination = new LimitPagination($page_num, $sessions->count(), 10);
                            foreach (new LimitIterator($itt_sessions, $pagination->getOffset(), $pagination->getCount()) as $session) :
                                ?>
                                <div class="row list-post-top">
                                    <article id="post-id?>" itemtype="http://schema.org/BlogPosting"
                                             itemtype="http://schema.org/BlogPosting">
                                        <div class="col-lg-2 col-md-2 text-center">
                                            <!----data----->
                                            <?php

                                            //echo date('D M j ', time());
                                            $date = str_replace('.', '-', $session['date']);
                                            $date = date('d-l-F', strtotime($date));
                                            $date_ar = explode('-', $date);

                                            $trans_date = translateDate($date_ar[1], $date_ar[2]);
                                            ?>
                                            <?php if ($session['date']): ?>

                                                <h3 class="day"><?= $date_ar[0]; ?></h3>
                                                <p class="month"><?= $trans_date[1]; ?></p>
                                                <p class="week"><?= $trans_date[0]; ?></p>
                                            <?php endif; ?>


                                        </div>
                                        <!------>
                                        <!----time_pub---->
                                        <div class="col-lg-2 col-md-2 text-center">

                                            <p><b><?= $session['time']; ?></b></p>
                                            <p><?= $session['hall']; ?></p>

                                        </div>
                                        <div class="col-lg-5 col-md-5">
                                            <header class="entry-header">
                                                <?
                                                $event_id = $session['event'];
                                                $events = $xml_data->events->xpath('event[@id="' . $event_id . '"]');

                                                ?>
                                                <h3 class="entry-title">
                                                    <a href="<?='/category/afisha/?eid='.$event_id; ?>">
                                                        <?= (string)$events[0]->title; ?>
                                                    </a>
                                                </h3>


                                            </header><!-- .entry-header -->
                                        </div>
                                        <div class="col-lg-3 col-md-3 ">
<div class="btn-sale">
    <?php
    $pr_session = $xml_data->sessions->xpath('session[@event="' .  $session['event'] . '"]');
    if(!empty($pr_session[0])):
        if ($price = $pr_session[0]->xpath('price[@type="' . 1001000 . '"]'))
            $def_price = $price[0]['sum'];
        ?>

            <h4 class="price " style="color: #670404 !important;"><b><?php echo $def_price; ?> <span>тенге</span></b></h4>


    <?php  endif;?>
                                            <button class=" btn btn-danger custom-button  btn-home" style="margin-left: 0;"
                                                    onclick="ticketon.openFilmSchedule(<?= $event_id; ?>);">Сатып алу
                                            </button>
</div>
                                                              </div>


                                    </article><!-- #post-## -->
                                </div>
                            <?php endforeach; ?>
                            <ul class="pagination justify-content-center" style="">
                                <li class="page-item"><a class="page-link" href="?page_num=1">Бірінші</a></li>
                                <li class="class="page-item <?php if ($page_num <= 1) {
                                    echo 'disabled';
                                } ?>">
                                    <a href="<?php if ($page_num <= 1) {
                                        echo '#';
                                    } else {
                                        echo "?page_num=" . ($page_num - 1);
                                    } ?>"><<</a>
                                </li>
                                <li class="class="page-item <?php if ($page_num >= $pagination->getTotalPages()) {
                                    echo 'disabled';
                                } ?>">
                                    <a class="page-link" href="<?php if ($page_num >= $pagination->getTotalPages()) {
                                        echo '#';
                                    } else {
                                        echo "?page_num=" . ($page_num + 1);
                                    } ?>">>></a>
                                </li>
                                <li class="page-item" ><a class="page-link" href="?page_num=<?php echo $pagination->getTotalPages(); ?>">Соңғы</a></li>
                            </ul>





                        <?php
                    else :

                        get_template_part('content', 'none');

                    endif;
                    ?>

                </main><!-- #main -->

            </div><!-- #primary -->

            <?php zerif_bottom_archive_content_trigger(); ?>

        </div><!-- .content-left-wrap -->

        <?php zerif_after_archive_content_trigger(); ?>


    </div><!-- .container -->
    <?php
    // Дата по-русски


    ?>

    <?php
    else: ?>
    <div id="content" class="site-content">

        <div class="container">

            <div class="content-left-wrap col-md-12">

                <div id="primary" class="content-area">

                    <main id="main" class="site-main">
    <?php

    require_once get_template_directory().DIRECTORY_SEPARATOR.'content-afisha.php';
    ?>
                    </main>
                </div>
            </div>
        </div>
    <?php endif;?>
<?php get_footer(); ?>

<?php
else:
    echo '<h4 class="text-center">Ошибка ticketon.kz обратитесь  с администраторам или не найденно файл export.xml</h4>';
endif;?>