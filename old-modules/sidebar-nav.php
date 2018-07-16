<aside id="sidebar-nav" class="container">
    <!-- Sidebar Navigation Styling -->
    <style>
        #sidebar-nav {display:none;}
        #sidebar-nav .box {border:1px solid #CCCCCC;background:#f1f1f1;padding:15px;margin-bottom:30px;}
        #sidebar-nav h4 {margin-bottom:15px;}
        #sidebar-nav ul {list-style:none;border-left:1px solid #CCCCCC;padding-left:20px;}
        @media (min-width: 576px) {}
        @media (min-width: 768px) {
            #sidebar-nav {display:block;}
        }
        @media (min-width: 992px) {}
        @media (min-width: 1200px) {}
    </style>
    
    <!-- Sidebar Navigation Logic -->
    <div class="box">
        <h4>In This Section</h4>
        <?php
            if ( $post->post_parent ) {
                $children = wp_list_pages( array(
                    'title_li' => '',
                    'child_of' => $post->post_parent,
                    'sort_column'  => 'menu_order',
                    'echo'     => 0
                ) );
            } else {
                $children = wp_list_pages( array(
                    'title_li' => '',
                    'child_of' => $post->ID,
                    'sort_column'  => 'menu_order',
                    'echo'     => 0
                ) );
            }

            if ( $children ) : ?>
                <ul>
                    <?php echo $children; ?>
                </ul>
        <?php endif; ?>
    </div>
</aside>