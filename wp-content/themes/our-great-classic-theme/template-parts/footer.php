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
                            <!-- sr-only keeps it accessible without showing text -->
                        </a>

                        <!-- Twitter Icon -->
                        <a href="#" class="group w-10 h-10 bg-white/10 hover:bg-white rounded-xl flex items-center justify-center transition-all duration-300">
                            <span class="sr-only">Twitter</span>
                        </a>

                        <!-- Instagram Icon -->
                        <a href="#" class="group w-10 h-10 bg-white/10 hover:bg-white rounded-xl flex items-center justify-center transition-all duration-300">
                            <span class="sr-only">Instagram</span>
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
