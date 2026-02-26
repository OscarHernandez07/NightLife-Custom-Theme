<?php 
/* Template Name: Modern Events Calendar */
get_template_part('template-parts/header'); 
?>

<!-- Main section of the page -->
<section class="pt-28 lg:pt-28 bg-white relative overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
        <div class="max-w-3xl mb-12">
            <!-- Title of the page -->
            <span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4 block">Calendar & Events</span>
            <h1 class="text-5xl md:text-7xl font-black tracking-tight text-slate-900 mb-6">
                Stay on Track <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-400">All Upcoming Events</span>
            </h1>
            <!-- Info of the page -->
            <p class="text-xl text-slate-600 leading-relaxed max-w-2xl">
                Keep up with all our upcoming programs, workshops, and important dates. Plan ahead and never miss an event.
            </p>
        </div>
    </div>
</section>

<!-- This displays the calendar on the page -->
<article class="bg-slate-50 py-12 md:py-20">
    <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
        <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-slate-200/60 border border-slate-200 overflow-hidden p-4 md:p-8">
            <div id="calendar"></div>
        </div>
    </div>
</article>

<style>
    /* Make the calendar height feel substantial */
    #calendar {
        min-height: 550px; /* This ensures it stays "big" as requested */
        font-family: inherit;
    }

    /* Professional Toolbar Styling */
    .fc .fc-toolbar-title {
        font-size: 1.5rem !important;
        font-weight: 800 !important;
        color: #0f172a; /* slate-900 */
    }

    /* Modernizing the Buttons to match your Orange theme */
    .fc .fc-button-primary {
        background-color: #ffffff !important;
        border-color: #e2e8f0 !important;
        color: #475569 !important; /* slate-600 */
        font-weight: 700 !important;
        text-transform: capitalize !important;
        padding: 0.6rem 1.2rem !important;
        border-radius: 0.75rem !important;
        transition: all 0.2s ease;
    }

    .fc .fc-button-primary:hover {
        background-color: #f8fafc !important;
        color: #ea580c !important; /* orange-600 */
    }

    .fc .fc-button-primary:not(:disabled).fc-button-active {
        background-color: #ea580c !important; /* orange-600 */
        border-color: #ea580c !important;
        color: #ffffff !important;
    }

    /* Event Styling: Making them look like premium pills */
    .fc-event {
        border: none !important;
        padding: 3px 6px !important;
        border-radius: 6px !important;
        background: linear-gradient(135deg, #2563eb 0%, #4f46e5 100%) !important; /* Indigo Gradient */
        font-weight: 600 !important;
        font-size: 0.85rem !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    /* Today Highlight */
    .fc .fc-day-today {
        background-color: #fff7ed !important; /* orange-50 */
    }

    /* Mobile adjustments for the header */
    @media (max-width: 768px) {
        .fc .fc-toolbar {
            flex-direction: column;
            gap: 1rem;
        }
        #calendar { min-height: 600px; }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/google-calendar@6.0.3/index.global.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');

    const calendar = new FullCalendar.Calendar(calendarEl, {
        // Automatically switch to 'listWeek' view on small screens for better responsiveness
        initialView: window.innerWidth < 768 ? 'listWeek' : 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        buttonText: {
            today: 'Today',
            month: 'Month',
            week: 'Week',
            list: 'List'
        },
        // Sizing
        height: 850, // Fixed height makes it look more stable and "big"
        contentHeight: 'auto',
        dayMaxEvents: 3, 
        
        // Google Data (Exact same as your working code)
        googleCalendarApiKey: 'AIzaSyCleR5hROa8zwK8FmFmFYa2MJ_2w_yTFkk',
        events: {
            googleCalendarId: 'c_2502989900ee423752beff030c184bbfcc168855be3d453901295e3c7aaeb8c1@group.calendar.google.com'
        },
        
        eventClick: function(info) {
            info.jsEvent.preventDefault();
            if(info.event.url) {
                window.open(info.event.url, '_blank');
            }
        },

        // Clean up view on window resize
        windowResize: function(arg) {
            if (window.innerWidth < 768) {
                calendar.changeView('listWeek');
            } else {
                calendar.changeView('dayGridMonth');
            }
        }
    });

    calendar.render();
});
</script>

<!-- Calls he footer -->
<?php get_template_part('template-parts/footer'); ?>