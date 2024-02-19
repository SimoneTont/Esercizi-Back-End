<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri() . '?ver=' . time()); ?>" type="text/css" />
    <?php wp_head(); ?>
</head>

<body>
    <header class="mb-3">
        <?php

        // Retrieve the URL of the uploaded logo image
        $logo_url = get_theme_mod('bd_logo');

        // Check if a logo has been uploaded
        if ($logo_url) {
            // If a logo has been uploaded, display it
            echo '<img src="' . esc_url($logo_url) . '" alt="Site Logo">';
        } else {
            // If no logo has been uploaded, you can display a default logo or fallback content
            echo '<h1>' . get_bloginfo('name') . '</h1>';
        }
        ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">

                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'container' => false,
                        'menu_class' => '',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                        'depth' => 2,
                        'walker' => new bootstrap_5_wp_nav_menu_walker()
                    ));
                    ?>
                </div>
            </div>
        </nav>
    </header>