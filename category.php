<?php
/**
 * Created by teplohmao.
 * User: Sergey Tihonov
 */
get_header();?>
<div class="body-container">
<div class="text-box" style="border-top-width: 0; margin-top: 20px;">
    <div class="box-content">
<?php
if (have_posts()):
    while (have_posts()): the_post();
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
    <?php
    endwhile;?>
    <div class="paginator">
        <span class="pull-left"><?php previous_posts_link('« Предыдущие записи'); ?></span>
        <span class="pull-right"><?php next_posts_link('Следующие записи »'); ?></span>
        <div class="clearfix"></div>
    </div>
    <?php endif;?>
    </div>
</div>
</div>
<?php
get_footer();