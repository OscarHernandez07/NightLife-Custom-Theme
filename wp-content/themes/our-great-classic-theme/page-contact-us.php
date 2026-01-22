<?php 
/* Template Name: Contact Page */
get_template_part('template-parts/header'); 
?>

<section class="pt-20 lg:pt-28 bg-white relative overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4 mt-4 block">Get In Touch</span>
            <h1 class="text-5xl md:text-7xl font-black tracking-tight text-slate-900 mb-6">
                Contact Our Team <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-400">We’re Here to Help</span>
            </h1>
            <p class="text-xl text-slate-600 leading-relaxed max-w-2xl">
                Have questions or want to learn more about our programs? Reach out to us and our team will get back to you as soon as possible.
            </p>
        </div>
    </div>
</section>

<div class="bg-slate-50 py-12 md:py-20">
    <div class="max-w-4xl mx-auto px-4 md:px-6">
        <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-slate-200/60 p-8 md:p-16 border border-slate-200">
            
            <div class="mb-10">
                <h2 class="text-2xl font-bold text-slate-900 mb-2">Send us a Message</h2>
                <div class="h-1 w-[220px] bg-orange-500 rounded-full"></div>
            </div>

            <div class="modern-form-wrapper">
                <?php echo do_shortcode('[form id="19789"]'); ?>
            </div>

        </div>
    </div>
</div>


<style>
    /* Styling the form inside the PHP call */
    .modern-form-wrapper input, 
    .modern-form-wrapper textarea, 
    .modern-form-wrapper select {
        width: 100% !important;
        padding: 1rem 1.25rem !important;
        border-radius: 0.75rem !important;
        border: 1px solid #e2e8f0 !important;
        margin-bottom: 1.25rem !important;
        font-family: inherit;
        transition: all 0.2s ease;
    }

    .modern-form-wrapper input:focus, 
    .modern-form-wrapper textarea:focus {
        outline: none !important;
        border-color: #ea580c !important; /* Orange Focus */
        box-shadow: 0 0 0 4px rgba(234, 88, 12, 0.1) !important;
    }

    .modern-form-wrapper button[type="submit"],
    .modern-form-wrapper input[type="submit"] {
        background-color: #ea580c !important; /* Orange Button */
        color: white !important;
        font-weight: 800 !important;
        padding: 1rem 2.5rem !important;
        border-radius: 5rem !important;
        cursor: pointer !important;
        transition: transform 0.2s ease, background 0.2s ease !important;
        border: none !important;
        text-transform: uppercase !important;
        letter-spacing: 0.05em !important;
    }

    .modern-form-wrapper button[type="submit"]:hover {
        background-color: #c2410c !important;
        transform: translateY(-2px);
    }
</style>

<?php get_template_part('template-parts/footer'); ?>