<?php get_header(); ?>

<div class="container text-center">
    <div class="row">
        <div class="col-8">
            <h1 class="text-center">HomePage: <?php bloginfo('name'); ?></h1>
            <h2 class="text-center"><?php bloginfo('description'); ?></h2>

            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_title('<h2>', '</h2>');
                    the_post_thumbnail();
                    the_excerpt();
                endwhile;
            else :
                _e('Sorry, no posts matched your criteria.', 'textdomain');
            endif;
            ?>
        </div>
        <div class="col-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>