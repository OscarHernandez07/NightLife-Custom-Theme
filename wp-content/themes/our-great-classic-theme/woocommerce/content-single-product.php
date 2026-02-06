<?php
/**
 * Template Name: Single Product Custom
 */

get_template_part('template-parts/header');
global $product;
?>
<!-- Main section -->
<section class="pt-20 pb-0 bg-white relative overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Header Content -->
        <div class="max-w-3xl">
            <span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4 mt-4 block">Product Details</span>
            <h1 class="text-5xl md:text-6xl font-black tracking-tight text-slate-900 mb-6">
                Learn More About This Course <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-400">Deep Dive Into the Material</span>
            </h1>
            <!-- Description -->
            <p class="text-xl text-stone-900 leading-relaxed max-w-2xl">
                Discover everything you need to know about this course, including curriculum, pricing, and enrollment options. Get all the details before you start learning.
            </p>
        </div>
    </div>
</section>

<!-- Secondary div -->
<div class="bg-white py-12">
  <div class="max-w-6xl mx-auto px-4">

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
      <div class="flex flex-col md:flex-row">

        <!-- IMAGE -->
        <div class="md:w-1/2 bg-white">
          <?php echo get_the_post_thumbnail(
            get_the_ID(),
            'large',
            ['class' => 'w-full h-full object-cover']
          ); ?>
        </div>

        <!-- TEXT CONTENT -->
        <div class="md:w-1/2 p-8 md:p-10 space-y-6">

          <!-- Stock Status -->
          <?php if ( ! $product->is_in_stock() ) : ?>
            <div class="inline-block px-4 py-2 bg-red-100 text-red-700 font-semibold rounded-lg text-sm">
              Out of Stock
            </div>
          <?php else : ?>
            <div class="inline-block px-4 py-2 bg-blue-100 text-blue-700 font-semibold rounded-lg text-sm">
              In Stock
            </div>
          <?php endif; ?>

          <!-- Title -->
          <h1 class="text-4xl font-extrabold text-gray-900 leading-tight">
            <?php the_title(); ?>
          </h1>

          <!-- Price -->
          <div class="inline-block px-4 py-2 bg-green-100 text-green-700 font-semibold rounded-lg text-lg">
            <?php echo $product->get_price_html(); ?>
          </div>

          <!-- Add to Cart Form -->
          <form class="" method="post" enctype="multipart/form-data">
            <?php woocommerce_template_single_add_to_cart(); ?>
          </form>

          <!-- Divider -->
          <div class="border-t border-gray-200 pt-4"></div>

          <!-- Description -->
          <div class="prose prose-gray max-w-none">
            <?php the_content(); ?>
          </div>

          <!-- Category -->
          <?php
          $terms = get_the_terms( get_the_ID(), 'product_cat' );
          if ( $terms && ! is_wp_error( $terms ) ) :
              $term = array_shift( $terms );
          ?>
            <div class="pt-6 border-t border-gray-200 text-sm text-gray-600">
              Category: <a href="<?php echo get_term_link( $term ); ?>" class="text-orange-600 font-semibold hover:underline">
                <?php echo $term->name; ?>
              </a>
            </div>
          <?php endif; ?>

        </div>

      </div>
    </div>

  </div>
</div>

<!-- Footer -->
<?php get_template_part('template-parts/footer'); ?>
