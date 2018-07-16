<aside class="sidebar-cta">
    <div class="card">
        <div class="card-body">
            <!-- Heading -->
            <?php if( get_sub_field('cta_heading') ): ?>
            <h3 class="card-title"><?php the_sub_field('cta_heading'); ?></h3>
            <?php endif; ?>
            
            <!-- Copy -->
            <?php if( get_sub_field('cta_copy') ): ?>
            <p class="card-text"><?php the_sub_field('cta_copy'); ?></p>
            <?php endif; ?>
            
            <!-- Button -->
            <?php $button = get_sub_field('cta_button'); if( $button ): ?>
            <a class="btn btn-primary" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
            <?php endif; ?>
        </div>
    </div>
</aside>