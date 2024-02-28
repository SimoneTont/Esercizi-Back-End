<?php get_header(); ?>

<div class="container text-center">
    <div class="row">
        <div class="col-8">
            <h1 class="text-center">Page: <?php bloginfo('name'); ?></h1>

            <?php
            if (is_user_logged_in()) {
                echo 'Welcome, ' . wp_get_current_user()->display_name . '!';
            } else {
                echo 'Welcome, visitor!';
            }
            ?>

        </div>
    </div>
</div>


<?php get_footer(); ?>