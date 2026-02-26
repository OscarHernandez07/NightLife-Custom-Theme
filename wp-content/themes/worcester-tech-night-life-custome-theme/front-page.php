<!-- Calls the header and hero -->
<?php get_template_part('template-parts/header'); ?>
<!-- Hero -->
<?php get_template_part('template-parts/hero'); ?>

<!-- This is the courses section in the front page, the first thing the user should see after scrollong down from the hero
 are our most popular courses, there's 4 of them and also a button that allows to check all of them -->
<section class="py-24 bg-[#e9ecef] relative overflow-hidden" id="our-courses">
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div class="max-w-2xl">
                <span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-3 block">Top Rated Programs</span>
                <h2 class="text-4xl md:text-5xl font-black tracking-tight text-slate-900">
                    <!-- Big text to attract the user -->
                    Explore Our Most<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-400">Popular Courses</span>
                </h2>
            </div>
            <!-- This link takes them to see all of the courses -->
            <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="inline-flex w-fit text-slate-900 font-bold border-b-2 border-orange-500 pb-1 hover:text-orange-600 transition-colors">
                View All Courses &rarr;
            </a>
        </div>

         <!-- This div displays the 4 courses in the front page-->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            // PHP: Fetch custom 4 products calling them with ID
            $args = array(
                'post_type'      => 'product',
                'post_status'    => 'publish',
                'posts_per_page'  => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
                'tax_query'      => array(
                    array(
                    'taxonomy'   => 'product_cat',
                    'field'      => 'slug',
                    'terms'      => 'popular-post',
                    ),
                ),     
            );

            

            $courses = new WP_Query($args);
            
            // Checls if the query found any products
            if ($courses->have_posts()) :
                // loops through each product
                while ($courses->have_posts()) : $courses->the_post();
                    // PHP: Get WooCommerce Product Object
                    global $product;
                    // makes sure "$product" is actually a WC_Product
                    if ( ! is_a( $product, 'WC_Product' ) ) {
                        $product = wc_get_product( get_the_id() );
                    }
                    // Gets the product thumbnail image
                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
            ?>

            <!-- Single course card -->
            <div class="group bg-white rounded-3xl border border-slate-200/60 overflow-hidden hover:shadow-[0_20px_50px_rgba(0,0,0,0.05)] transition-all duration-500 flex flex-col h-full">
                
            <!-- the image section -->
                <div class="relative overflow-hidden h-52">
                    <a href="<?php the_permalink(); ?>" class="block h-full">
                        <?php if ($thumbnail) : ?>
                            <!-- the product image -->
                            <img src="<?= esc_url($thumbnail); ?>" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                 alt="<?php the_title(); ?>">
                        <?php else : ?>
                            <!-- fallback if there's no image -->
                            <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400">No Image</div>
                        <?php endif; ?>
                    </a>
                    <!-- This gets the price of the product and displays it at the top making it visible and hard to miss -->
                    <?php if ($product && $product->get_price_html()) : ?>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md text-slate-900 text-sm font-bold px-3 py-1.5 rounded-xl shadow-sm">
                            <?= $product->get_price_html(); ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- The card content -->
                <div class="p-6 flex flex-col flex-grow">
                    <!-- The title of the course -->
                    <h3 class="text-xl font-bold text-slate-900 mb-3 line-clamp-2 group-hover:text-orange-600 transition-colors">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    
                    <!-- The bottom row -->
                    <div class="mt-auto pt-6 border-t border-slate-100 flex items-center justify-between">
                        <!-- The course type -->
                        <span class="text-slate-500 text-sm flex items-center">
                             <svg class="w-4 h-4 mr-1 text-orange-500" fill="currentColor" viewBox="0 0 20 20"><path d="M10.394 2.813a1 1 0 00-.788 0l-7 3a1 1 0 000 1.848l7 3a1 1 0 00.788 0l7-3a1 1 0 000-1.848l-7-3zM14 11.5v3.58a1 1 0 01-.553.894l-3 1.5a1 1 0 01-.894 0l-3-1.5A1 1 0 016 15.08V11.5l4 2 4-2z"/></svg>
                             <div class="text-stone-900">Instructor led in Person</div>
                        </span>
                        <!-- The enrol link -->
                         <!-- This allows the user to enrol in that certain class if the wish to and not look for other classes in the course secion, -->
                        <a href="<?php the_permalink(); ?>" class="text-orange-600 font-bold text-sm uppercase tracking-wider group-hover:translate-x-1 transition-transform">
                            Enroll Now &rarr;
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- end of product loop -->
             <!-- This shows if no products where found -->
            <?php endwhile; wp_reset_postdata(); else : ?>
                <p class="text-center text-slate-500 col-span-full py-20">No courses available at the moment.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- This section contains some information and a big picture, it's veery appealing  -->
