<?php
/**
 * The template for displaying all pages
 */

defined('ABSPATH') || exit;

get_template_part('template-parts/header');
?>

<main class="min-h-screen bg-white py-16 px-6">
    
    <div class="max-w-4xl mx-auto">

        <?php
        // Start the Loop
        if (have_posts()) :
            while (have_posts()) :
                the_post();
        ?>

                <!-- Page Title -->
                <h1 class="text-4xl font-bold mb-6">
                    <?php the_title(); ?>
                </h1>

                <!-- Page Content -->
                <div class="prose max-w-none">
                    <?php the_content(); ?>
                </div>

        <?php
            endwhile;
        endif;
        ?>

    </div>

</main>

<?php get_template_part('template-parts/footer'); ?>