<?php
/**
 * Standard ultimate posts widget template
 *
 * @version     2.0.0
 */
?>

<?php if ($instance['before_posts']) : ?>
    <div class="upw-before">
        <?php echo wpautop($instance['before_posts']); ?>
    </div>
<?php endif; ?>


<?php if ($upw_query->have_posts()) : ?>
    <div class="row">
        <?php while ($upw_query->have_posts()) : $upw_query->the_post(); ?>

            <?php $current_post = ($post->ID == $current_post_id && is_single()) ? 'active' : ''; ?>
            <div class="col-md-3 col-sm-3 col-xs-12 pt-cv-content-item pt-cv-1-col">
                <article <?php post_class($current_post);
                pt - cv - ifield ?>>

                    <header>
                        <?php

                        $buy_ticket = (int)trim(get_field('buy_ticket') ? get_field('buy_ticket') : null);
                        $buy_ticket_name = get_field('buy_ticket_name') ? get_field('buy_ticket_name') : null;
                        $xml_data = simplexml_load_file(get_site_url() . '/export.xml');
                        if ($xml_data):
                            $session = $xml_data->sessions->xpath('session[@event="' . $buy_ticket . '"]');
// var_dump(empty($session[0]));
                        else:
                            $xml_data = null;
                        endif;

                        $date = str_replace('.', '-', $session[0]['date']);
                        $date = date('d-l-F', strtotime($date));
                        $date_ar = explode('-', $date);

                        $trans_date = translateDate($date_ar[1], $date_ar[2]);
                        ?>
                        <?php if ($session[0]['date']): ?>
                            <p class="month" style="margin-bottom: 5px;"><?=  $date_ar[0]. " ". $trans_date[1] . " " . $trans_date[0]; ?></p>
                        <?php endif; ?>
                        <?php if (current_theme_supports('post-thumbnails') && $instance['show_thumbnail'] && has_post_thumbnail()) : ?>
                            <div class="_blank pt-cv-href-thumbnail pt-cv-thumb-default">
                                <a href="<?php the_permalink(); ?>" rel="bookmark">
                                    <?php the_post_thumbnail($instance['thumb_size']); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php
                        $href_page = get_field('href_page') ? get_field('href_page') : null;
                        ?>
                        <?php if ((get_the_title() && $instance['show_title'])) : ?>
                            <h4 class="pt-cv-title">
                                <a href="<?php echo isset($href_page) ? $href_page : the_permalink(); ?>"
                                   rel="bookmark">
                                    <?php

                                    the_title();

                                    ?>

                                </a>
                            </h4>
                        <?php endif; ?>

                        <?php if ($instance['show_date'] || $instance['show_author'] || $instance['show_comments']) : ?>

                            <div class="pt-cv-meta-fields">

                                <?php if ($instance['show_date']) : ?>
                                    <time class="published"
                                          datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_time($instance['date_format']); ?></time>
                                <?php endif; ?>

                                <?php if ($instance['show_date'] && $instance['show_author']) : ?>
                                    <span class="sep"><?php _e('|', 'upw'); ?></span>
                                <?php endif; ?>

                                <?php if ($instance['show_author']) : ?>
                                    <span class="author vcard">
                    <?php echo __('By', 'upw'); ?>
                                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"
                                           rel="author" class="fn">
                      <?php echo get_the_author(); ?>
                    </a>
                  </span>
                                <?php endif; ?>

                                <?php if ($instance['show_author'] && $instance['show_comments']) : ?>
                                    <span class="sep"><?php _e('|', 'upw'); ?></span>
                                <?php endif; ?>

                                <?php if ($instance['show_comments']) : ?>
                                    <a class="comments" href="<?php comments_link(); ?>">
                                        <?php comments_number(__('No comments', 'upw'), __('One comment', 'upw'), __('% comments', 'upw')); ?>
                                    </a>
                                <?php endif; ?>

                            </div>

                        <?php endif; ?>

                    </header>

                    <?php if ($instance['show_excerpt']) : ?>
                        <div class="entry-summary">
                            <p>
                                <?php echo get_the_excerpt(); ?>
                                <?php if ($instance['show_readmore']) : ?>
                                    <a href="<?php the_permalink(); ?>"
                                       class="more-link"><?php echo $instance['excerpt_readmore']; ?></a>
                                <?php endif; ?>
                            </p>
                        </div>
                    <?php elseif ($instance['show_content']) : ?>
                        <div class="entry-content">
                            <?php the_content() ?>
                        </div>
                    <?php endif; ?>

                    <footer>

                        <?php
                        $categories = get_the_term_list($post->ID, 'category', '', ', ');
                        if ($instance['show_cats'] && $categories) :
                            ?>
                            <div class="entry-categories">
                                <strong class="entry-cats-label"><?php _e('Posted in', 'upw'); ?>:</strong>
                                <span class="entry-cats-list"><?php echo $categories; ?></span>
                            </div>
                        <?php endif; ?>

                        <?php
                        $tags = get_the_term_list($post->ID, 'post_tag', '', ', ');
                        if ($instance['show_tags'] && $tags) :
                            ?>
                            <div class="entry-tags">
                                <strong class="entry-tags-label"><?php _e('Tagged', 'upw'); ?>:</strong>
                                <span class="entry-tags-list"><?php echo $tags; ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if ($custom_fields) : ?>



                            <?php
                            if (!empty($session[0])):
                                if ($price = $session[0]->xpath('price[@type="' . 1001000 . '"]'))
                                    $def_price = $price[0]['sum'];
                                ?>
                                <div class="entry-custom-fields">

                                        <h3 class="price text-center" style="color: #670404 !important;">
                                            <b><?php echo $def_price; ?> <span>тенге</span></b>

                                        </h3>


                                </div>
                            <?php endif; ?>
                            <div class="entry-custom-fields">
                                <div style="text-align: center">
                                    <button class="btn-sale btn btn-danger custom-button btn-home"
                                            onclick="ticketon.openFilmSchedule(<?= $buy_ticket; ?>);"><?= $buy_ticket_name; ?></button>
                                </div>
                            </div>
                            <?php $custom_field_name = explode(',', $custom_fields); ?>
                            <div class="entry-custom-fields">
                                <?php foreach ($custom_field_name as $name) :
                                    $name = trim($name);
                                    $custom_field_values = get_post_meta($post->ID, $name, true);
                                    if ($custom_field_values) : ?>
                                        <div class="custom-field custom-field-<?php echo $name; ?>">
                                            <?php
                                            if (!is_array($custom_field_values)) {
                                                //   echo $custom_field_values;
                                            } else {
                                                $last_value = end($custom_field_values);
                                                foreach ($custom_field_values as $value) {
                                                    //    echo $value;
                                                    if ($value != $last_value) echo ', ';
                                                }
                                            }
                                            ?>
                                        </div>
                                    <?php endif;
                                endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </footer>

                </article>
            </div>
        <?php endwhile; ?>
    </div>
<?php else : ?>

    <p class="upw-not-found">
        <?php _e('No posts found.', 'upw'); ?>
    </p>

<?php endif; ?>


<?php if ($instance['after_posts']) : ?>
    <div class="upw-after">
        <?php echo wpautop($instance['after_posts']); ?>
    </div>
<?php endif; ?>