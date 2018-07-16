<!-- Specifically for Events -->
<section class="event-schema">
    <?php if( get_sub_field('fullscreen') ): ?>
    <div class="container-fluid">
    <?php else: ?>
    <div class="container">
    <?php endif; ?>
        <div class="row">
            <div class="basic-heading col-12">
                <h2><?php the_sub_field('heading'); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="basic-copy col-12">
                <?php the_sub_field('content'); ?>
            </div>
        </div>
    </div>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php
    // Open script
      $html = '<script type="application/ld+json">';

        $html .= '{';
          $html .= '"@context": "http://schema.org",';
          $html .= '"@type": "Person",';
          $html .= '"name":' . '"' . the_author() . '",';
          $html .= '"logo": "' . get_template_directory_uri() . '/dist/images/logo.png"';
        $html .= '}';

      // Close script
      $html .= '</script>';

      echo $html;
    ?>
    <?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
</section>