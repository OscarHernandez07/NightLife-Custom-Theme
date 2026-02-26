<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * WordPress automatically loads this file when a page
 * cannot be found (broken URL, deleted page, wrong link, etc).
 *
 * This version:
 * - Uses Tailwind CSS for styling
 * - Shows a search bar
 * - Provides navigation options
 */


// Loads your custom header from template-parts/header.php
get_template_part('template-parts/header');
?>


<!--
Main 404 section
- min-h makes it take most of screen height
- flex centers everything vertically + horizontally
- text-center centers text
-->
<section class="min-h-[70vh] flex flex-col items-center justify-center px-6 py-32 text-center bg-slate-50">
   
    <!-- Sad face icon at the top -->
    <div class="mb-8 text-orange-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>


    <!-- Big 404 error number -->
    <h1 class="text-7xl font-black text-slate-900 tracking-tight">404</h1>


    <!-- Main message -->
    <h2 class="mt-4 text-2xl font-bold text-slate-800">
        Oops! We can't find that page.
    </h2>


    <!-- Explanation text -->
    <p class="mt-2 text-slate-600 max-w-md mx-auto">
        It looks like the link is broken or the page has been moved. Try searching for what you need below.
    </p>


   <!--
   Search box container
   - max width so it doesn't stretch too wide
   - group enables focus styling for children
   -->
   <div class="mt-10 w-full max-w-md mx-auto group">


    <!--
    Search form
    - method="get" sends search query in URL
    - action sends request to site homepage search handler
    -->
    <form role="search" method="get" class="relative" action="<?php echo esc_url( home_url( '/' ) ); ?>">
       
        <!-- Accessibility label (hidden visually) -->
        <label for="search-404" class="sr-only">Search the site</label>


        <!-- Search icon inside input -->
        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
            <svg class="w-5 h-5 text-slate-400 group-focus-within:text-orange-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>


        <!--
        Search input field
        name="s" → WordPress requires this for search queries
        get_search_query() keeps previous search text
        -->
        <input type="search"
               id="search-404"
               class="block w-full p-4 pl-12 pr-28 text-sm text-slate-900 border border-slate-200 rounded-2xl bg-white
                      focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 outline-none transition-all shadow-sm hover:shadow-md"
               placeholder="What are you looking for?"
               value="<?php echo get_search_query(); ?>"
               name="s" />


        <!-- Search button -->
        <button type="submit"
                class="absolute right-2 top-2 bottom-2 px-5 bg-orange-600 hover:bg-orange-700 text-white font-bold rounded-xl text-xs uppercase tracking-wider transition-colors">
            Search
        </button>
       
    </form>
   
</div>


    <!-- Navigation buttons Helps user recover from error -->
    <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">


        <!-- Takes user back to homepage -->
        <a href="<?php echo home_url(); ?>"
           class="px-8 py-3 bg-orange-600 hover:bg-orange-700 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg shadow-orange-200">
           Return Home
        </a>
       
        <!-- Goes back to previous page in browser history -->
        <button onclick="window.history.back()"
                class="px-8 py-3 bg-white border border-slate-200 text-slate-700 font-semibold rounded-xl hover:bg-slate-50 transition-all">
           Go Back
        </button>
    </div>


</section>


<?php
// Loads your custom footer from template-parts/footer.php
get_template_part('template-parts/footer');
?>
