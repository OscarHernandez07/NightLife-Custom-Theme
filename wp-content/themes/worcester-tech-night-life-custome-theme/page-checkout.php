<?php
/**
 * Template Name: Checkout Page
 */

get_template_part('template-parts/header');
?>

<section class="pt-20 lg:pt-28 bg-white relative overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4 mt-4 block">
                Checkout
            </span>
            <h1 class="text-5xl md:text-6xl font-black tracking-tight text-slate-900 mb-6">
                Complete Your Order <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-400">
                    Secure & Easy Payment
                </span>
            </h1>
            <p class="text-xl text-stone-900 leading-relaxed max-w-2xl">
                Here’s a summary of the courses you’ve selected. You can update quantities, remove items, or proceed to checkout to start learning.
            </p>
        </div>
    </div>
</section>

<div class="bg-gray-50 py-24">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <?php
        // This will render whatever content is inside the page editor
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>

    </div>
</div>

<?php get_template_part('template-parts/footer'); ?>
