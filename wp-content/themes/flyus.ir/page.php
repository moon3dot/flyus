<?php get_header(); ?>

<main class="main">
    <div class="container">
        <div class="row px-md-5 pb-5">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content() ?>
            <?php endwhile;
            else: ?>
                <p>این نوشته وجود ندارد</p>
            <?php  endif; ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>