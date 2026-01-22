<?php get_template_part('template-parts/header'); ?>

<main id="primary" class="site-main min-h-screen bg-gray-50 py-12">

    <div class="max-w-5xl mx-auto px-6">

        <?php if ( have_posts() ) : ?>

            <!-- Page Header -->
            <header class="mb-10">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900">
                    <?php
                        printf(
                            esc_html__( 'Search Results for: %s', 'nightlife' ),
                            '<span class="text-blue-600">' . get_search_query() . '</span>'
                        );
                    ?>
                </h1>

                <p class="mt-2 text-gray-500 text-sm">
                    Showing results that match your search query.
                </p>
            </header>

            <!-- Results List -->
            <div class="space-y-8">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>

                    <article class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                        <?php get_template_part( 'template-parts/content', 'search' ); ?>
                    </article>

                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                <?php the_posts_navigation([
                    'prev_text' => __('← Previous', 'nightlife'),
                    'next_text' => __('Next →', 'nightlife'),
                ]); ?>
            </div>

        <?php else : ?>

            <!-- No Results -->
            <div class="text-center py-20 bg-white border border-gray-200 rounded-xl shadow-sm">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">No results found</h2>
                <p class="text-gray-500 mb-6">
                    We couldn’t find anything matching your search. Try a different keyword.
                </p>

                <form role="search" method="get" class="max-w-md mx-auto flex" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input
                        type="search"
                        name="s"
                        class="flex-grow border border-gray-300 rounded-l-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Search again..."
                    >
                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-5 rounded-r-lg hover:bg-blue-700 transition"
                    >
                        Search
                    </button>
                </form>
            </div>

        <?php endif; ?>

    </div>

</main>

<?php get_template_part('template-parts/footer'); ?>
