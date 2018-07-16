<section class="basic-content">
    <?php if( get_sub_field('fullscreen') ): ?>
    <div class="container-fluid">
    <?php else: ?>
    <div class="container">
    <?php endif; ?>
        <div class="row">
            <div class="basic-heading col">
                <h2><?php the_sub_field('heading'); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="basic-copy col">
                <?php the_sub_field('content'); ?>
            </div>
        </div>
    </div>
</section>