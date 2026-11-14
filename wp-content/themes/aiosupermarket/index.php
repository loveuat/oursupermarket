<?php get_header(); ?>

<main class="min-h-screen bg-gray-50 px-6 py-16">

    <div class="mx-auto max-w-7xl">

        <!-- React Application -->
        <div id="react-root"></div>

        <!-- WordPress Dynamic Posts -->
        <section class="mt-16">

            <h2 class="mb-8 text-3xl font-bold">
                Latest Blog Posts
            </h2>

            <div class="grid gap-6 md:grid-cols-3">

                <?php if ( have_posts() ) : ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                        <article class="rounded-xl bg-white p-6 shadow">

                            <h3 class="text-xl font-bold">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <div class="mt-3 text-gray-600">
                                <?php the_excerpt(); ?>
                            </div>

                        </article>

                    <?php endwhile; ?>

                <?php else : ?>

                    <p>No posts found.</p>

                <?php endif; ?>

            </div>

        </section>

    </div>

</main>

<?php get_footer(); ?>
