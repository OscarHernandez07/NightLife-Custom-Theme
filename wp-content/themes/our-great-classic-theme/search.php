<?php
/**
 * Search results template
 *
 * @package NightLife
 */

get_template_part('template-parts/header');
?>

<main class="max-w-7xl mx-auto px-6 lg:px-8 pt-32 pb-20">

    <?php if ( have_posts() ) : ?>

        <!-- Page title -->
        <header class="mb-10">
            <h1 class="text-3xl font-extrabold text-slate-900">
                Search results for:
                <span class="text-orange-600">
                    "<?php echo esc_html( get_search_query() ); ?>"
                </span>
            </h1>
        </header>

        <!-- Results grid -->
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            <?php while ( have_posts() ) : the_post(); ?>

                <article class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition">

                    <!-- Product thumbnail -->
                    <?php if ( 'product' === get_post_type() && has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" class="block">
                            <?php the_post_thumbnail(
                                'medium',
                                ['class' => 'w-full h-48 object-cover']
                            ); ?>
                        </a>
                    <?php endif; ?>

                    <div class="p-6">

                        <!-- Title -->
                        <h2 class="text-xl font-bold mb-2">
                            <a href="<?php the_permalink(); ?>" class="hover:text-orange-600 transition">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <!-- Product price -->
                        <?php if ( 'product' === get_post_type() ) :
                            $product = wc_get_product( get_the_ID() );
                            if ( $product ) : ?>
                                <p class="text-orange-600 font-extrabold mb-2">
                                    <?php echo $product->get_price_html(); ?>
                                </p>
                        <?php endif; endif; ?>

                        <!-- Excerpt -->
                        <p class="text-slate-600 text-sm mb-4">
                            <?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
                        </p>

                        <!-- Link -->
                        <a href="<?php the_permalink(); ?>"
                           class="inline-block text-orange-600 font-bold text-sm uppercase tracking-wider">
                            View →
                        </a>

                    </div>

                </article>

            <?php endwhile; ?>

        </div>

        <!-- Pagination -->
        <div class="mt-12">
            <?php the_posts_navigation(); ?>
        </div>

    <?php else : ?>

        <!-- No results -->
        <div class="text-center bg-white p-10 pt-10 rounded-xl shadow">
            <h2 class="text-2xl font-bold mb-3">No results found</h2>
            <p class="text-slate-600 mb-6">Try a different search.</p>

            <form action="<?php echo esc_url( home_url('/') ); ?>" method="get"
                  class="max-w-md mx-auto flex gap-2">
                <input type="search" name="s"
                       class="flex-1 border border-slate-300 rounded-xl px-4 py-3"
                       placeholder="Search again">
                <button class="bg-orange-600 text-white px-6 py-3 rounded-xl font-bold">
                    Search
                </button>
            </form>
        </div>

    <?php endif; ?>

</main>

<?php get_template_part('template-parts/footer'); ?>
