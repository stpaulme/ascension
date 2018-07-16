<?php

// find date time now
$date_now = date('Y-m-d H:i:s');
$time_now = strtotime($date_now);


// find date time in 7 days
$time_next_week = strtotime('+30 day', $time_now);
$date_next_week = date('Y-m-d H:i:s', $time_next_week);


// query events
$posts = get_posts(array(
	'posts_per_page'	=> -1,
	'post_type'			=> 'event',
	'meta_query' 		=> array(
		array(
	        'key'			=> 'start_date',
	        'compare'		=> 'BETWEEN',
	        'value'			=> array( $date_now, $date_next_week ),
	        'type'			=> 'DATETIME'
	    )
    ),
	'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'start_date',
	'meta_type'			=> 'DATETIME'
));

if( $posts ): ?>
    <?php foreach( $posts as $post ): setup_postdata( $post ); ?>
        <article class="event-post">
            <p class="event-date"><em><?php the_field('start_date'); ?></em></p>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php
                $articlecontent = wp_trim_words( get_the_excerpt(), 30, '...' );
                echo '<p class="event-description">' . $articlecontent . '</p>';
            ?> 
            <div class="event-links">
                <ul>
                    <?php $link = get_field('event_registration_link'); if( $link ): ?>
                    <li><a class="read-more" href="<?php echo $link['url']; ?>" target="_blank">Register Now</a></li>
                    <li>&nbsp;&nbsp;/&nbsp;&nbsp;</li>
                    <?php endif; ?>
                    <li><a class="read-more" href="<?php the_permalink(); ?>">Learn More »</a></li>
                </ul> 
            </div>
        </article>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>