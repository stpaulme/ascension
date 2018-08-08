<?php /* Template Name: Landing */ get_header(); ?>

<div id="content" role="main" aria-label="Homepage">
    <?php if ( get_field('page_links_on') || is_page_template('page-sidebar.php') ) : ?>
      <div class="container">
        <?php get_template_part( 'spm-layouts/layout', 'page-links' ); ?>
      </div>
    <?php endif; ?>
    <?php get_template_part( 'spm-layouts/layout', 'primary' ); ?>
    <?php get_template_part( 'spm-layouts/layout', 'special' ); ?>
    <?php get_template_part( 'spm-layouts/layout', 'below' ); ?>
</div><!-- #content -->

<?php get_footer(); ?>
