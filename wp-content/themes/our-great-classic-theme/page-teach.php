<?php
/**
 * Template Name: Teach For Us
 */

get_template_part('template-parts/header');
?>

<section class="pt-20 lg:pt-28 bg-white relative overflow-hidden pb-10">
   
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4 mt-4 block">Join Our Faculty</span>
            <h1 class="text-5xl md:text-6xl font-black tracking-tight text-slate-900 mb-6">
                Share Your Knowledge <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-400">Inspire the Future</span>
            </h1>
            <p class="text-xl text-stone-900 leading-relaxed max-w-2xl">
                Become a part of our teaching community. We are looking for passionate professionals ready to shape the next generation of experts.
            </p>
        </div>
    </div>
</section>

<div class="bg-[#e9ecef] py-20 relative">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20">

            <div class="lg:col-span-7 flex flex-col gap-12">

                <div class="prose prose-lg prose-slate max-w-none prose-headings:font-black prose-headings:text-slate-900 prose-a:text-orange-600 hover:prose-a:text-orange-500">
                    <?php 
                    while ( have_posts() ) : the_post(); 
                        the_content(); 
                    endwhile; 
                    ?>
                </div>

                <div class="pt-8 border-t border-slate-100">
                    <h3 class="text-3xl font-black text-slate-900 mb-8">Why teach with us?</h3>

                    <div class="grid sm:grid-cols-2 gap-6">
                        <div class="group bg-white p-8 rounded-3xl border border-slate-200 hover:shadow-[0_20px_50px_rgba(0,0,0,0.05)] transition-all duration-300 hover:-translate-y-1">
                            <div class="w-14 h-14 bg-red-50 rounded-2xl flex items-center justify-center text-red-600 mb-6 group-hover:bg-red-600 group-hover:text-white transition-colors">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                            </div>
                            <h4 class="font-bold text-xl text-slate-900 mb-3">Community Impact</h4>
                            <p class="text-stone-600 leading-relaxed">
                                Directly influence the lives of local students and help build a stronger Worcester community through education.
                            </p>
                        </div>

                        <div class="group bg-white p-8 rounded-3xl border border-slate-200 hover:shadow-[0_20px_50px_rgba(0,0,0,0.05)] transition-all duration-300 hover:-translate-y-1">
                            <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                            <h4 class="font-bold text-xl text-slate-900 mb-3">Flexible Schedule</h4>
                            <p class="text-stone-600 leading-relaxed">
                                We offer various time slots for workshops to fit your professional life. Teach evenings, weekends, or online.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="lg:col-span-5">
                <div class="sticky top-8 space-y-8">

                    <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden relative">
                        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-orange-600 to-orange-400"></div>
                        
                        <div class="p-8 md:p-10">
                            <h2 class="text-2xl font-black text-slate-900 mb-2">Propose a Class</h2>
                            <p class="text-slate-500 mb-8">Ready to start? Contact our coordinator directly.</p>

                            <div class="flex items-center gap-5 mb-8 pb-8 border-b border-slate-100">
                                <div class="w-16 h-16 rounded-2xl bg-slate-100 flex items-center justify-center text-slate-400 text-xl font-bold border border-slate-200">
                                    <span class="text-2xl">RS</span>
                                </div>
                                <div>
                                    <p class="font-bold text-xl text-slate-900">Ruth Seward</p>
                                    <p class="text-sm text-orange-600 font-bold uppercase tracking-wide">Program Coordinator</p>
                                </div>
                            </div>

                            <ul class="space-y-6">
                                <li class="flex items-start group">
                                    <div class="w-10 h-10 rounded-full bg-red-50 text-red-600 flex items-center justify-center shrink-0 mr-4 group-hover:bg-red-600 group-hover:text-white transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                    </div>
                                    <div>
                                        <span class="text-xs font-bold text-slate-400 uppercase tracking-wide block mb-1">Email</span>
                                        <a href="mailto:sewardr@worcesterschools.net" class="text-slate-900 font-medium hover:text-orange-600 transition break-all">
                                            sewardr@worcesterschools.net
                                        </a>
                                    </div>
                                </li>

                                <li class="flex items-start group">
                                    <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mr-4 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                                    </div>
                                    <div>
                                        <span class="text-xs font-bold text-slate-400 uppercase tracking-wide block mb-1">Phone / Cell</span>
                                        <span class="block text-slate-900 font-medium">508–751–7612 (Office)</span>
                                        <span class="block text-slate-900 font-medium">774–437–2788 (Cell)</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-slate-50 p-6 border-t border-slate-100 text-center">
                            <a href="mailto:sewardr@worcesterschools.net" class="block w-full bg-green-600 text-white font-bold py-4 rounded-xl hover:bg-green-500 transition-all shadow-lg hover:shadow-orange-600/20">
                                Email Ruth Now &rarr;
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl p-8 border border-slate-200/60">
                        <h3 class="font-bold text-lg text-slate-900 mb-2">Have a quick question?</h3>
                        <p class="text-stone-600 text-sm leading-relaxed mb-0">
                            Don't hesitate to call or text the cell number listed above. We are happy to answer any questions about the curriculum or schedule.
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<section class="py-12 px-6 bg-white">
    <div class="max-w-7xl mx-auto rounded-[3rem] p-12 md:p-20 overflow-hidden relative">
        <div class="absolute top-0 right-0 w-1/2 h-full"></div>
        
        <div class="relative z-14 max-w-2xl pl-[6px]">
            <h2 class="text-5xl md:text-6xl font-black text-black mb-6">Ready to <span class="text-orange-500 text-outline">start?</span></h2>
            <p class="text-stone-900 text-lg mb-10">Whether you're an experienced instructor or trying teaching for the first time, our team is here to support you every step of the way. </p>
            <div class="flex flex-wrap gap-4">
                <a href="<?php echo get_permalink( get_page_by_path('contact-us')) ; ?>" class="bg-orange-600 hover:bg-orange-500 text-white px-8 py-4 rounded-full font-bold transition-all shadow-lg shadow-orange-600/20">Contact Us</a>
                <a href="<?php echo get_permalink( wc_get_page_id('shop')); ?>" class="bg-orange-600 hover:bg-orange-500 text-white backdrop-blur-md px-8 py-4 rounded-full font-bold transition-all">Browse Current Courses</a>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/footer'); ?>