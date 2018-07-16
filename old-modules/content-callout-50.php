<div class="callout-50 container">
    <div class="box">
        <div class="row">
        <!-- Callout CSS -->
        <style>
            .callout-50 {margin-top:15px;margin-bottom:15px;}
            @media (min-width: 576px) {}
            @media (min-width: 768px) {}
            @media (min-width: 992px) {}
            @media (min-width: 1200px) {}
        </style>

        <!-- Callout HTML -->
        <?php $choice = get_sub_field('callout_image_choice'); if( $choice == 'left' ): ?>
            <div class="col-md-6">
                <?php echo wp_get_attachment_image(get_sub_field('callout_image_left'), 'landscape-tablet'); ?>
            </div>
            <div class="col-md-6">
                <h2><?php the_sub_field('callout_heading'); ?></h2>
                <?php the_sub_field('callout_copy'); ?>
                <?php $button = get_sub_field('callout_button'); if( $button ): ?>
                    <p class="button"><a class="button" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php $choice = get_sub_field('callout_image_choice'); if( $choice == 'right' ): ?>
            <div class="col-md-6">
                <h2><?php the_sub_field('callout_heading'); ?></h2>
                <?php the_sub_field('callout_copy'); ?>
                <?php $button = get_sub_field('callout_button'); if( $button ): ?>
                    <p class="button"><a class="button" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a></p>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <?php echo wp_get_attachment_image(get_sub_field('callout_image_right'), 'landscape-tablet'); ?>
            </div>
        <?php endif; ?>
        </div>
    </div>
</div>