<section class="py-24 bg-white">
    <!-- The main container -->
    <div class="max-w-7xl mx-auto px-6">
        <!-- 2 column layout on large screens -->
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Left side - text + features -->
            <div>
                <!-- Section heading -->
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-8 leading-tight">
                    Why Professionals Choose <span class="text-orange-600">Our Trainings</span>
                </h2>
                <!-- feature cards grid -->
                <div class="grid sm:grid-cols-2 gap-8">
                    <!-- feature 1 -->
                    <div class="flex flex-col gap-3">
                        <!-- icon box -->
                        <div class="w-12 h-12 bg-red-100 rounded-2xl flex items-center justify-center text-red-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                        </div>
                        <!-- Importan text that contains information -->
                        <h3 class="font-bold text-lg text-slate-900">Industry Standards</h3>
                        <p class="text-stone-900 text-sm leading-relaxed">Curriculums designed by experts currently working in the field.</p>
                    </div>
                    <div class="flex flex-col gap-3">
                        <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                        </div>
                        <h3 class="font-bold text-lg text-slate-900">State/National Certification</h3>
                        <p class="text-stone-900 text-sm leading-relaxed">Boost your resume with certificates recognized.</p>
                    </div>
                </div>
            </div>
            <!-- Big appealing image -->
            <div class="relative">
                <div class="aspect-square bg-slate-100 rounded-[40px] overflow-hidden relative shadow-2xl">
                     <div class="absolute inset-0 bg-gradient-to-tr from-orange-500/20 to-transparent"></div>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/welding.jpg" alt="Hero Background" class="w-full h-full object-cover object-center"
                    >
                </div>
                <!-- floating stat card -->
                <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-2xl shadow-xl border border-slate-100 hidden md:block">
                    <div class="text-3xl font-black text-green-600">1k+</div>
                    <div class="text-slate-500 font-medium">Attendees</div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="bg-[#6a994e] py-8 md:py-8 text-white">
    <!-- section wrapper + background color -->
    <div class="max-w-7xl mx-auto px-6">

        <!-- section heading -->
        <div class="text-center mb-10 md:mb-20">
            <!-- small label text -->
            <span class="text-yellow-300 font-bold tracking-[0.3em] uppercase text-xs md:text-sm mb-4 block">
                Our Online Training Results
            </span>

            <!-- main title -->
            <h2 class="text-2xl md:text-3xl font-black uppercase tracking-tight">
                By the Numbers
            </h2>
        </div>

        <!-- stats grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-16 gap-x-8 text-center">

            <!-- STAT 1 -->
            <div class="flex flex-col items-center">
                <!-- big number -->
                <span class="text-6xl md:text-6xl font-black tracking-tighter mb-4">
                    800+
                </span>

                <!-- stat label -->
                <p class="text-sm md:text-lg font-bold opacity-80 uppercase tracking-widest leading-tight max-w-[160px]">
                    Courses Included
                </p>
            </div>

            <!-- STAT 2 -->
            <div class="flex flex-col items-center">
                <!-- big number -->
                <span class="text-6xl md:text-6xl font-black tracking-tighter mb-4">
                    14
                </span>

                <!-- stat label -->
                <p class="text-sm md:text-lg font-bold opacity-80 uppercase tracking-widest leading-tight max-w-[200px]">
                    Career Categories
                </p>
            </div>

            <!-- STAT 3 -->
            <div class="flex flex-col items-center">
                <!-- big number -->
                <span class="text-6xl md:text-6xl font-black tracking-tighter mb-4">
                    100%
                </span>

                <!-- stat label -->
                <p class="text-sm md:text-lg font-bold opacity-80 uppercase tracking-widest leading-tight max-w-[200px]">
                    Self Paced Courses
                </p>
            </div>

            <!-- STAT 4 -->
            <div class="flex flex-col items-center">
                <!-- big number -->
                <span class="text-6xl md:text-6xl font-black tracking-tighter mb-4">
                    20+
                </span>

                <!-- stat label -->
                <p class="text-sm md:text-lg font-bold opacity-80 uppercase tracking-widest leading-tight max-w-[180px]">
                    Interactive Instructors
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Reviews section -->
<section class="py-24 bg-[#e9ecef] relative">
    <div class="max-w-7xl mx-auto px-4">

        <div class="text-center max-w-3xl mx-auto mb-16">
            <!-- Title -->
            <span class="text-blue-600 font-bold tracking-widest uppercase text-sm mb-3 block">
                Testimonials
            </span>
            <h2 class="text-4xl font-black text-slate-900 mb-4">
                What Our Students Say
            </h2>
            <!-- Description -->
            <p class="text-stone-900 text-lg">
                Don't just take our word for it. Read reviews from graduates who have transformed their careers.
            </p>
        </div>

        <div class="relative group">

            <div id="review-track" 
                class="flex gap-4 overflow-x-auto py-6 md:py-14 snap-x snap-mandatory scroll-smooth" 
                style="scrollbar-width: none; -ms-overflow-style: none;">
                
                <!-- REVIEW 1 -->
                <div class="min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-3xl shadow-sm border border-slate-100 flex flex-col snap-center relative hover:shadow-lg transition-shadow duration-300">
                    <div class="flex text-orange-400 mb-6">
                        <!-- Stars -->
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <!-- Review from student -->
                    <p class="text-slate-600 text-lg leading-relaxed italic mb-8 relative z-10">
                        "I thought the course was going to be one of the most challenging things I have done. I was wrong, it was fun and not that hard"
                    </p>
                    <div class="mt-auto flex items-center gap-4">
                        <!-- Icon -->
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            E
                        </div>
                        <div>
                            <!-- Name of the student who gave the review -->
                            <h4 class="font-bold text-slate-900 text-base">Electrical Student</h4>
                        </div>
                    </div>
                </div>
                
                <!-- REVIEW 2 -->
                <div class="min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-3xl shadow-sm border border-slate-100 flex flex-col snap-center relative hover:shadow-lg transition-shadow duration-300">
                    <div class="flex text-orange-400 mb-6">
                        <!-- Stars -->
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <!-- Review from student -->
                    <p class="text-slate-600 text-lg leading-relaxed italic mb-8 relative z-10">
                        "Great instructor who is very knowledgeable and always willing to help."
                    </p>
                    <div class="mt-auto flex items-center gap-4">
                        <!-- Icon -->
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            P
                        </div>
                        <div>
                            <!-- Name of student -->
                            <h4 class="font-bold text-slate-900 text-base">Plumbing Student</h4>
                        </div>
                    </div>
                </div>
                
                <!-- REVIEW 3 -->
                <div class="min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-3xl shadow-sm border border-slate-100 flex flex-col snap-center relative hover:shadow-lg transition-shadow duration-300">
                    <div class="flex text-orange-400 mb-6">
                        <!-- Stars -->
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <!-- Review from student -->
                    <p class="text-slate-600 text-lg leading-relaxed italic mb-8 relative z-10">
                        "An incredibly fair and understanding instructor who truly supports students."
                    </p>
                    <div class="mt-auto flex items-center gap-4">
                        <!-- Icon -->
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            W
                        </div>
                        <div>
                            <!-- Name of student -->
                            <h4 class="font-bold text-slate-900 text-base">Welding</h4>
                        </div>
                    </div>
                </div>

                <!-- REVIEW 4 -->
                <div class="min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-3xl shadow-sm border border-slate-100 flex flex-col snap-center relative hover:shadow-lg transition-shadow duration-300">
                    <div class="flex text-orange-400 mb-6">
                        <!-- Stars -->
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <!-- Student review -->
                    <p class="text-slate-600 text-lg leading-relaxed italic mb-8 relative z-10">
                        "My friend and I took this class and had a wonderful time!"
                    </p>
                    <div class="mt-auto flex items-center gap-4">
                        <!-- Icon -->
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            L
                        </div>
                        <div>
                            <!-- Student name -->
                            <h4 class="font-bold text-slate-900 text-base">Laura S</h4>
                        </div>
                    </div>
                </div>

                <!-- REVIEW 5 -->
                <div class="min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-3xl shadow-sm border border-slate-100 flex flex-col snap-center relative hover:shadow-lg transition-shadow duration-300">
                    <div class="flex text-orange-400 mb-6">
                        <!-- Stars -->
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <!-- Student review -->
                    <p class="text-slate-600 text-lg leading-relaxed italic mb-8 relative z-10">
                        "Great platform, great people. The diesel networking opportunities alone were worth the admission price."
                    </p>
                    <div class="mt-auto flex items-center gap-4">
                        <!-- Icon -->
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            M
                        </div>
                        <div>
                            <!-- Student name -->
                            <h4 class="font-bold text-slate-900 text-base">Matthew D</h4>
                        </div>
                    </div>
                </div>
                
                <!-- REVIEW 6 -->
                <div class="min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-3xl shadow-sm border border-slate-100 flex flex-col snap-center relative hover:shadow-lg transition-shadow duration-300">
                    <div class="flex text-orange-400 mb-6">
                        <!-- Stars -->
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <!-- Review from student -->
                    <p class="text-slate-600 text-lg leading-relaxed italic mb-8 relative z-10">
                        "Fun way to work out!"
                    </p>
                    <div class="mt-auto flex items-center gap-4">
                        <!-- Icon -->
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            S
                        </div>
                        <div>
                            <!-- Name of student -->
                            <h4 class="font-bold text-slate-900 text-base">Susan D</h4>
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex justify-center items-center gap-4 mt-8">
                <!-- This button makes it go back -->
                <button id="slide-prev" class="w-14 h-14 rounded-full border border-slate-200 bg-white text-slate-600 hover:bg-orange-600 hover:text-white hover:border-orange-600 hover:-translate-y-1 transition-all flex items-center justify-center shadow-lg" aria-label="Previous Review">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <!-- This button make it go foward -->
                <button id="slide-next" class="w-14 h-14 rounded-full border border-slate-200 bg-white text-slate-600 hover:bg-orange-600 hover:text-white hover:border-orange-600 hover:-translate-y-1 transition-all flex items-center justify-center shadow-lg" aria-label="Next Review">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

            </div>
        </div>
    </div>

    <style>
        #review-track::-webkit-scrollbar { display: none; }
    </style>
