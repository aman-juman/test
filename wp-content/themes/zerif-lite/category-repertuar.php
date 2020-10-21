<?php

/**
 * The template for displaying Archive pages.
 *
 * @package zerif-lite
 */
get_header();

?>
<style>
    /** Repertuar***/
    .poster {
        position: relative;
        overflow: hidden;
    }
    .poster img {
        display: block;
        margin: 0 auto;
    }

    .poster img {
        vertical-align: middle;
        border: 0;
        display: block;
        height: 305px;
        max-width: 100%;
    }
    .poster div  span {
        width: 100%;
        display: block;
        color: #bdbdbd;
        margin-bottom: 5px;
        text-decoration: none;
    }
    .poster div p {
        margin: 0;
        font-size: 16px;
        color: #fff;
        text-decoration: underline;
    }
     .poster div {
        position: absolute;
        bottom: 0;
        padding: 10px 0;
        width: 100%;
        background: rgba(0,0,0,.75);
        color: #fff;
        text-align: center;
    }
    .repertuars{
        background: none;
        padding: 0;
        border: none
    }
    .repertuar {
        margin: 0 0 30px

    }

</style>
<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->
<?php zerif_after_header_trigger(); ?>
<?
$event_id= get_data('eid');

$xml_data = simplexml_load_file(get_site_url().'/export.xml');
if($xml_data):
// pagination
// $data->events->children() the events for show in the page
$events = $xml_data->events->children();
$events = $xml_data->events->children();
?>
<?php if(!$event_id):?>
<div id="content" class="site-content">

    <div class="container">

		<?php zerif_before_archive_content_trigger(); ?>

        <div class="row">

			<?php zerif_top_archive_content_trigger(); ?>

            <div id="primary" class="content-area">

                <main id="main" class="site-main container">

					<?php if (have_posts()) : ?>

                        <header class="page-header">
                            <?php
	                        /* Title */
	                        zerif_page_header_title_archive_trigger();
                            ?>
                        </header>
							<?php

							$page_num = (isset($_GET['page_num'])) ? $_GET['page_num'] : 1;


							///echo var_dump($events)."\n";

							foreach ($events as $event) {
//
								$arr_events[] = array(
									'id' => (int)$event['id'],
									'title' => (string)$event[0]->title,
									'img' => $event[0]->images->xpath('image[@main="' . 1 . '"]'),
								);
							}
//								var_dump($arr_events);
							// array to iterator objects
							$itt_events = new ArrayIterator($arr_events);
							//				echo var_dump($events->count())."\n";

							$pagination = new LimitPagination($page_num, $events->count(), 10);
							?>
                <div class="repertuars">

		                <?php
		                foreach (new LimitIterator($itt_events, $pagination->getOffset(), $pagination->getCount()) as $event) :
			                ?>
                            <div class="col-md-3 col-sm-6 col-xs-6  repertuar">
                                <div class="poster">
                                    <a href="<?='/category/afisha/?eid='.$event['id']; ?>">
                                        <img src="<?=$event['img'][0]->url;?>"  class="img-responsive" />
                                        <div>
                                            <span></span>
                                            <p><?= (string)$event['title']; ?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
		                <?php endforeach; ?>
                        <div class="clearfix"></div>
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

                </div>


                        <!-- .page-header -->


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

				<?php zerif_before_archive_content_trigger(); ?>

                <div class="content-left-wrap col-md-12">

					<?php zerif_top_archive_content_trigger(); ?>

                    <div id="primary" class="content-area">

                        <main id="main" class="site-main container">
							<?php

							require_once get_template_directory().DIRECTORY_SEPARATOR.'content-afisha.php';
							?>
                        </main>
                    </div>
                </div>
            </div>
        </div>
	<?php endif;?>
	<?php get_footer(); ?>

    <?php
else:
    echo '<h4 class="text-center">Ошибка ticketon.kz обратитесь  с администраторам или не найденно файл export.xml</h4>';
endif;?>