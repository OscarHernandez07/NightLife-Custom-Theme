<?php get_template_part('template-parts/header'); ?>
<?php get_template_part('template-parts/hero'); ?>


<section class="py-24 bg-[#e9ecef] relative overflow-hidden" id="our-courses">
    
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-orange-100/40 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-blue-100/40 blur-[120px] rounded-full"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div class="max-w-2xl">
                <span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-3 block">Top Rated Programs</span>
                <h2 class="text-4xl md:text-5xl font-black tracking-tight text-slate-900">
                    Master New Skills with <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-400">Our Expert Courses</span>
                </h2>
            </div>
            <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="text-slate-900 font-bold border-b-2 border-orange-500 pb-1 hover:text-orange-600 transition-colors">
                View All Courses &rarr;
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            // PHP: Fetch latest 8 products
            $args = array(
                'post_type'      => 'product',
                'post__in'       => array(15329, 19618, 19604, 8444), // <-- your product IDs
                'orderby'        => 'post__in', // keeps your chosen order
                'posts_per_page' => -1,
            );

            $courses = new WP_Query($args);

            if ($courses->have_posts()) :
                while ($courses->have_posts()) : $courses->the_post();
                    // PHP: Get WooCommerce Product Object
                    global $product;
                    if ( ! is_a( $product, 'WC_Product' ) ) {
                        $product = wc_get_product( get_the_id() );
                    }
                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
            ?>

            <div class="group bg-white rounded-3xl border border-slate-200/60 overflow-hidden hover:shadow-[0_20px_50px_rgba(0,0,0,0.05)] transition-all duration-500 flex flex-col h-full">
                <div class="relative overflow-hidden h-52">
                    <a href="<?php the_permalink(); ?>" class="block h-full">
                        <?php if ($thumbnail) : ?>
                            <img src="<?= esc_url($thumbnail); ?>" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                 alt="<?php the_title(); ?>">
                        <?php else : ?>
                            <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400">No Image</div>
                        <?php endif; ?>
                    </a>
                    <?php if ($product && $product->get_price_html()) : ?>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md text-slate-900 text-sm font-bold px-3 py-1.5 rounded-xl shadow-sm">
                            <?= $product->get_price_html(); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold text-slate-900 mb-3 line-clamp-2 group-hover:text-orange-600 transition-colors">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    
                    <div class="mt-auto pt-6 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-slate-500 text-sm flex items-center">
                             <svg class="w-4 h-4 mr-1 text-orange-500" fill="currentColor" viewBox="0 0 20 20"><path d="M10.394 2.813a1 1 0 00-.788 0l-7 3a1 1 0 000 1.848l7 3a1 1 0 00.788 0l7-3a1 1 0 000-1.848l-7-3zM14 11.5v3.58a1 1 0 01-.553.894l-3 1.5a1 1 0 01-.894 0l-3-1.5A1 1 0 016 15.08V11.5l4 2 4-2z"/></svg>
                             <div class="text-stone-900">Self-Paced</div>
                        </span>
                        <a href="<?php the_permalink(); ?>" class="text-orange-600 font-bold text-sm uppercase tracking-wider group-hover:translate-x-1 transition-transform">
                            Enroll Now &rarr;
                        </a>
                    </div>
                </div>
            </div>

            <?php endwhile; wp_reset_postdata(); else : ?>
                <p class="text-center text-slate-500 col-span-full py-20">No courses available at the moment.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            
            <div>
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-8 leading-tight">
                    Why Professionals Choose <span class="text-orange-600">Our Academy</span>
                </h2>
                <div class="grid sm:grid-cols-2 gap-8">
                    <div class="flex flex-col gap-3">
                        <div class="w-12 h-12 bg-red-100 rounded-2xl flex items-center justify-center text-red-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                        </div>
                        <h3 class="font-bold text-lg text-slate-900">Industry Standards</h3>
                        <p class="text-stone-900 text-sm leading-relaxed">Curriculums designed by experts currently working in the field.</p>
                    </div>
                    <div class="flex flex-col gap-3">
                        <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                        </div>
                        <h3 class="font-bold text-lg text-slate-900">Global Certification</h3>
                        <p class="text-stone-900 text-sm leading-relaxed">Boost your resume with certificates recognized worldwide.</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="aspect-square bg-slate-100 rounded-[40px] overflow-hidden relative shadow-2xl">
                     <div class="absolute inset-0 bg-gradient-to-tr from-orange-500/20 to-transparent"></div>
                     <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover" alt="Student working">
                </div>
                <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-2xl shadow-xl border border-slate-100 hidden md:block">
                    <div class="text-3xl font-black text-green-600">15k+</div>
                    <div class="text-slate-500 font-medium">Graduates Worldwide</div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="bg-[#6a994e] py-8 md:py-8 text-white">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="text-center mb-10 md:mb-20">
            <span class="text-yellow-300 font-bold tracking-[0.3em] uppercase text-xs md:text-sm mb-4 block">Our Proven Results</span>
            <h2 class="text-2xl md:text-3xl font-black uppercase tracking-tight">By the Numbers</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-16 gap-x-8 text-center">
            
            <div class="flex flex-col items-center">
                <span class="text-6xl md:text-6xl font-black tracking-tighter mb-4">15k+</span>
                <p class="text-sm md:text-lg font-bold opacity-80 uppercase tracking-widest leading-tight max-w-[160px]">
                    Graduates Worldwide
                </p>
            </div>

            <div class="flex flex-col items-center">
                <span class="text-6xl md:text-6xl font-black tracking-tighter mb-4">42%</span>
                <p class="text-sm md:text-lg font-bold opacity-80 uppercase tracking-widest leading-tight max-w-[200px]">
                    Average Salary Increase
                </p>
            </div>

            <div class="flex flex-col items-center">
                <span class="text-6xl md:text-6xl font-black tracking-tighter mb-4">250+</span>
                <p class="text-sm md:text-lg font-bold opacity-80 uppercase tracking-widest leading-tight max-w-[200px]">
                    Global Hiring Partners
                </p>
            </div>

            <div class="flex flex-col items-center">
                <span class="text-6xl md:text-6xl font-black tracking-tighter mb-4">120</span>
                <p class="text-sm md:text-lg font-bold opacity-80 uppercase tracking-widest leading-tight max-w-[180px]">
                    Industry Expert Mentors
                </p>
            </div>

        </div>
    </div>
