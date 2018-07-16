<header class="page-header">
    <div class="container">
        <div class="row">
            <div class="page-title col">
                <?php if ( is_singular('post') ) : ?>
                <a class="back" href="/news">News</a>
                <?php endif; ?>
                <h1><?php single_post_title(); ?></h1>
            </div>
        </div>
    </div>
</header><!-- #page-header -->