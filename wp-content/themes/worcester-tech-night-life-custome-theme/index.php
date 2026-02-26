<?php
/**
 * The main template file.
 * This is the fallback template in WordPress.
 * It is used for blog posts, archives, search results, etc.
 */

// Load the header from template-parts/header.php
get_template_part('template-parts/header'); 
?>

<!-- =========================
     HERO / PAGE INTRO SECTION
========================= -->
<section class="pt-20 lg:pt-28 bg-white relative overflow-hidden pb-10">
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
        <div class="max-w-3xl">

            <!-- Small label above the heading -->
            <span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4 mt-4 block">
                Our Journal
            </span>

            <!-- Main dynamic heading -->
            <h1 class="text-5xl md:text-6xl font-black tracking-tight text-slate-900 mb-6">
                <?php
                    /*
                     * Show different titles depending on the page:
                     *
                     * - If it's the blog page (but NOT the homepage),
                     *   show the blog page title.
                     *
                     * - If it's a search page, show:
                     *   Search Results "search term"
                     *
                     * - Otherwise, show default:
                     *   Latest Updates
                     */

                    if ( is_home() && ! is_front_page() ) {

                        // Show blog page title safely
                        echo esc_html( single_post_title( '', false ) );

                    } elseif ( is_search() ) {

                        // Show search results with gradient styling
                        echo 'Search Results <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-400">"' 
                            . esc_html( get_search_query() ) . 
                            '"</span>';

                    } else {

                        // Default heading
                        echo 'Latest <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-400">Updates</span>';
                    }
                ?>
            </h1>

            <!-- Subtitle under the heading -->
            <p class="text-xl text-stone-900 leading-relaxed max-w-2xl">
                Explore our latest thoughts, news, and insights.
            </p>
        </div>
    </div>
</section>


<!-- =========================
     POSTS GRID SECTION
========================= -->
<div class="bg-[#e9ecef] py-20 relative">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <?php if ( have_posts() ) : ?>
           
            <!-- Grid layout for posts -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
               
                <?php 
                // Start The Loop (WordPress main post loop)
                while ( have_posts() ) : 
                    the_post(); 
                ?>
                   
                    <!-- Individual Post Card -->
                    <article 
                        id="post-<?php the_ID(); ?>" 
                        <?php 
                        // Adds WordPress default post classes + custom styling
                        post_class('group bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-sm hover:shadow-[0_20px_50px_rgba(0,0,0,0.05)] transition-all duration-300 hover:-translate-y-1 flex flex-col'); 
                        ?>
                    >
                       
                        <!-- Featured Image Section -->
                        <a 
                            href="<?php echo esc_url( get_permalink() ); ?>" 
                            class="block overflow-hidden bg-slate-200 aspect-video"
                            aria-hidden="true" 
                            tabindex="-1"
                        >

                            <?php if ( has_post_thumbnail() ) : ?>

                                <!-- Display post featured image -->
                                <?php 
                                the_post_thumbnail(
                                    'medium_large', 
                                    ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500']
                                ); 
                                ?>

                            <?php else : ?>

                                <!-- Fallback SVG if no featured image -->
                                <div class="w-full h-full flex items-center justify-center text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>

                            <?php endif; ?>
                        </a>


                        <!-- Post Content -->
                        <div class="p-8 flex-grow flex flex-col">

                            <!-- Post Meta (Date + Category) -->
                            <div class="flex items-center gap-3 text-xs font-bold uppercase tracking-widest text-orange-600 mb-3">
                                <span><?php echo esc_html( get_the_date() ); ?></span>

                                <!-- Small dot separator -->
                                <span class="w-1 h-1 bg-slate-300 rounded-full"></span>

                                <!-- Post Categories -->
                                <span><?php the_category(', '); ?></span>
                            </div>


                            <!-- Post Title -->
                            <h2 class="text-2xl font-bold text-slate-900 group-hover:text-orange-600 transition-colors mb-4">
                                <a href="<?php echo esc_url( get_permalink() ); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>


                            <!-- Post Excerpt (short preview text) -->
                            <div class="text-stone-600 line-clamp-3 mb-6 leading-relaxed">
                                <?php the_excerpt(); ?>
                            </div>


                            <!-- Read More Link -->
                            <div class="mt-auto">
                                <a 
                                    href="<?php echo esc_url( get_permalink() ); ?>" 
                                    class="inline-flex items-center text-sm font-bold text-slate-900 group-hover:text-orange-600 transition-colors"
                                    aria-label="<?php 
                                        echo esc_attr(
                                            sprintf(
                                                __( 'Continue reading %s', 'your-text-domain' ),
                                                the_title_attribute( 'echo=0' )
                                            )
                                        ); 
                                    ?>"
                                >
                                    Read Article

                                    <!-- Arrow icon -->
                                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </article>

                <?php endwhile; ?>
            </div>


            <!-- =========================
                 PAGINATION SECTION
            ========================= -->
            <div class="mt-16 pt-10 border-t border-slate-300 flex justify-center">
                <?php
                    // WordPress pagination
                    the_posts_pagination( array(
                        'mid_size'  => 2,              // How many page numbers to show around current
                        'prev_text' => '&larr; Previous',
                        'next_text' => 'Next &rarr;',
                        'class'     => 'pagination-custom'
                    ) );
                ?>
            </div>


        <?php else : ?>
           
            <!-- =========================
                 NO POSTS FOUND
            ========================= -->
            <div class="text-center py-20 bg-white rounded-[2.5rem] border border-slate-200 shadow-sm max-w-3xl mx-auto">
                <h3 class="text-2xl font-black text-slate-900 mb-2">
                    No posts found
                </h3>

                <p class="text-stone-600 text-lg mb-8">
                    Try searching for something else or return to the home page.
                </p>

                <!-- Search form -->
                <div class="max-w-md mx-auto">
                    <?php get_search_form(); ?>
                </div>
            </div>

        <?php endif; ?>

    </div>
</div>


<?php 
// Load the footer from template-parts/footer.php
get_template_part('template-parts/footer'); 
?>