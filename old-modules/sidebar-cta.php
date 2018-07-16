<aside class="sidebar-cta container">
    <!-- Callout CSS -->
    <style>
        .sidebar-cta {}
        .sidebar-cta .box {}
        .sidebar-cta p.button {margin-bottom:0;}
        @media (min-width: 576px) {}
        @media (min-width: 768px) {}
        @media (min-width: 992px) {}
        @media (min-width: 1200px) {}
    </style>
    
    <!-- Callout HTML -->
    <div class="card">
        <div class="card-body">
            <h3><?php the_sub_field('cta_heading'); ?></h3>
            <?php the_sub_field('cta_copy'); ?>
            <?php $button = get_sub_field('cta_button'); if( $button ): ?>
                <p class="button"><a class="button" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a></p>
            <?php endif; ?>
        </div>
    </div>
</aside>