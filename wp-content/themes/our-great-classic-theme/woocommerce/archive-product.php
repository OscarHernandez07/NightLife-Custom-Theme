<?php
/**
 * WooCommerce Archive Product Template
 * Safe, stable, production-ready
 */

defined( 'ABSPATH' ) || exit;

get_template_part( 'template-parts/header' );

// REQUIRED: WooCommerce wrapper START
do_action( 'woocommerce_before_main_content' );
?>

<div class="min-h-screen bg-white">


<section class="pt-20 lg:pt-28 bg-white relative overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Header Content -->
        <div class="max-w-3xl">
            <span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4 block">Course Catalog</span>
            <h1 class="text-5xl md:text-6xl font-black tracking-tight text-slate-900 mb-6">
                Explore Our Programs <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-400">Learn at Your Own Pace</span>
            </h1>
            <p class="text-xl text-stone-900 leading-relaxed max-w-2xl">
                Browse our full range of courses and find the perfect program to boost your skills and career. Start learning today!
            </p>
        </div>
    </div>
</section>



  <!-- Main Content -->
  <main id="primary" class="max-w-7xl mx-auto px-6 lg:px-8 py-20">

    <div class="grid grid-cols-1 gap-12 <?php echo is_active_sidebar( 'shop-sidebar' ) ? 'lg:grid-cols-4' : ''; ?>">

      <!-- Sidebar -->
      <?php if ( is_active_sidebar( 'shop-sidebar' ) ) : ?>
        <aside class="hidden lg:block lg:col-span-1">
          <div class="sticky top-8 space-y-8">
            <?php dynamic_sidebar( 'shop-sidebar' ); ?>
          </div>
        </aside>
      <?php endif; ?>

      <!-- Products -->
      <section class="<?php echo is_active_sidebar( 'shop-sidebar' ) ? 'lg:col-span-3' : 'col-span-full'; ?>">

        <!-- Result count & ordering -->
        <div class="mb-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6 border-b border-slate-100 pb-8">
          <div class="text-slate-500 font-medium">
            <?php woocommerce_result_count(); ?>
          </div>
          <div class="[&_select]:rounded-full [&_select]:border-slate-200 [&_select]:px-4 [&_select]:py-2 [&_select]:font-bold [&_select]:text-slate-900">
            <?php woocommerce_catalog_ordering(); ?>
          </div>
        </div>

        <?php if ( woocommerce_product_loop() ) : ?>

          <ul class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">

            <?php while ( have_posts() ) : the_post(); 
              $product = wc_get_product( get_the_ID() );
              if ( ! $product ) continue;
            ?>

              <li <?php wc_product_class(
                'group bg-white rounded-[2rem] border border-slate-200/60 overflow-hidden hover:shadow-[0_20px_50px_rgba(0,0,0,0.06)] transition-all duration-500 flex flex-col h-full',
                $product
              ); ?>>

                <div class="relative overflow-hidden h-52">
                  <a href="<?php the_permalink(); ?>" class="block h-full">
                    <?php if ( has_post_thumbnail() ) : ?>
                      <?php the_post_thumbnail(
                        'medium_large',
                        ['class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-110']
                      ); ?>
                    <?php else : ?>
                      <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                        No Image
                      </div>
                    <?php endif; ?>
                  </a>

                  <?php if ( $product->get_price_html() ) : ?>
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md text-slate-900 text-sm font-black px-4 py-2 rounded-2xl shadow-sm">
                      <?php echo $product->get_price_html(); ?>
                    </div>
                  <?php endif; ?>
                </div>

                <div class="p-8 flex flex-col flex-grow">
                  <h2 class="text-xl font-black text-slate-900 mb-4 line-clamp-2 group-hover:text-orange-600 transition-colors">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h2>

                  <div class="mt-auto pt-6 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-slate-500 text-xs font-bold uppercase tracking-widest flex items-center">
                      <svg class="w-4 h-4 mr-2 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.813a1 1 0 00-.788 0l-7 3a1 1 0 000 1.848l7 3a1 1 0 00.788 0l7-3a1 1 0 000-1.848l-7-3zM14 11.5v3.58a1 1 0 01-.553.894l-3 1.5a1 1 0 01-.894 0l-3-1.5A1 1 0 016 15.08V11.5l4 2 4-2z"/>
                      </svg>
                      Self-Paced
                    </span>

                    <a href="<?php the_permalink(); ?>" class="text-orange-600 font-black text-sm uppercase tracking-wider group-hover:translate-x-1 transition-transform">
                      View Details →
                    </a>
                  </div>
                </div>

              </li>

            <?php endwhile; ?>

          </ul>

          <!-- Pagination -->
          <div class="mt-16 flex justify-center">
            <?php woocommerce_pagination(); ?>
          </div>

        <?php else : ?>

          <div class="py-20 text-center bg-slate-50 rounded-[3rem] border-2 border-dashed border-slate-200">
            <?php do_action( 'woocommerce_no_products_found' ); ?>
          </div>

        <?php endif; ?>

      </section>

    </div>

  </main>
</div>

<?php
// REQUIRED: WooCommerce wrapper END
do_action( 'woocommerce_after_main_content' );

get_template_part( 'template-parts/footer' );
