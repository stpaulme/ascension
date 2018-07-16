<div id="postfeed" class="container">
    <!-- Post Feed CSS -->
    <style>
        #postfeed {}
        @media (min-width: 576px) {}
        @media (min-width: 768px) {}
        @media (min-width: 992px) {}
        @media (min-width: 1200px) {}
    </style>
    
    <!-- Hero HTML -->
    <?php echo wp_get_attachment_image(get_sub_field('hero_image'), 'full'); ?>
    <div class="heroContent">
        <p><?php the_sub_field('hero_copy'); ?></p>
        <a class="button" href="<?php the_sub_field('hero_button_link'); ?>"><?php the_sub_field('hero_button_text'); ?></a>
    </div>
</div>