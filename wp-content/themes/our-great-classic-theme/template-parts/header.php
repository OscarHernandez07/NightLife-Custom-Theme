<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
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
    
    <?php wp_head(); ?>
    <style>
        /* This removes the white gap caused by the WP Admin Bar */
        html { margin-top: 0 !important; }
        * { margin: 0; padding: 0; box-sizing: border-box; }

        /* Solid Mobile Menu */
        #mobile-menu {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background-color: #0B4B7F !important;
        }

        #mobile-menu.menu-open {
            max-height: 100vh;
            opacity: 1;
            padding: 2rem 1.5rem 3rem 1.5rem;
        }

        /* DESKTOP MENU STYLING
           Fixes: Added positioning context and active state support 
        */
        @media (min-width: 1024px) {
            /* 1. Force the link to be the positioning context */
            #navbar-main ul li a {
                position: relative; 
                display: inline-block; /* Ensures width matches text */
            }

            /* 2. Define the underline */
            #navbar-main ul li a::after {
                content: '';
                position: absolute;
                width: 0;
                height: 2px;
                bottom: -4px;
                left: 0;
                background-color: #fb923c; /* Orange-400 */
                transition: width 0.3s ease;
            }

            /* 3. Handle Hover AND Active States (WordPress Standard Classes) */
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

<nav id="main-nav" class="bg-[#0B4B7F] fixed top-0 w-full z-50 py-5 shadow-[0_10px_30px_rgba(0,0,0,0.2)]">
    <div class="max-w-7xl flex items-center justify-between mx-auto px-6 lg:px-8">

        <a href="<?php echo home_url(); ?>" class="flex items-center space-x-3 shrink-0">
            <span class="text-2xl font-extrabold tracking-tighter text-white">
                NightLife
            </span>
        </a>

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

        <div class="flex items-center space-x-4">


            <form action="/" method="get" class="relative hidden md:block">
                <input type="text" name="s" placeholder="Search courses..." 
                       class="bg-white/10 border border-white/20 text-white text-sm rounded-full py-2 px-5 pl-10 w-48 lg:w-64 focus:w-72 focus:bg-white focus:text-slate-900 focus:outline-none transition-all duration-300 placeholder:text-white/40">
                <svg class="w-4 h-4 absolute left-3.5 top-2.5 text-white/40" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M21 21l-4.35-4.35M19 11a8 8 0 11-16 0 8 8 0 0116 0z"/></svg>
            </form>
            
            <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="bg-orange-600 hover:bg-orange-500 text-white text-[12px] font-extrabold uppercase tracking-widest px-6 py-2.5 rounded-full transition-all active:scale-95 shrink-0">
                Courses
            </a>

            <?php 
            $cart_count = WC()->cart->get_cart_contents_count(); 
            $cart_url   = wc_get_cart_url();
            ?>

            <a href="<?php echo $cart_url; ?>" 
            class="relative flex items-center justify-center text-white hover:text-orange-300 transition lg:mr-2">

                <!-- Cart Icon -->
                <svg class="w-7 h-7 md:w-6 md:h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m12-9l2 9M10 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z"/>
                </svg>

                <!-- Count Badge -->
                <?php if ( $cart_count > 0 ) : ?>
                    <span class="absolute -top-2 -right-2 bg-orange-500 text-white text-[10px] md:text-xs font-bold px-1.5 py-0.5 rounded-full leading-none">
                        <?php echo $cart_count; ?>
                    </span>
                <?php endif; ?>
            </a>


            <button id="menu-toggle" class="lg:hidden text-white p-2">
                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path id="menu-icon" d="M4 6h16M4 12h16M4 18h16" /></svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="absolute top-full left-0 w-full lg:hidden border-t border-white/10 shadow-2xl">
        
        <div class="mb-8 md:hidden">
            <form action="/" method="get" class="relative">
                <input type="text" name="s" placeholder="Search courses..." 
                       class="w-full bg-white/10 border border-white/20 text-white rounded-xl py-3 px-5 pl-12 focus:outline-none focus:bg-white/20 transition-all placeholder:text-white/40">
                <svg class="w-5 h-5 absolute left-4 top-3.5 text-white/40" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M21 21l-4.35-4.35M19 11a8 8 0 11-16 0 8 8 0 0116 0z"/></svg>
            </form>
        </div>

        <ul class="flex flex-col space-y-5 text-lg font-bold text-white/90">
            <?php wp_nav_menu(["theme_location" => "primary_menu", "container" => false, "items_wrap" => '%3$s']); ?>
        </ul>

        <div class="mt-10 pt-6 border-t border-white/10">
            <p class="text-white/40 text-[11px] uppercase tracking-[0.2em] font-black">Ready to learn?</p>
            <a href="<?php echo get_permalink(wc_get_page_id('shop') );?>" class="inline-block mt-3 text-orange-400 font-extrabold text-lg group">
                Explore our courses <span class="inline-block transition-transform group-hover:translate-x-1">→</span>
            </a>
        </div>
    </div>
</nav>


<script>
    // Removed scroll listener logic completely to stop resizing.
    
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');

    // Handle Mobile Menu Toggle
    menuToggle.addEventListener('click', () => {
        const isOpen = mobileMenu.classList.toggle('menu-open');
        // Switch between Burger and X icon
        menuIcon.setAttribute('d', isOpen ? 'M6 18L18 6M6 6l12 12' : 'M4 6h16M4 12h16M4 18h16');
    });
</script>