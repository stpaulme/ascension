<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <a class="skip-link screen-reader-text" href="#content" tabindex="-1">Skip to Main Content</a>
    <div id="page" class="site">
    <?php
    $ann_text = get_field('ann_text', 'option');
    $ann_link = get_field('ann_link', 'option');
    if ( $ann_text ) :
    ?>
        <?php if ( $ann_link ) : ?>
        <a class="ann-link" href="<?php echo $ann_link['url']; ?>" target="<?php echo $ann_link['target']; ?>">
        <?php endif; ?>

            <div class="container-fluid ann-bar">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <p class="ann-text"><?php echo $ann_text; ?></p>
                        </div>
                    </div>
                </div>
            </div>

        <?php if ( $ann_link ) : ?>
        </a>
        <?php endif; ?>
    <?php endif; ?>
        <header id="masthead" role="banner">
            <?php if( get_field('fluid_header', 'option') ): ?>
            <div class="container h-100" style="max-width:none !important;">
            <?php else: ?>
            <div class="container h-100">
            <?php endif; ?>
                <div class="row h-100">
                    <div id="header-logo" class="col-6 col-lg-2">
                        <a class="h-100" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png');" href="/"></a>
                    </div>
                    <div role="navigation" aria-label="Main Navigation" id="header-nav" class="d-none d-lg-block col-lg-10">
                        <div class="row flex-row-reverse">
                            <div role="search" id="search" class="col-lg-2">
                                <?php get_search_form(); ?>
                            </div>
                            <nav aria-label="Social Media Links" id="social" class="col-lg-2">
                                <?php if( have_rows('global_social_media', 'option') ): ?>
                                    <ul>
                                    <?php while( have_rows('global_social_media', 'option') ): the_row(); ?>
                                        <li><a class="fa <?php the_sub_field('icon'); ?>" aria-hidden="true" href="<?php the_sub_field('url'); ?>" target="_blank"></a></li>
                                    <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </nav>
                            <nav aria-label="Secondary Pages" id="secondary" class="col-12"><?php wp_nav_menu( array('theme_location' => 'header-secondary','container' => '',) ); ?></nav>
                            <div class="clearfix"></div>
                            <nav aria-label="Primary Pages" id="primary" class="col-12"><?php wp_nav_menu( array('theme_location' => 'header-primary','container' => '',) ); ?></nav>
                        </div>
                    </div>
                    <div id="header-mobile" class="d-lg-none d-flex justify-content-end col-6">
                        <i id="mobile-menu" class="fa fa-bars align-self-center justify-self-end" aria-hidden="true"></i>
                    </div>
                </div><!-- .row -->
            </div><!-- .container -->
        </header><!-- #masthead -->
