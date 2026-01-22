<?php
// Example variables you can set before including this template
// $course_title = "Course Name";
// $course_image = "wths.jpeg"; // file from assets/img/
// $course_link = "#"; // link to course page
?>

<?php
// course-card.php

// These variables should be set before including this file
// $title, $description, $price, $image_url, $link

?>

<div class="bg-white relative block p-6 border border-gray-200 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
    <!-- Image -->
    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" class="rounded-t-xl mb-4 w-full h-48 object-cover">

    <!-- Title -->
    <h3 class="text-xl font-bold mb-2"><?php echo esc_html($title); ?></h3>

    <!-- Description -->
    <p class="text-gray-600 mb-4"><?php echo esc_html($description); ?></p>

    <!-- Price -->
    <?php if ($price): ?>
        <span class="inline-block bg-blue-900 text-white font-bold px-3 py-1 rounded-full text-sm shadow-lg"><?php echo esc_html($price); ?></span>
    <?php endif; ?>

    <!-- Link -->
    <?php if ($link): ?>
        <a href="<?php echo esc_url($link); ?>" class="mt-4 inline-block text-blue-700 font-semibold hover:underline">View Course</a>
    <?php endif; ?>
</div>

