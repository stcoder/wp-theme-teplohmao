<?php
/**
 * Created by teplohmao.
 * User: Sergey Tihonov
 */
register_nav_menu('header', 'Основное меню');

add_theme_support('post-thumbnails');

register_sidebar(array(
    'name' => 'Main Sidebar',
    'id' => 'sidebar-1',
    'description' => ''
));

function home_get_the_content($more_link_text = null, $stripteaser = false) {
    global $more, $page, $pages, $multipage, $preview;

    $post = get_post();

    if ( null === $more_link_text )
        $more_link_text = __( '(more...)' );

    $output = '';
    $hasTeaser = false;

    // If post password required and it doesn't match the cookie.
    if ( post_password_required() )
        return get_the_password_form();

    if ( $page > count($pages) ) // if the requested page doesn't exist
        $page = count($pages); // give them the highest numbered page that DOES exist

    $content = $pages[$page-1];
    if ( preg_match('/<!--more(.*?)?-->/', $content, $matches) ) {
        $content = explode($matches[0], $content, 2);
        if ( !empty($matches[1]) && !empty($more_link_text) )
            $more_link_text = strip_tags(wp_kses_no_null(trim($matches[1])));

        $hasTeaser = true;
    } else {
        $content = array($content);
    }
    if ( (false !== strpos($post->post_content, '<!--noteaser-->') && ((!$multipage) || ($page==1))) )
        $stripteaser = true;
    $teaser = $content[0];
    if ( $more && $stripteaser && $hasTeaser )
        $teaser = '';
    $output .= $teaser;
    if ( count($content) > 1 ) {
        if ( $more ) {
            $output .= '<span id="more-' . $post->ID . '"></span>' . $content[1];
        } else {
            if ( ! empty($more_link_text) )
                $output .= '...';
            $output = force_balance_tags($output);
        }

    }
    if ( $preview ) // preview fix for javascript bug with foreign languages
        $output =	preg_replace_callback('/\%u([0-9A-F]{4})/', '_convert_urlencoded_to_entities', $output);

    $output = apply_filters('the_content', $output);
    $output = str_replace(']]>', ']]&gt;', $output);
    return $output;
}