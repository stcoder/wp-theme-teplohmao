<!DOCTYPE html>
<head>

    <title><?php wp_title(' - ', true, 'right'); bloginfo('name') ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <?php wp_head() ?>
</head>

<div class="body-container">
    <div class="logo-container">
        <a href="<?php echo home_url() ?>">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.png">
        </a>
    </div>

    <div class="navigation-container">
        <?php wp_nav_menu(array('theme_location' => 'header', 'container' => '')) ?>
        <script>
            var $menu = $('#menu-menu');
            // Ищем подменю.
            $menu.find('li').each(function() {
                var $self = $(this);
                if ($self.find('.sub-menu').length > 0) {
                    var $arrow = $('<span/>');
                    $arrow.addClass('arrow').hide();
                    $self.addClass('parent').find('>a').append($arrow).find('.arrow').show(100);
                }
            });
        </script>
    </div>
</div>