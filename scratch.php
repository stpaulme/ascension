<?php
//////////////////////////////////////////////
//  holder.js Stuff -- Load Script in Footer.php
//////////////////////////////////////////////
?>

<img data-src="holder.js/3000x2000?auto=yes&textmode=exact">
<script>
  Holder.addTheme('gray', {
    bg: '#777',
    fg: 'rgba(255,255,255,.75)',
    font: 'Helvetica',
    fontweight: 'normal'
  });
</script>

<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']); ?>

<?php
//////////////////////////////////////////////
//  ACF SPECIFIC CODE SNIPPETS
//////////////////////////////////////////////
?>

<?php //////////////// Query Posts Based On Selections/Fields ?>
<?php
$posts = get_posts(array(
    'meta_query' => array(
        array(
            'key' => 'colors', // name of custom field
            'value' => '"red"', // matches exactly "red"
            'compare' => 'LIKE'
        )
    )
));
if( $posts ) {
    //...
}
?>


<?php the_field('header_title', 'option'); ?>

<?php the_post_thumbnail('landscape-mobile', array( 'alt' => get_the_title() )); ?>
<?php echo wp_get_attachment_image(get_sub_field('image'), 'landscape-tablet', 0, array('class' => 'example-class', 'alt' => get_the_title() )); ?>

<?php /////////////// Conditional Content Check ?>
<?php if( get_field('field') ): ?>
    <p><?php the_field('field'); ?></p>
<?php endif; ?>

<?php /////////////// Get Custom Taxonomies from Custom Post Type ?>
<?php
    $spm_terms = wp_get_object_terms( $post->ID,  'focus' );
    foreach( $spm_terms as $term ) {
    echo '<p><a href="' . get_term_link( $term->slug, 'focus' ) . '">' . esc_html( $term->name ) . '</a></p>';
    } ?>

<div class="searchButton">
    <i id="searchButton" class="fa fa-search" aria-hidden="true"></i>
</div>

<?php ///////// Display Custom Taxonomy for Posts ?>
<?php $spm_taxes = array('sep' => ' ', 'template' => '% %l');the_taxonomies( $spm_taxes ); ?>

<?php ///////// Display Category for Post ?>
<?php the_category( ' ' ); ?>

<?php // Hero Image w/Static Text <p>
        $headerhero = get_field('header_hero');
        echo '<div class="featuredImage row" style="background-image:url(' . $donatehero . ');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        ">';
        echo '<p class="hero-title">DONATE</p>';
        echo '</div>';

?>

<?php // Hero Image w/Dynamic Text <h1>
        $headerhero = get_field('header_hero');
        $headertext = get_field('header_text');
        echo '<div class="featuredImage row" style="background-image:url(' . $donatehero . ');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        ">';
        echo '<h1 class="hero-title">' . $donatehero . '</p>';
        echo '</div>';

?>

<?php if( have_rows('frequently_asked_questions') ): while ( have_rows('frequently_asked_questions') ) : the_row(); ?>
        <div class="fieldContainer">
            <h1><?php the_sub_field('sub_field'); ?></h1>
            <p><?php the_sub_field('sub_field'); ?></p>
        </div>
<?php endwhile; else : endif; ?>

<?php // Repeater Field - 2 Tier
        if( have_rows('example_field_one') ):
        while( have_rows('example_field_one') ): the_row();
        ?>
                <div class="firstFieldContainer">
                    <h2><?php the_sub_field('example_field_header'); ?></h2>
                    <p><?php the_sub_field('example_field_content'); ?></p>

                    <?php if( have_rows('example_field_two') ): ?>
                        <div class="secondFieldContainer">
                            <?php while( have_rows('example_field_two') ): the_row(); ?>

                            <h3><?php the_sub_field('example_field_second_header'); ?></h3>
                            <p><?php the_sub_field('example_field_second_content'); ?></p>

                            <?php endwhile; ?>
                        </div><!-- secondFieldContainer -->
                    <?php endif; ?>

                </div><!-- firstFieldContainer -->
            <?php endwhile; ?>
        <?php endif; ?>

<!-- Post Select / Single Post Select -->
<?php $post_object = get_field('post_object');
if( $post_object ): $post = $post_object;setup_postdata( $post );?>

<?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php // Post Object Field w/ Multiple Select
$post_objects = get_field('home_recipes'); if( $post_objects ): ?>
                <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>

                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php the_content(); ?></p>

                <?php endforeach; ?>
                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>



<?php // Post Object Field w/ Multiple Select (Post ID Selected)
$post_objects = get_sub_field('list_here'); if( $post_objects ): ?>
                <ul>
                    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                    <?php setup_postdata($post); ?>

                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                    <?php endforeach; ?>
                 </ul>
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>





<?php // Responsive Image Rendered
    echo wp_get_attachment_image(get_sub_field('image'), 'full');
?>

<?php // Responsive Image Rendered w/Class Name
    echo wp_get_attachment_image(get_sub_field('image'), 'full', 0, array('class' => 'example'));
?>


<?php // Flexslider Example Code

