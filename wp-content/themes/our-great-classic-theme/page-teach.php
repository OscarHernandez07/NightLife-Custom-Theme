<?php
/**
 * Template Name: Teach For Us
 */

get_template_part('template-parts/header');
?>
<!--Hero of this page -->
<section class="pt-28 lg:pt-28 bg-white relative overflow-hidden pb-10">
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
        <div class="max-w-3xl">
            <!-- Title of th page -->
            <span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4 mt-4 block">Join Our Faculty</span>
            <h1 class="text-5xl md:text-6xl font-black tracking-tight text-slate-900 mb-6">
                Share Your Knowledge <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-400">Inspire the Future</span>
            </h1>
            <!-- Description -->
            <p class="text-xl text-stone-900 leading-relaxed max-w-2xl">
                Become a part of our teaching community. We are looking for passionate professionals ready to shape the next generation of experts.
            </p>
        </div>
    </div>
</section>

<!-- Second section -->
<div class="bg-[#f8f9fa] py-20 relative">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20">

            <div class="lg:col-span-7 flex flex-col gap-16">

            <!-- This calls the certain content from the page -->
                <div class="prose prose-lg prose-slate max-w-none prose-headings:font-black prose-headings:text-slate-900 prose-a:text-orange-600">
                    <?php 
                    while ( have_posts() ) : the_post(); 
                        the_content(); 
                    endwhile; 
                    ?>
                </div>

                <!-- Text on how to become an instructor -->
                <div id="process">
                    <h3 class="text-3xl font-black text-slate-900 mb-8">How to become an instructor</h3>
                    <div class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent">
                        
                        <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-orange-600 text-white shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10">
                                <span class="font-bold text-sm">1</span>
                            </div>
                            <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                                <h4 class="font-bold text-slate-900">Propose a Topic</h4>
                                <p class="text-slate-600 text-sm mt-2">Send us a brief email with your course idea. It doesn't need to be fully fleshed out yet!</p>
                            </div>
                        </div>

                        <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-orange-600 text-white shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10">
                                <span class="font-bold text-sm">2</span>
                            </div>
                            <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                                <h4 class="font-bold text-slate-900">Chat with Ruth</h4>
                                <p class="text-slate-600 text-sm mt-2">A quick phone call to discuss scheduling, pricing, and curriculum needs.</p>
                            </div>
                        </div>

                         <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-orange-600 text-white shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10">
                                <span class="font-bold text-sm">3</span>
                            </div>
                            <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                                <h4 class="font-bold text-slate-900">Schedule Your Class</h4>
                                <p class="text-slate-600 text-sm mt-2">We handle the marketing and registration. You just show up and teach.</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div> 
            <!-- Propose a class and has Ruth Seward information -->
            <div class="lg:col-span-5 h-fit space-y-8" id="apply">
                
                <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden relative">
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-orange-600 to-orange-400"></div>
                    
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-black text-slate-900">Propose a Class</h2>
                            <span class="flex h-3 w-3 relative">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                            </span>
                        </div>
                        
                        <p class="text-slate-500 text-sm mb-8">Ready to start? Contact our coordinator directly to get the ball rolling.</p>

                        <div class="flex items-center gap-4 mb-8 p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <div class="w-14 h-14 rounded-full bg-white flex items-center justify-center text-slate-400 text-lg font-bold border border-slate-200 shadow-sm">
                                RS
                            </div>
                            <div>
                                <p class="font-bold text-lg text-slate-900 leading-none">Ruth Seward</p>
                                <p class="text-xs text-orange-600 font-bold uppercase tracking-wide mt-1">Program Director</p>
                            </div>
                        </div>

                        <ul class="space-y-4">
                            <li class="flex items-center p-3 hover:bg-slate-50 rounded-lg transition-colors">
                                <div class="w-8 h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center shrink-0 mr-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                </div>
                                <a href="mailto:sewardr@worcesterschools.net" class="text-slate-900 font-medium text-sm hover:text-orange-600 transition truncate">
                                    sewardr@worcesterschools.net
                                </a>
                            </li>
                            <li class="flex items-center p-3 hover:bg-slate-50 rounded-lg transition-colors">
                                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center shrink-0 mr-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                                </div>
                                <div class="text-sm">
                                    <span class="block text-slate-900 font-medium">508–751–7612</span>
                                </div>
                            </li>
                        </ul>
                        
                        <div class="mt-8">
                            <a href="mailto:sewardr@worcesterschools.net" class="inline-flex items-center justify-center bg-orange-600 text-white font-bold text-lg px-6 py-3 sm:px-10 md:px-16 lg:px-28 rounded-xl transition-all duration-300 ease-out hover:bg-orange-500 hover:shadow-[0_0_30px_rgba(234,88,12,0.6)] hover:-translate-y-1">
                                Email Ruth Now 
                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Common questions that some people may have -->
                <div class="bg-white rounded-[2rem] p-8 border border-slate-200">
                    <h3 class="text-xl font-black text-slate-900 mb-6">Common Questions</h3>
                    <div class="space-y-4">
                        <details class="group [&_summary::-webkit-details-marker]:hidden">
                            <summary class="flex justify-between items-center font-bold cursor-pointer list-none text-slate-900 hover:text-orange-600 transition-colors">
                                <span>Do I need a teaching license?</span>
                                <span class="transition group-open:rotate-180">
                                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                                </span>
                            </summary>
                            <div class="text-slate-600 mt-3 text-sm leading-relaxed border-t border-slate-100 pt-3">
                                Not at all! We are looking for experts in their field. Your passion and experience are your qualifications.
                            </div>
                        </details>
                        
                        <details class="group [&_summary::-webkit-details-marker]:hidden">
                            <summary class="flex justify-between items-center font-bold cursor-pointer list-none text-slate-900 hover:text-orange-600 transition-colors">
                                <span>How are instructors paid?</span>
                                <span class="transition group-open:rotate-180">
                                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                                </span>
                            </summary>
                            <div class="text-slate-600 mt-3 text-sm leading-relaxed border-t border-slate-100 pt-3">
                                Instructors are paid a competitive hourly rate based on the class type and duration. Contact Ruth for specific rates.
                            </div>
                        </details>

                        <details class="group [&_summary::-webkit-details-marker]:hidden">
                            <summary class="flex justify-between items-center font-bold cursor-pointer list-none text-slate-900 hover:text-orange-600 transition-colors">
                                <span>What if I've never taught?</span>
                                <span class="transition group-open:rotate-180">
                                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                                </span>
                            </summary>
                            <div class="text-slate-600 mt-3 text-sm leading-relaxed border-t border-slate-100 pt-3">
                                That's okay! We help with curriculum planning and classroom management tips to ensure you feel confident.
                            </div>
                        </details>
                    </div>
                </div>

            </div> 
            </div> 
            <!-- Section on why teach with us -->
        <div class="mt-24 pt-24 border-t border-slate-200">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h3 class="text-4xl font-black text-slate-900 mb-4">Why teach with us?</h3>
                <p class="text-slate-600 text-lg">Join a community dedicated to growth, flexibility, and making a real impact in Worcester.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="group bg-white p-8 rounded-3xl border border-slate-200 hover:border-orange-200 hover:shadow-2xl hover:shadow-orange-500/10 transition-all duration-500">
                    <div class="w-14 h-14 bg-red-50 rounded-2xl flex items-center justify-center text-red-600 mb-6 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                    </div>
                    <h4 class="font-bold text-xl text-slate-900 mb-3">Community Impact</h4>
                    <p class="text-slate-600 text-sm leading-relaxed">Directly influence local students and build a stronger Worcester through your expertise.</p>
                </div>

                <div class="group bg-white p-8 rounded-3xl border border-slate-200 hover:border-orange-200 hover:shadow-2xl hover:shadow-orange-500/10 transition-all duration-500">
                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mb-6 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h4 class="font-bold text-xl text-slate-900 mb-3">Flexible Schedule</h4>
                    <p class="text-slate-600 text-sm leading-relaxed">Teach evenings, or online. We work around your existing professional life.</p>
                </div>

                <div class="group bg-white p-8 rounded-3xl border border-slate-200 hover:border-orange-200 hover:shadow-2xl hover:shadow-orange-500/10 transition-all duration-500">
                    <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center text-green-600 mb-6 group-hover:scale-110 group-hover:bg-green-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h4 class="font-bold text-xl text-slate-900 mb-3">Earn Extra Income</h4>
                    <p class="text-slate-600 text-sm leading-relaxed">Receive competitive compensation for your time, preparation, and expert knowledge.</p>
                </div>

                <div class="group bg-white p-8 rounded-3xl border border-slate-200 hover:border-orange-200 hover:shadow-2xl hover:shadow-orange-500/10 transition-all duration-500">
                    <div class="w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 mb-6 group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" /></svg>
                    </div>
                    <h4 class="font-bold text-xl text-slate-900 mb-3">Expand Your Reach</h4>
                    <p class="text-slate-600 text-sm leading-relaxed">Network with other industry professionals and market your skills to a wider audience.</p>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Footer -->
<?php get_template_part('template-parts/footer'); ?>