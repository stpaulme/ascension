<div class="spm-accordion container">
    <!-- CSS -->
    <style>
        .spm-accordion {margin-top:15px;margin-bottom:15px;}
        .spm-accordion h2 {margin-bottom:0;}
        .spm-accordion h2 + div {display:none;}
        .spm-accordion h2:hover {cursor:pointer;}
        .spm-accordion h2:after {display:inline-block;content:'+';margin-left:5px;float:right;}
        .spm-accordion h2.active:after {content:'-'}
        @media (min-width: 576px) {}
        @media (min-width: 768px) {}
        @media (min-width: 992px) {}
        @media (min-width: 1200px) {}
    </style>
    
    <!-- HTML -->
    <?php if( have_rows('accordion_block') ): ?>
        <?php while( have_rows('accordion_block') ): the_row(); ?>
            <div id="accordion-<?php echo get_row_index(); ?>" class="accordion box">
                <h2><?php the_sub_field('accordion_heading'); ?></h2>
                <div><?php the_sub_field('accordion_copy'); ?></div>
            </div>
        <?php endwhile; ?>
    <?php endif; //if( get_sub_field('accordion_block') ): ?>
    
</div>