</section>

<?php
$reviews = [
    ['name' => 'Sarah Jenkins', 'role' => 'UX Designer', 'text' => 'The certification program completely transformed my career path. The instructors were incredibly knowledgeable and supportive.', 'stars' => 5],
    ['name' => 'Michael Chen', 'role' => 'Software Engineer', 'text' => 'I have taken many online courses, but the depth of material here is unmatched. Highly recommended for professionals.', 'stars' => 5],
    ['name' => 'Elena Rodriguez', 'role' => 'Project Manager', 'text' => 'Flexible learning schedules allowed me to study while working full-time. The community support was a huge bonus.', 'stars' => 4],
    ['name' => 'David Kim', 'role' => 'Data Analyst', 'text' => 'Practical, hands-on assignments made the difference. I built a portfolio that actually got me hired.', 'stars' => 5],
    ['name' => 'Jessica Maples', 'role' => 'Marketing Lead', 'text' => 'The modern curriculum covers tools that are actually used in the industry today. Worth every penny.', 'stars' => 5],
    ['name' => 'Robert Fox', 'role' => 'Freelancer', 'text' => 'Great platform, great people. The networking opportunities alone were worth the admission price.', 'stars' => 4],
    ['name' => 'Amanda Lowery', 'role' => 'Web Developer', 'text' => 'From zero coding knowledge to a junior developer role in 6 months. This academy made it possible.', 'stars' => 5],
];
?>

<section class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-blue-600 font-bold tracking-widest uppercase text-sm mb-3 block">Testimonials</span>
            <h2 class="text-4xl font-black text-slate-900 mb-4">What Our Students Say</h2>
            <p class="text-stone-900 text-lg">Don't just take our word for it. Read reviews from graduates who have transformed their careers.</p>
        </div>

        <div class="relative group">
            
            <div id="review-track" 
                class="flex gap-4 overflow-x-auto py-6 md:py-14 snap-x snap-mandatory scroll-smooth" 
                style="scrollbar-width: none; -ms-overflow-style: none;">

                
                <?php foreach ($reviews as $index => $review) : ?>
                <div class="min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-3xl shadow-sm border border-slate-100 flex flex-col snap-center relative hover:shadow-lg transition-shadow duration-300">


                    <div class="flex text-orange-400 mb-6">
                        <?php for($i=0; $i<5; $i++): ?>
                            <?php if($i < $review['stars']): ?>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <?php else: ?>
                                <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>

                    <p class="text-slate-600 text-lg leading-relaxed italic mb-8 relative z-10">"<?php echo $review['text']; ?>"</p>

                    <div class="mt-auto flex items-center gap-4">
                        <!-- Pictures for the reviews -->
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            <?php echo substr($review['name'], 0, 1); ?>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-base"><?php echo $review['name']; ?></h4>
                            <span class="text-sm text-slate-500"><?php echo $review['role']; ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>

            <div class="flex justify-center items-center gap-4 mt-8">
                <button id="slide-prev" class="w-14 h-14 rounded-full border border-slate-200 bg-white text-slate-600 hover:bg-orange-600 hover:text-white hover:border-orange-600 hover:-translate-y-1 transition-all flex items-center justify-center shadow-lg" aria-label="Previous Review">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                </button>
                <button id="slide-next" class="w-14 h-14 rounded-full border border-slate-200 bg-white text-slate-600 hover:bg-orange-600 hover:text-white hover:border-orange-600 hover:-translate-y-1 transition-all flex items-center justify-center shadow-lg" aria-label="Next Review">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                </button>
            </div>

        </div>
    </div>
    
    <style>
        #review-track::-webkit-scrollbar { display: none; }
    </style>
</section>

<script>
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

<section class="py-12 px-6 bg-[#e9ecef]">
    <div class="max-w-7xl mx-auto rounded-[3rem] p-12 md:p-20 overflow-hidden relative">
        <div class="absolute top-0 right-0 w-1/2 h-full"></div>
        
        <div class="relative z-14 max-w-2xl pl-[6px]">
            <h2 class="text-5xl md:text-6xl font-black text-black mb-6">Start your future <span class="text-orange-500 text-outline">today</span></h2>
            <p class="text-stone-900 text-lg mb-10">Join a community of lifelong learners and get the support you need to reach your career goals.</p>
            <div class="flex flex-wrap gap-4">
                <a href="/courses" class="bg-orange-600 hover:bg-orange-500 text-white px-8 py-4 rounded-full font-bold transition-all shadow-lg shadow-orange-600/20">Get Started Now</a>
                <a href="/contact" class="bg-orange-600 hover:bg-orange-500 text-white backdrop-blur-md px-8 py-4 rounded-full font-bold transition-all">Contact Us</a>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/footer'); ?>