$images = get_field('gallery');

if( $images ): ?>
    <div id="slider" class="flexslider">
        <ul class="slides">
            <?php foreach( $images as $image ): ?>
                <li>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <p><?php echo $image['caption']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div id="carousel" class="flexslider">
        <ul class="slides">
            <?php foreach( $images as $image ): ?>
                <li>
                    <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php ////// Time without dash if empty end date //////// ?>
<li>
<?php the_sub_field('today_start'); ?>
<?php
    $ending = get_sub_field('today_end');
    if ($ending != 0) {
        echo '- ' . $ending;
    }
    ?>
</li>



<?php
//////////////////////////////////////////////
//////////////////////////////////////////////
//  WORDPRESS SPECIFIC CODE SNIPPETS
//////////////////////////////////////////////
//////////////////////////////////////////////
?>

<?php // Get title of PARENT PAGE
    $parent_title = get_the_title( $post->post_parent );
echo '<h3>' . $parent_title . '</h3>';
?>

<?php // Get excerpt and TRIM WORDS without BREAKING READMORE TEXT
    $articlelink = get_the_permalink();
    $articlecontent = wp_trim_words( get_the_excerpt(), 30, '...' );
    echo '<p>' . $articlecontent . '<a class="readMore" style="display:inline-block;" href="' . $articlelink . '"> CONTINUE »</a></p>';
?>

<?php // Blog Post Feed
        $blog_posts = new WP_Query( array('posts_per_page'=> 2, 'ignore_sticky_posts' => 1, 'cat' => '-16') );
        while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>

        <div class="blogItem col-sm-12 col-md-6 col-lg-12">
            <div class="blogPost">
                <?php the_post_thumbnail(); ?>
                <div class="blogContent">
                    <p class="blogCategory"><?php the_category( ' ' ); ?></p>
                    <h3 class="blogTitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                    <div class="blogExcerpt">
                        <?php
                            $blogLink = get_the_permalink();
                            $blogContent = wp_trim_words( get_the_excerpt(), 30, '...' );
                            echo '<p>' . $blogContent . '<a class="readMore" href="' . $blogLink . '"> READ MORE »</a></p>';
                        ?>
                    </div>
                    <p class="blogTags"><?php the_tags(' ', ', '); ?></p>
                </div>
            </div>
        </div><!-- blogItem -->
        <?php wp_reset_postdata(); ?>
        <?php endwhile; // End of news loop. ?>

<?php
//////////////////////////////////////////////
//////////////////////////////////////////////
//  Automatic Sidebar Navigation
//////////////////////////////////////////////
//////////////////////////////////////////////
?>

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



<?php
//////////////////////////////////////////////
//////////////////////////////////////////////
//  JQUERY SPECIFIC CODE SNIPPETS
//////////////////////////////////////////////
//////////////////////////////////////////////
?>

<script>
    FastClick.attach(document.body);

    jQuery (".accordion h4 ~ div").hide();
    jQuery (".accordion h4").click(function() {
		jQuery(this).next().slideToggle("slow");
        jQuery(this).toggleClass('active');
        event.preventDefault();
    });

    jQuery(".mobileSearch").click(function() {
		jQuery('#searchForm').slideToggle();
        event.preventDefault();
    });
    jQuery(".desktopSearch").click(function() {
		jQuery('#searchForm').slideToggle();
        event.preventDefault();
    });

    jQuery('.whereActionAbroad').on('click', function() {
        jQuery.smoothScroll({
            scrollTarget: '#abroadOptions',
            offset: -100
            });
        return false;
    });
    jQuery('.whereActionUSA').on('click', function() {
        jQuery.smoothScroll({
            scrollTarget: '#usaOptions',
            offset: -100
            });
        return false;
    });
    jQuery('#backtotop a').on('click', function() {
        jQuery.smoothScroll({
            scrollTarget: '#page'
            });
        return false;
    });
</script>

// Popup menu at footer
<div class="row">
    <div id="footerPopup">
        <?php wp_nav_menu( array( 'theme_location' => 'student-landing', 'menu_id' => 'Student Landing' ) ); ?>
    </div>
</div>
<script>
    var offset = 250;
    jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > offset) {
    jQuery('#footerPopup').fadeIn();
    } else {
    jQuery('#footerPopup').fadeOut();
    }
    });
</script>


//////////////////////////////////////////
Tribe Events Garbage
- Functions
/////////////////////////////////////////

'tribe_event_date',
'tribe_event_cost',
'tribe_event_category',
'tribe_event_tag',
'tribe_event_website',
'tribe_event_origin',
'tribe_event_venue_name',
'tribe_event_venue_phone',
'tribe_event_venue_address',
'tribe_event_venue_website',
'tribe_event_organizer_name',
'tribe_event_organizer_phone',
'tribe_event_organizer_email',
'tribe_event_organizer_website',
'tribe_event_custom_meta',

//////////////////////////////////////////
Tribe Events Garbage
- Meta Templates
/////////////////////////////////////////
'tribe_event_details',
'tribe_event_venue',
'tribe_event_organizer',
