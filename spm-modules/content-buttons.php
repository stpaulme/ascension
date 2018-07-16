<section class="button-group">
    <div class="container">
        <?php if (get_sub_field('button_group_heading')): ?>
        <div class="row">
            <div class="col button-group-heading">
                <h2><?php the_sub_field('button_group_heading'); ?></h2>
            </div>
        </div>
      <?php endif; ?>

      <?php if( have_rows('button_group') ): ?>
      <div class="row">
        <?php while( have_rows('button_group') ): the_row(); ?>
            <div class="col text-center">
              <?php $link = get_sub_field('button_group_button'); if( $link ): ?>
                  <a class="btn btn-primary" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
              <?php endif; ?>
            </div>
      <?php endwhile; ?>
      </div>
    <?php endif; ?>
    </div>
</section>