<?php /* Template Name: Blog */ ?>
<?php get_header(); ?>
<!-- body  -->
<main class="main">
    <!-- last article  -->
    <?php get_template_part('template-parts/blog/last-article') ?>
     <!-- content  -->
     <?php get_template_part('template-parts/blog/content') ?>
</main>
<?php get_footer(); ?>