</section>

<script>
    // simple scrolling logic
    const track = document.getElementById('review-track');
    const prevBtn = document.getElementById('slide-prev');
    const nextBtn = document.getElementById('slide-next');

    // scroll width (card width + gap)
    // 400px card + 16px gap roughly
    nextBtn.addEventListener('click', () => {
        track.scrollBy({ left: 400, behavior: 'smooth' });
    });

    prevBtn.addEventListener('click', () => {
        track.scrollBy({ left: -400, behavior: 'smooth' });
    });
</script>


<script>
//Buttons so they can click back and forth 
document.addEventListener('DOMContentLoaded', () => {
    const track = document.getElementById('review-track');
    const prevBtn = document.getElementById('slide-prev');
    const nextBtn = document.getElementById('slide-next');

    if (track && prevBtn && nextBtn) {
        
        // Helper to get width of one card + gap
        const getScrollAmount = () => {
            const card = track.querySelector('div');
            // Card width + gap (24px = 1.5rem gap)
            return card ? card.offsetWidth + 24 : 420; 
        };

        // Next Button Logic
        nextBtn.addEventListener('click', () => {
            // Check if we are near the end
            // scrollLeft + clientWidth is roughly the total width scrolled. 
            // If it's close to scrollWidth, we are at the end.
            const remainingScroll = track.scrollWidth - (track.scrollLeft + track.clientWidth);
            
            // Tolerance of 10px for floating point math
            if (remainingScroll < 10) {
                // We are at the end: Loop back to start
                track.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                // Scroll forward normally
                track.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
            }
        });

        // Previous Button Logic
        prevBtn.addEventListener('click', () => {
            // Check if we are at the start
            if (track.scrollLeft <= 0) {
                // We are at the start: Loop to the very end
                track.scrollTo({ left: track.scrollWidth, behavior: 'smooth' });
            } else {
                // Scroll backward normally
                track.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
            }
        });
    }
});
</script>

