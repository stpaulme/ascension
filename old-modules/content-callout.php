<div class="simple-callout container">
    <!-- Callout CSS -->
    <style>
        .simple-callout {margin-top:15px;margin-bottom:15px;}
        .simple-callout p.button {text-align:center;margin-bottom:10px;}
        @media (min-width: 576px) {}
        @media (min-width: 768px) {}
        @media (min-width: 992px) {}
        @media (min-width: 1200px) {}
    </style>
    
    <!-- Callout HTML -->
    <?php $columns = get_sub_field('simple_callout_number'); if( $columns == 6 ): ?>
        <div class="box col-md-6 offset-md-3">
            <?php the_sub_field('simple_callout_field'); ?>
            <?php $button = get_sub_field('simple_callout_button'); if( $button ): ?>
                <p class="button"><a class="button" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php $columns = get_sub_field('simple_callout_number'); if( $columns == 8 ): ?>
        <div class="box col-md-8 offset-md-2">
            <?php the_sub_field('simple_callout_field'); ?>
            <?php $button = get_sub_field('simple_callout_button'); if( $button ): ?>
                <p class="button"><a class="button" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php $columns = get_sub_field('simple_callout_number'); if( $columns == 10 ): ?>
        <div class="box col-md-10 offset-md-1">
            <?php the_sub_field('simple_callout_field'); ?>
            <?php $button = get_sub_field('simple_callout_button'); if( $button ): ?>
                <p class="button"><a class="button" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>