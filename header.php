<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
    <title><?php
            if (is_single()) {
                single_post_title();
            } elseif (is_home() || is_front_page()) {
                bloginfo('name');
                print ' | ';
                bloginfo('description');
                get_page_number();
            } elseif (is_page()) {
                single_post_title('');
            } elseif (is_search()) {
                bloginfo('name');
                print ' | Search results for ' . wp_specialchars($s);
                get_page_number();
            } elseif (is_404()) {
                bloginfo('name');
                print ' | Not Found';
            } else {
                bloginfo('name');
                wp_title('|');
                get_page_number();
            }
            ?></title>

    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />

    <?php if (is_singular()) wp_enqueue_script('comment-reply'); ?>

    <?php wp_head(); ?>

    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf(__('%s latest posts', 'your-theme'), wp_specialchars(get_bloginfo('name'), 1)); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf(__('%s latest comments', 'your-theme'), wp_specialchars(get_bloginfo('name'), 1)); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>


<body>
    <?php
    $custom_logo_id = get_theme_mod('custom_logo');
    $image = wp_get_attachment_image_src($custom_logo_id, 'full');
    ?>


    <header id="header">
        <div id="masthead">

            <div id="branding">
                <div id="blog-title"><span><a href="<?php bloginfo('url') ?>/" title="<?php bloginfo('name') ?>" rel="home"><img src="<?= $image[0]; ?>" alt=""></a></span></div>
            </div>

            <div id="access">
                <div class="skip-link"><a href="#content" title="<?php _e('Skip to content', 'your-theme') ?>"><?php _e('Skip to content', 'your-theme') ?></a></div>
                <nav>
                    <?php wp_nav_menu(array('theme_location' => 'main-menu', 'container_class' => 'navbar')); ?>
                </nav>
            </div>

        </div>

    </header>

    <main id="main">