<!-- Call to action at the bottom of the website -->
<section class="py-4 px-6 pt-12 pb-12 bg-white">
    <div class="max-w-7xl mx-auto rounded-[3rem] p-8 pl-4 overflow-hidden sm:pl-8 relative">
        
        <!-- Info text -->
        <div class="relative z-14 max-w-2xl pl-[6px]">
            <h2 class="text-5xl md:text-6xl font-black text-black mb-6">Start your future <span class="text-orange-500 text-outline">today</span></h2>
            <p class="text-stone-900 text-lg mb-10">Join a community of lifelong learners and get the support you need to reach your career goals.</p>
            <div class="flex flex-wrap gap-4">
                <!-- Buttons -->
                <a href="<?php echo get_permalink(wc_get_page_id('shop'));?>" class="group inline-flex items-center justify-center bg-orange-600 text-white font-bold text-lg px-6 py-4 rounded-xl hover:bg-orange-500 hover:shadow-[0_0_30px_rgba(234,88,12,0.6)] hover:-translate-y-1 transition-all duration-300">Get Started</a>
                <a href="<?php echo get_permalink(get_page_by_path('contact-us'));?>" class="group inline-flex items-center justify-center bg-orange-600 text-white font-bold text-lg px-6 py-4 rounded-xl hover:bg-orange-500 hover:shadow-[0_0_30px_rgba(234,88,12,0.6)] hover:-translate-y-1 transition-all duration-300">Contact Us</a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php get_template_part('template-parts/footer'); ?>




<script>
        const nav = document.getElementById('main-nav');
    // The Scrol event listener 
    window.addEventListener('scroll' , () => {
        if (window.scrollY > 50) {
            //This adds the color and the showed when you scroll down
            nav.classList.add('bg-[#0B4B7F]', 'shadow-[0_10px_30px_rgba(0,0,0,0.2)]');
            nav.classList.remove('py-7', 'bg-transparent');
            nav.classList.add('py-3'); 
        }

        else {
            // it reverts it to the transparent at the top
            nav.classList.remove('bg-[#0B4B7F]', 'shadow-[0_10px_30px_rgba(0,0,0,0.2)]', 'py-3');
            nav.classList.add('py-7', 'bg-transparent');
        }
    })
</script>

