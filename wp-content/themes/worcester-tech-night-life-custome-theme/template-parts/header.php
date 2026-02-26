<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Site character encoding -->
    <meta charset="<?php bloginfo('charset'); ?>">
    
    <!-- Responsive scaling for mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Google Fonts preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Plus Jakarta Sans font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind custom configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <!-- Required WordPress head hook (plugins, styles, scripts) -->
    <?php wp_head(); ?>

    <style>
        /* Remove default WP admin bar spacing */
        html { margin-top: 0 !important; }

        /* Reset default margins and box sizing */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        /* Mobile menu hidden state */
        #mobile-menu {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background-color: #0B4B7F !important;
        }

        /* Mobile menu open state */
        #mobile-menu.menu-open {
            max-height: 100vh;
            opacity: 1;
            padding: 2rem 1.5rem 3rem 1.5rem;
        }

        /* Desktop menu underline animation */
        @media (min-width: 1024px) {
            #navbar-main ul li a {
                position: relative;
                display: inline-block;
            }

            #navbar-main ul li a::after {
                content: '';
                position: absolute;
                width: 0;
                height: 2px;
                bottom: -4px;
                left: 0;
                background-color: #fb923c;
                transition: width 0.3s ease;
            }

            /* Hover and active menu states */
            #navbar-main ul li a:hover::after,
            #navbar-main ul li.current-menu-item > a::after,
            #navbar-main ul li.current_page_item > a::after,
            #navbar-main ul li.current-menu-ancestor > a::after {
                width: 100%;
            }
        }
    </style>
</head>

<body <?php body_class("bg-gray-50 antialiased font-sans"); ?>>

<!-- Main navigation bar -->
<nav id="main-nav" class="fixed top-0 w-full z-50 py-5 <?php echo is_front_page() ? "bg-transparent" : "bg-[#0B4B7F]"; ?> transition-all duration-300">

    <div class="max-w-7xl flex items-center justify-between mx-auto px-6 lg:px-8">

        <!-- Logo / Home link -->
        <a href="<?php echo home_url(); ?>" class="flex items-center space-x-3 shrink-0">
            <span class="text-2xl font-extrabold tracking-tighter text-white">
                NightLife
            </span>
        </a>

        <!-- Desktop navigation menu -->
        <div class="hidden lg:flex items-center space-x-10" id="navbar-main">
            <ul class="flex space-x-8 text-[13px] font-bold tracking-widest uppercase text-white/90">
                <?php wp_nav_menu([
                    "theme_location" => "primary_menu",
                    "container" => false,
                    "items_wrap" => '%3$s',
                    "fallback_cb" => false,
                ]); ?>
            </ul>
        </div>

        <!-- Right-side actions -->
        <div class="flex items-center space-x-4">

            <!-- SEAR BAR -->
            <!-- Desktop search form -->
            <form action="<?php echo esc_url( home_url('/')); ?>" method="get" class="relative hidden md:block">
                <input type="search" name="s" placeholder="Search courses..."
                       class="bg-white/10 border border-white/20 text-white text-sm rounded-full py-2 px-5 pl-10 w-48 lg:w-64 focus:w-72 focus:bg-white focus:text-slate-900 focus:outline-none transition-all duration-300 placeholder:text-white/40">
                <svg class="w-4 h-4 absolute left-3.5 top-2.5 text-white/40" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                    <path d="M21 21l-4.35-4.35M19 11a8 8 0 11-16 0 8 8 0 0116 0z"/>
                </svg>
            </form>

            <!-- Courses CTA -->
            <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="bg-orange-600 hover:bg-orange-500 text-white text-[12px] font-extrabold uppercase tracking-widest px-6 py-2.5 rounded-xl transition-all active:scale-95 shrink-0">
                Courses
            </a>

            <?php 
            /* WooCommerce cart data */
            $cart_count = WC()->cart->get_cart_contents_count();
            $cart_url   = wc_get_cart_url();
            ?>

            <!-- Cart icon with item count -->
            <a href="<?php echo $cart_url; ?>" class="relative flex items-center justify-center text-white hover:text-orange-300 transition lg:mr-2">
                <svg class="w-7 h-7 md:w-6 md:h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m12-9l2 9M10 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z"/>
                </svg>

                <?php if ($cart_count > 0) : ?>
                    <span class="absolute -top-2 -right-2 bg-orange-500 text-white text-[10px] md:text-xs font-bold px-1.5 py-0.5 rounded-full leading-none">
                        <?php echo $cart_count; ?>
                    </span>
                <?php endif; ?>
            </a>

            <!-- Mobile menu toggle button -->
            <button id="menu-toggle" class="lg:hidden text-white p-2">
                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path id="menu-icon" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile navigation menu -->
    <div id="mobile-menu" class="absolute top-full left-0 w-full lg:hidden border-t border-white/10 shadow-2xl">

        <!-- Mobile search BAR-->
        <div class="mb-8 md:hidden">
            <form action="<?php esc_url( home_url('/')); ?>" method="get" class="relative">
                <input type="text" name="s" placeholder="Search courses..."
                       class="w-full bg-white/10 border border-white/20 text-white rounded-xl py-3 px-5 pl-12 focus:outline-none focus:bg-white/20 transition-all placeholder:text-white/40">
                <svg class="w-5 h-5 absolute left-4 top-3.5 text-white/40" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                    <path d="M21 21l-4.35-4.35M19 11a8 8 0 11-16 0 8 8 0 0116 0z"/>
                </svg>
            </form>
        </div>

        <!-- Mobile menu links -->
        <ul class="flex flex-col space-y-5 text-lg font-bold text-white/90">
            <?php wp_nav_menu(["theme_location" => "primary_menu", "container" => false, "items_wrap" => '%3$s']); ?>
        </ul>

        <!-- Mobile CTA -->
        <div class="mt-10 pt-6 border-t border-white/10">
            <p class="text-white/40 text-[11px] uppercase tracking-[0.2em] font-black">Ready to learn?</p>
            <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="inline-block mt-3 text-orange-400 font-extrabold text-lg group">
                Explore our courses <span class="inline-block transition-transform group-hover:translate-x-1">→</span>
            </a>
        </div>
    </div>
</nav>

<!-- Mobile menu toggle script -->
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const mainNav = document.getElementById('main-nav')

    // Toggle mobile menu open/close
    menuToggle.addEventListener('click', () => {
        // Is open controls the x icon on Mobile  devices
        const isOpen = mobileMenu.classList.toggle('menu-open');

        // Switch hamburger icon to X
        menuIcon.setAttribute(
            'd',
            isOpen
                ? 'M6 18L18 6M6 6l12 12'
                : 'M4 6h16M4 12h16M4 18h16'
        );
    });

    

    

</script>
