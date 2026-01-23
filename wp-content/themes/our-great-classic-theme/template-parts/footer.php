<body class="flex flex-col min-h-screen">
    <!-- Flex column layout so footer can stay at the bottom even on small pages -->

    <main class="flex-grow">
        <!-- Main content goes here
             flex-grow pushes the footer down if the page content is small -->
    </main>

    <footer class="bg-[#0B4B7F] text-slate-300 pt-12 pb-10 md:pt-20 font-['Plus_Jakarta_Sans'] w-full mt-auto">
        <!-- Footer section
             mt-auto makes sure it sticks to the bottom when needed -->

        <div class="container mx-auto px-6 max-w-7xl">
            <!-- Centers the footer content and keeps it from getting too wide -->

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 md:gap-12 mb-16">
                <!-- Responsive grid:
                     1 column on mobile
                     2 on tablet
                     4 on desktop -->

                <!-- Brand + description -->
                <div class="space-y-6">
                    <a href="/" class="text-3xl font-extrabold text-white tracking-tight block">
                        NightLife<span class="text-blue-400">.</span>
                        <!-- Logo text, dot is styled separately for branding -->
                    </a>

                    <p class="text-sm font-medium leading-relaxed text-blue-100/80 max-w-xs">
                        Empowering the Worcester community through professional excellence and lifelong learning. Your gateway to career growth.
                    </p>

                    <!-- Social media icons -->
                    <div class="flex space-x-3 pt-2">
                        <!-- Facebook icon -->
                       <a href="#" class="group w-10 h-10 bg-white/10 hover:bg-white rounded-xl flex items-center justify-center transition-all duration-300">
                            <span class="sr-only">Facebook</span>

                            <!-- Facebook icon -->
                            <svg class="w-5 h-5 text-white group-hover:text-blue-600 transition-colors"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path d="M22.675 0h-21.35C.597 0 0 .597 0 1.326v21.348C0 23.403.597 24 1.326 24h11.495v-9.294H9.691V11.01h3.13V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.796.715-1.796 1.763v2.314h3.587l-.467 3.696h-3.12V24h6.116C23.403 24 24 23.403 24 22.674V1.326C24 .597 23.403 0 22.675 0z"/>
                            </svg>
                        </a>


                        <!-- Twitter Icon -->
                        <a href="#" class="group w-10 h-10 bg-white/10 hover:bg-white rounded-xl flex items-center justify-center transition-all duration-300">
                            <span class="sr-only">Twitter</span>

                            <svg class="w-5 h-5 text-white group-hover:text-black transition-colors"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                aria-hidden="true">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24h-6.658l-5.214-6.817-5.96 6.817H1.686l7.73-8.835L1.25 2.25h6.827l4.713 6.231 5.454-6.231zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77z"/>
                            </svg>
                        </a>


                        <!-- Instagram Icon -->
                        <a href="#" class="group w-10 h-10 bg-white/10 hover:bg-white rounded-xl flex items-center justify-center transition-all duration-300">
                            <span class="sr-only">Instagram</span>

                               <svg class="w-6 h-6 text-white group-hover:text-pink-500 transition-colors"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true">
                                <path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2c1.65 0 3 1.35 3 3v10c0 1.65-1.35 3-3 3H7c-1.65 0-3-1.35-3-3V7c0-1.65 1.35-3 3-3h10zm-5 3a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.5-.75a1.25 1.25 0 11-2.5 0 1.25 1.25 0 012.5 0z"/>
                                
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Navigation links -->
                <div class="lg:ml-10">
                    <h3 class="text-sm font-bold uppercase tracking-widest text-white mb-6 md:mb-7">
                        Navigation
                    </h3>

                    <ul class="space-y-4 font-medium">
                        <!-- all link has a small animated bar when you hover -->
                        <li>
                            <a href="/" class="text-blue-100/70 hover:text-white transition-colors duration-200 flex items-center group">
                                <span class="w-0 group-hover:w-2 h-0.5 bg-blue-400 mr-0 group-hover:mr-2 transition-all"></span>
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo get_permalink(get_page_by_path('calendar')); ?>" class="text-blue-100/70 hover:text-white transition-colors duration-200 flex items-center group">
                                <span class="w-0 group-hover:w-2 h-0.5 bg-blue-400 mr-0 group-hover:mr-2 transition-all"></span>
                                Calendar
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo get_permalink(get_page_by_path('teach')); ?>" class="text-blue-100/70 hover:text-white transition-colors duration-200 flex items-center group">
                                <span class="w-0 group-hover:w-2 h-0.5 bg-blue-400 mr-0 group-hover:mr-2 transition-all"></span>
                                Teach For Us
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo get_permalink(get_page_by_path('contact-us')); ?>" class="text-blue-100/70 hover:text-white transition-colors duration-200 flex items-center group">
                                <span class="w-0 group-hover:w-2 h-0.5 bg-blue-400 mr-0 group-hover:mr-2 transition-all"></span>
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Resource links -->
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-widest text-white mb-6 md:mb-7">
                        Resources
                    </h3>

                    <ul class="space-y-4 font-medium">
                        <li>
                            <a href="/" class="text-blue-100/70 hover:text-white transition-colors duration-200 flex items-center group">
                                <span class="w-0 group-hover:w-2 h-0.5 bg-blue-400 mr-0 group-hover:mr-2 transition-all"></span>
                                Student Portal
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo get_permalink(get_page_by_path('calendar')); ?>" class="text-blue-100/70 hover:text-white transition-colors duration-200 flex items-center group">
                                <span class="w-0 group-hover:w-2 h-0.5 bg-blue-400 mr-0 group-hover:mr-2 transition-all"></span>
                                Registration Info
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact info -->
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-widest text-white mb-6 md:mb-7">
                        Get in Touch
                    </h3>

                    <div class="space-y-4 font-medium">
                        <a href="mailto:sewardr@worcesterschools.net" class="flex items-start group break-all">
                            <span class="text-blue-100/70 group-hover:text-white transition-colors">
                                sewardr@worcesterschools.net
                            </span>
                        </a>

                        <!-- Phone numbers -->
                        <div class="space-y-2 text-blue-100/70">
                            <p>Office: 508-751-7612</p>
                            <p>Cell: 774-437-2788</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom bar -->
            <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-6 text-[10px] md:text-xs font-semibold uppercase tracking-widest text-blue-200/50 text-center md:text-left">
                <p>&copy; 2026 NightLife. All rights reserved.</p>

                <p class="flex items-center justify-center">
                    Built for <span class="text-white ml-2">Worcester Public Schools</span>
                </p>
            </div>
        </div>
    </footer>
</body>
