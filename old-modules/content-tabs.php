<div class="spm-tabs container">
    <!-- CSS -->
    <style>
        .spm-tabs {margin-top:15px;margin-bottom:15px;}
        .spm-tabs h2 {margin-bottom:0;}
        @media (min-width: 576px) {}
        @media (min-width: 768px) {}
        @media (min-width: 992px) {}
        @media (min-width: 1200px) {}
    </style>
    
    
    <!-- HTML -->
    <?php $heading = get_sub_field('tabs_heading'); if( $heading ): ?>
        <h2><?php the_sub_field('tabs_heading'); ?></h2>
    <?php endif; ?>
    <div id="tabs">
        <?php if( have_rows('tabs_block') ): ?>
            <ul>
            <?php while( have_rows('tabs_block') ): the_row(); ?>
                <li><a href="#tabs-<?php echo get_row_index(); ?>"><?php the_sub_field('tabs_title'); ?></a></li>
            <?php endwhile; ?>
            </ul>
        <?php endif; //if( get_sub_field('tabs_block') ): ?>
        <?php if( have_rows('tabs_block') ): ?>
            <?php while( have_rows('tabs_block') ): the_row(); ?>
                <div id="tabs-<?php echo get_row_index(); ?>"><?php the_sub_field('tabs_copy'); ?></div> 
            <?php endwhile; ?>
        <?php endif; //if( get_sub_field('tabs_block') ): ?>
    </div>
</div>