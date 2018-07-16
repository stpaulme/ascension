<div class="search-box container"><!-- Sidebar Search Field -->
    <!-- Post Feed CSS -->
    <style>
        .search-box {margin-top:15px;margin-bottom:15px;}
        @media (min-width: 576px) {}
        @media (min-width: 768px) {}
        @media (min-width: 992px) {}
        @media (min-width: 1200px) {}
    </style>
    
    <!-- Hero HTML -->

    <div class="search-box-content container box">
        <h2 class="searchBoxTitle"><?php the_sub_field('search_box_heading'); ?></h2>
        <form role="search" action="<?php echo site_url('/'); ?>" method="get">
            <input type="text" name="s" placeholder="<?php the_sub_field('search_box_heading'); ?>"/>
            <input type="hidden" name="post_type" value="<?php the_sub_field('search_post_type'); ?>" /> <!-- // hidden 'products' value -->
            <?php echo the_field('search_post_type'); ?>
            <input type="submit" alt="Search" value="Search" />
        </form>
    </div>

</div>