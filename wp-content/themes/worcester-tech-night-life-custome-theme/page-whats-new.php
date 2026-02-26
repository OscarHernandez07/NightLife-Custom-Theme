
<!-- ======== PAGE NOT IN USE ======== -->


<!-- <?php
/* Template Name: News & Updates (Editorial)
*/
get_template_part('template-parts/header');
?>





<main class="bg-[#F9FAFB] min-h-screen font-sans antialiased">
    <header class="pt-24 pb-16 border-b border-gray-200 bg-white">
        <div class="max-w-5xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
                <div class="max-w-2xl">
                    <nav class="flex items-center space-x-2 text-blue-600 font-bold text-xs uppercase tracking-widest mb-4">
                        <span>Journal</span>
                        <span class="text-gray-300">/</span>
                        <span class="text-gray-500">Updates</span>
                    </nav>
                    <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 tracking-tight">
                        News & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-500">Insights.</span>
                    </h1>
                </div>
                <p class="text-slate-500 text-lg leading-relaxed max-w-sm">
                    The latest stories, technical breakdowns, and company milestones from our team.
                </p>
            </div>
        </div>
    </header>

    <div class="max-w-5xl mx-auto px-6 py-20">
        <div class="space-y-12">

            <?php
            $news_posts = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => 10,
                'orderby'        => 'date',
                'order'          => 'DESC'
            ]);

            if ($news_posts->have_posts()) :
                while ($news_posts->have_posts()) : $news_posts->the_post();
            ?>

                <article class="group relative grid md:grid-cols-4 gap-8 items-start">
                    <div class="md:col-span-1 pt-2">
                        <time class="text-slate-400 font-medium text-sm block mb-1">
                            <?php echo get_the_date('F j, Y'); ?>
                        </time>
                        <div class="h-px w-8 bg-blue-500 transition-all duration-500 group-hover:w-full"></div>
                    </div>

                    <div class="md:col-span-3">
                        <?php 
                        $categories = get_the_category();
                        if (!empty($categories)) : ?>
                            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-600 mb-3 block">
                                <?php echo esc_html($categories[0]->name); ?>
                            </span>
                        <?php endif; ?>

                        <h2 class="text-3xl font-bold text-slate-900 mb-4 group-hover:text-blue-600 transition-colors duration-300">
                            <a href="<?php the_permalink(); ?>" class="after:absolute after:inset-0">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <p class="text-slate-600 text-lg leading-relaxed mb-6 line-clamp-2">
                            <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?>
                        </p>

                        <div class="flex items-center text-sm font-bold text-slate-900 uppercase tracking-wider group-hover:translate-x-2 transition-transform duration-300">
                            Read Entry
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </div>
                    </div>
                    
                    <div class="hidden md:block absolute -bottom-6 left-0 right-0 h-px bg-gray-100"></div>
                </article>

            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="text-center py-20">
                    <p class="text-slate-400 italic">No announcements currently available.</p>
                </div>
            <?php endif; ?>

        </div>

        <section class="mt-32 p-1 bg-gradient-to-br from-slate-900 to-slate-800 rounded-3xl overflow-hidden shadow-2xl">
            <div class="bg-slate-900/50 backdrop-blur-xl p-10 md:p-16 rounded-[22px] flex flex-col md:flex-row items-center justify-between gap-10">
                <div class="max-w-md text-center md:text-left">
                    <h3 class="text-3xl font-bold text-white mb-4">Stay in the loop.</h3>
                    <p class="text-slate-400">Get our monthly digest of news, updates, and helpful resources delivered to your inbox.</p>
                </div>
                <div class="w-full md:w-auto">
                    <a href="/contact" class="inline-block w-full sm:w-auto px-10 py-5 bg-white text-slate-900 font-bold rounded-2xl hover:bg-blue-50 transition-all text-center">
                        Contact Support
                    </a>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_template_part('template-parts/footer'); ?> -->
