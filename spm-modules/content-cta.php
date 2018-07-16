<section class="content-cta" aria-label="Calls to Action">
    <?php if( get_sub_field('fullscreen') ): ?>
    <div class="container-fluid">
    <?php else: ?>
    <div class="container">
    <?php endif; ?>
        <?php if( get_sub_field('heading') ): ?>
            <div class="row">
                <div class="col-12"><h2><?php the_sub_field('heading'); ?></h2></div>
            </div>
        <?php endif; ?>
        <div class="card-deck">
        <?php if( have_rows('cta_repeater') ) : ?>

            <?php while ( have_rows('cta_repeater') ) : the_row(); ?>

            <div class="card">
                <?php if( get_sub_field('image') ): ?>
                    <?php $cardlink = get_sub_field('link'); if( $cardlink ): ?>
                        <a href="<?php echo $cardlink['url']; ?>" target="<?php echo $cardlink['target']; ?>">
                            <?php $alttext = get_sub_field('title'); echo wp_get_attachment_image(get_sub_field('image'), 'landscape-tablet', 0, array('class' => 'card-img-top', 'alt' => $alttext )); ?>
                        </a>
                    <?php endif; ?>
                    <?php $button = get_sub_field('button'); if( $button ): ?>
                        <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>">
                            <?php $alttext = get_sub_field('title'); echo wp_get_attachment_image(get_sub_field('image'), 'landscape-tablet', 0, array('class' => 'card-img-top', 'alt' => $alttext )); ?>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if( get_sub_field('header') ): ?>
                    <div class="card-header"><?php the_sub_field('header'); ?></div>
                <?php endif; ?>
                <div class="card-body">
                    <h3 class="card-title"><?php the_sub_field('title'); ?></h3>
                    <?php if( get_sub_field('subtitle') ): ?>
                        <p class="card-subtitle text-muted"><?php the_sub_field('subtitle'); ?></p>
                    <?php endif; ?>
                    <p class="card-text"><?php the_sub_field('copy'); ?></p>
                    <?php $button = get_sub_field('button'); if( $button ): ?>
                        <a class="button" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                    <?php endif; ?>
                    <?php $cardlink = get_sub_field('link'); if( $cardlink ): ?>
                        <a class="card-link" href="<?php echo $cardlink['url']; ?>" target="<?php echo $cardlink['target']; ?>"><?php echo $cardlink['title']; ?></a>
                    <?php endif; ?>
                </div>
                <?php if( get_sub_field('footer') ): ?>
                    <div class="card-footer"><?php the_sub_field('footer'); ?></div>
                <?php endif; ?>
            </div>
            <?php $count = get_row_index('cta_repeater'); ?>
        <?php endwhile; else: ?>
        <?php endif; ?>   
        </div>
    </div>
    <?php if ($count >= 4): ?>
        <!-- Count: <?php echo $count; ?> -->
        <style>
            @media (min-width: 576px) {.card-deck .card {flex: 1 1 45%;}}
            @media (min-width: 1200px) {.card-deck .card {flex: 1 1 20%;}}
        </style>
    <?php elseif ($count == 3): ?>
        <style>
            @media (min-width: 576px) {.card-deck .card {flex: 1 1 45%;}}
            @media (min-width: 768px) {.card-deck .card {flex: 1 1 25%;}}
            @media (min-width: 992px) {.card-deck .card {flex: 1 1 25%;}}
            @media (min-width: 1200px) {}
        </style>
    <?php elseif ($count == 1): ?>
        
        
        
        
    <?php endif; ?>
</section>


