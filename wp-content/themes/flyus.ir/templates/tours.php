<?php /* Template Name: Tours */ ?>
<?php get_header(); ?>
<!-- body  -->
 <main class="main tour-list">
        <!-- visa list  -->
        <?php get_template_part('template-parts/tours/visa-list') ?>
        <!-- tour1  -->
        <?php get_template_part('template-parts/tours/tour1') ?>
        <!-- tour2  -->
        <?php get_template_part('template-parts/tours/tour2') ?>
         <!-- other  -->
        <?php get_template_part('template-parts/tours/other') ?>
          <!-- guaranti -->
        <?php get_template_part('template-parts/tours/guaranti') ?>
</main>
<?php get_footer(); ?>
