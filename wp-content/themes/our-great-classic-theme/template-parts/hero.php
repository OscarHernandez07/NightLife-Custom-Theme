<section class="relative w-full h-screen min-h-[600px] flex items-center overflow-hidden bg-slate-950" id="hero-main">

    <div class="absolute inset-0 z-0">
        <img 
            src="<?php echo get_template_directory_uri(); ?>/assets/img/wths.jpeg" 
            alt="Hero Background" 
            class="w-full h-full object-cover object-center animate-ken-burns transform-gpu"
        >
        
        <div class="absolute inset-0 bg-slate-950/60"></div>
       
        
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 mix-blend-overlay"></div>
    </div>

    <div class="container relative z-10 mx-auto px-6 h-full flex flex-col justify-center items-center text-center">
        
        <div class="max-w-4xl space-y-8 animate-fade-in-up mx-auto">
            
            <div class="inline-flex items-center space-x-2 bg-white/5 backdrop-blur-md border border-white/10 px-4 py-1.5 rounded-full text-sm font-medium text-orange-400 shadow-sm hover:bg-white/10 transition-colors cursor-default">
                <span class="relative flex h-2 w-2">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
                </span>
                <span class="tracking-wide">Now Enrolling for <?php echo date('Y'); ?></span>
            </div>

            <header>
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold tracking-tight text-white leading-[1.1] drop-shadow-lg">
                    Welcome to <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-amber-300">
                        <?php bloginfo('name'); ?>
                    </span>
                </h1>
                
                <h2 class="text-lg md:text-2xl text-slate-200 mt-6 max-w-2xl mx-auto leading-relaxed drop-shadow-md font-light">
                    <?php bloginfo('description'); ?>
                </h2>
            </header>

            <?php $page = get_page_by_path('updates'); if ($page) : ?>
                <div class="mt-8 p-4 md:p-6 rounded-2xl bg-white/10 backdrop-blur-md border-l-4 border-orange-500 shadow-xl max-w-2xl mx-auto text-left hover:bg-white/15 transition-all duration-300">
                    <h3 class="text-xs uppercase tracking-widest text-orange-300 font-bold mb-2 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-orange-500 animate-pulse"></span>
                        Latest News
                    </h3>
                    <div class="text-base md:text-lg text-white font-medium italic">
                        <?php echo apply_filters('the_content', $page->post_content); ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="flex flex-col sm:flex-row gap-4 pt-6 justify-center">
                <a href="<?php echo get_permalink( wc_get_page_id( 'shop') ); ?>" 
                   class="group inline-flex items-center justify-center bg-orange-600 text-white font-bold text-lg px-10 py-4 rounded-xl shadow-[0_0_20px_rgba(234,88,12,0.5)] hover:bg-orange-500 hover:shadow-[0_0_30px_rgba(234,88,12,0.6)] hover:-translate-y-1 transition-all duration-300">
                    Get Started
                </a>
                
                <a href="<?php echo get_permalink(get_page_by_path('contact-us')); ?>" 
                    class="group inline-flex items-center justify-center bg-orange-600 text-white font-bold text-lg px-10 py-4 rounded-xl shadow-[0_0_20px_rgba(234,88,12,0.5)] hover:bg-orange-500 hover:shadow-[0_0_30px_rgba(234,88,12,0.6)] hover:-translate-y-1 transition-all duration-300">
                    Contact Us
                </a>


            </div>

        </div>
    </div>
</section>

<style>
/* KEN BURNS EFFECT
   If the image is still blurry, change 'scale(1.1)' to 'scale(1.05)' or remove the animation.
*/
@keyframes kenBurns {
    0% { transform: scale(1); }
    100% { transform: scale(1.1); }
}

.animate-ken-burns {
    animation: kenBurns 20s ease-out forwards;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in-up {
    animation: fadeInUp 1s cubic-bezier(0.2, 1, 0.3, 1) forwards;
}

.text-base p {
    display: inline;
    margin: 0;
}
</style>