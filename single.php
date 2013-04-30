<?php
/**
 * Created by teplohmao.
 * User: Sergey Tihonov
 */
get_header();
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
endwhile; endif;
get_footer();