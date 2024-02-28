<?php
/*
Template Name: Esplora
*/
?>
<?php get_header(); ?>

<div class="container text-center">
    <div class="row">
        <div class="col-8">
            <h1 class="text-center">Page: <?php the_title(); ?></h1>

            <?php
            // Query for the "Luoghi da esplorare" page
            $query = new WP_Query(array(
                'post_type' => 'page',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'title' => 'Luoghi da esplorare'
            ));

            // Check if the page exists
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    // Display the page content
                    the_content();
                }
                wp_reset_postdata(); // Restore global post data
            } else {
                echo 'Page not found.';
            }
            ?>
        </div>
        <div class="col-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>