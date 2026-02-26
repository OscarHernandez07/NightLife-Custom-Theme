<?php
/**
 * Template Name: FAQs & Policies Layout (No Search)
 */

get_template_part('template-parts/header');

// Get the specific page
$page = get_page_by_path('faqs');
$page_id = $page ? $page->ID : 0;
?>


<main class="bg-white min-h-screen">

    <?php if ($page): ?>
    <!-- Main div -->
  <section class="pt-28 lg:pt-28 bg-white relative overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
        <div class="max-w-3xl">
            <!-- Page title -->
            <span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4 mt-4 block">FAQs & Policies</span>
            <h1 class="text-5xl md:text-6xl font-black tracking-tight text-slate-900 mb-6">
                Everything You Need to Know <br>
                <!-- Page description -->
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-400">Guidelines & Answers</span>
            </h1>
            <p class="text-xl text-stone-900 leading-relaxed max-w-2xl">
                Find answers to common questions and review our policies to make the most of our programs. Everything you need to know is right here.
            </p>
        </div>
    </div>
</section>

        <!-- Secondary section where the content goes -->
    <section class="max-w-7xl mx-auto px-6 py-12 bg-white">
        <div class="flex flex-col lg:flex-row gap-12">

            <aside class="hidden lg:block">
                <div class="sticky top-10">
                    <!-- Header of this section -->
                    <h3 class="uppercase tracking-wider text-stone-900 text-xs font-bold mb-4">Table of Contents</h3>
                    <nav id="sidebar-nav" class="space-y-1 border-l-2 border-gray-100">
                        </nav>
                </div>
            </aside>

            <div class="lg:w-3/4">
                <div id="faq-content-area" class="prose prose-lg prose-blue max-w-none text-stone-900">
                    <?php 
                    // Calls the content from that specific page and displays it
                        echo apply_filters('the_content', $page->post_content); 
                    ?>
                </div>
            </div>

        </div>
    </section>

    <!-- else statement if there's no content found then a message will pop up saying that the page was not found -->
    <?php else: ?>
        <section class="max-w-4xl mx-auto px-6 py-20 text-center">
            <h2 class="text-2xl font-bold text-gray-900">Page not found</h2>
            <p class="text-gray-600 mt-2">Please ensure you have created a page with the slug "faqs".</p>
        </section>
    <?php endif; ?>

</main>

<!-- Calls the footer -->
<?php get_template_part('template-parts/footer'); ?>