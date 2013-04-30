<?php
/**
 * Created by teplohmao.
 * User: Sergey Tihonov
 */
get_header();
if (is_home() or is_front_page()) :
the_post();
echo do_shortcode('[layerslider id="1"]');
?>
    <div class="body-container">
        <div class="text-box">
            <div class="box-header">
                <h1><?php the_title() ?></h1>
                <div class="box-header-line"></div>
            </div>
            <div class="box-content">
                <?php the_content() ?>
            </div>
        </div>
        <div class="text-box">
            <div class="box-header">
                <h1>НАШИ ПОСЛЕДНИЕ РАБОТЫ</h1>
                <div class="box-header-line"></div>
            </div>
            <div class="box-content">
                <ul class="portfolio-list">
                    <?php
                    query_posts('cat=3&showposts=3');
                    while(have_posts()): the_post();
                        ?>
                        <li class="portfolio-item">
                            <div class="action-box">
                                <div class="header"><?php echo get_the_title() ?></div>
                                <div class="link"><a href="<?php echo get_permalink() ?>">подробней</a></div>
                            </div>
                            <div class="portfolio-item-image-wrap">
                                <?php echo get_the_post_thumbnail() ?>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <div class="text-box">
            <div class="box-header">
                <h1>ПОСЛЕДНИЕ ЗАПИСИ</h1>
                <div class="box-header-line"></div>
            </div>
            <div class="box-content">
                <?php
                query_posts('cat=1&showposts=3');
                global $more;
                $more = 0;
                while(have_posts()): the_post();
                    ?>
                    <div id="post<?php echo get_the_ID() ?>" class="post">
                        <?php if(has_post_thumbnail()): ?>
                            <div class="pull-left post-thumbnail">
                                <?php echo get_the_post_thumbnail() ?>
                            </div>
                        <?php endif; ?>
                        <div class="post-body">
                            <h1 class="post-header"><?php the_title() ?></h1>
                            <?php echo home_get_the_content() ?>
                            <div class="post-link">
                                <a href="<?php the_permalink() ?>">Подробней</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php
else:
    if (have_posts()):
    while (have_posts()): the_post();
        ?>
        <div class="body-container">
            <div class="text-box" style="border-top-width: 0;">
                <div class="box-header">
                    <h1><?php the_title() ?></h1>
                    <div class="box-header-line"></div>
                </div>
                <div class="box-content">
                    <div id="post<?php echo get_the_ID() ?>" class="post-single">
                        <?php if(has_post_thumbnail()): ?>
                            <div class="post-thumbnail">
                                <?php echo get_the_post_thumbnail() ?>
                            </div>
                        <?php endif; ?>
                        <div class="post-body">
                            <?php echo home_get_the_content() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endwhile; endif; endif;
get_footer();