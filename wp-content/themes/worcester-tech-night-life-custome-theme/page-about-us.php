<?php
/*
Template Name: About Us Page
*/
get_template_part('template-parts/header');
?>

<?php
/*
Template Name: About Us Page
*/
get_header();
?>

<!-- ======== PAGE NOT IN USE ======== -->

<main class="bg-gradient-to-b from-gray-50 to-gray-100 min-h-screen py-20">

    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Page Header -->
        <section class="text-center mb-20">
            <h1 class="text-6xl font-extrabold text-gray-900 mb-6 tracking-tight">
                About Us
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Learn more about our mission, our team, and what drives us every day.
            </p>
        </section>

        <!-- Our Mission -->
        <section class="mb-24 relative">
            <div class="max-w-4xl mx-auto text-center">
                <div class="bg-white shadow-2xl rounded-3xl p-12 transform transition hover:-translate-y-2 hover:shadow-3xl">
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">Our Mission</h2>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Our mission is to provide the highest quality products and services while ensuring an exceptional customer experience. We believe in innovation, integrity, and continuous improvement.
                    </p>
                </div>
            </div>
        </section>

        <!-- Our Team -->
        <section class="mb-24">
            <h2 class="text-4xl font-bold text-gray-900 text-center mb-16">
                Meet Our Team
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">

                <?php 
                // Team members array
                $team_members = [
                    [
                        'name' => 'Alice Johnson',
                        'role' => 'CEO & Founder',
                        'image' => get_template_directory_uri() . '/assets/images/team1.jpg',
                    ],
                    [
                        'name' => 'Bob Smith',
                        'role' => 'Head of Development',
                        'image' => get_template_directory_uri() . '/assets/images/team2.jpg',
                    ],
                    [
                        'name' => 'Clara Lee',
                        'role' => 'Marketing Lead',
                        'image' => get_template_directory_uri() . '/assets/images/team3.jpg',
                    ],
                ];

                foreach($team_members as $member) : ?>
                    <div class="bg-white rounded-3xl shadow-lg p-8 flex flex-col items-center transform transition hover:-translate-y-3 hover:shadow-2xl">
                        <div class="w-36 h-36 rounded-full overflow-hidden mb-6 border-4 border-orange-500">
                            <img src="<?= esc_url($member['image']); ?>" alt="<?= esc_attr($member['name']); ?>" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-1"><?= esc_html($member['name']); ?></h3>
                        <p class="text-gray-600 mb-4"><?= esc_html($member['role']); ?></p>
                    </div>
                <?php endforeach; ?>

            </div>
        </section>

        <!-- Our Values -->
        <section class="mb-24">
            <h2 class="text-4xl font-bold text-gray-900 text-center mb-16">Our Values</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-10 max-w-5xl mx-auto text-center">

                <div class="bg-gradient-to-tr from-orange-50 to-orange-100 p-8 rounded-3xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
                    <h3 class="text-2xl font-bold mb-4 text-orange-600">Integrity</h3>
                    <p class="text-gray-700 text-lg leading-relaxed">We maintain honesty and transparency in everything we do.</p>
                </div>

                <div class="bg-gradient-to-tr from-indigo-50 to-indigo-100 p-8 rounded-3xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
                    <h3 class="text-2xl font-bold mb-4 text-indigo-600">Innovation</h3>
                    <p class="text-gray-700 text-lg leading-relaxed">We continuously innovate to meet the needs of our customers.</p>
                </div>

                <div class="bg-gradient-to-tr from-green-50 to-green-100 p-8 rounded-3xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
                    <h3 class="text-2xl font-bold mb-4 text-green-600">Excellence</h3>
                    <p class="text-gray-700 text-lg leading-relaxed">We strive for excellence in quality, service, and experience.</p>
                </div>

            </div>
        </section>

    </div>
</main>




<!-- FOOTER -->
<?php get_template_part('template-parts/footer'); ?>
