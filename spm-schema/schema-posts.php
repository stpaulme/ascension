<?php
global $post;
setup_postdata($post);

// Features
$schema_breadcrumb = '';
$schema_sitelinks = '';
$schema_corporate = '';
$schema_logo = '';
$schema_social = '';
$schema_carousel = '';

// Content Types

// Wordpress - Post
$content_types = get_field('content_types');
$content_primary = get_field('content_primary');
$page_title = sanitize_text_field(get_the_title());
$page_url = get_the_permalink();
$page_excerpt = sanitize_text_field(get_the_excerpt());
$page_excerpt_review = substr( strip_tags( $page_excerpt ), 0, 200 );
$page_content = sanitize_textarea_field(get_the_content());
$page_image = array(get_the_post_thumbnail_url($post, 'schema-one'), get_the_post_thumbnail_url($post, 'schema-four'), get_the_post_thumbnail_url($post, 'schema-sixteen'));
$page_publication_date = get_the_date('c');
$page_modified_date = get_the_modified_time('c');
$categories = get_the_category(); if (!empty($categories)) { $page_category = $categories[0]->name; }
$page_word_count = str_word_count($page_content);


// Wordpress - Author
$page_author_id = get_the_author_meta('ID');
$page_author_name = get_the_author_meta('display_name');
$page_author_link = get_author_posts_url(get_the_author_meta( 'ID' ));
$page_author_social = array();
if( have_rows('page_author_social', 'user_'. $page_author_id ) ): while( have_rows('page_author_social', 'user_'. $page_author_id ) ): the_row();
    $page_author_social_channel = get_sub_field('page_author_social_channel', 'user_'. $page_author_id );
    array_push($page_author_social, $page_author_social_channel);
endwhile; endif;
$page_author = array(
    "@type" => "Person",
    "@id" => $page_author_link,
    "name" => $page_author_name,
    "sameAs" => $page_author_social
);

//Wordpress - Organization
$org_name = get_bloginfo('name');
$org_url = get_bloginfo('url');
$org_logo = array(
    "@type" => "ImageObject",
    "url" => get_site_icon_url()
);
$org_id = $org_url . '#organization';
$org = array(
    "@type" => "Organization",
    "@id" => $org_id,
    "name" => $org_name,
    "url" => $org_url,
    "logo" => $org_logo,
    "sameAs" => $org_url
);

// Review - Book
if( have_rows('book_review') ): while( have_rows('book_review') ): the_row();
    $review_type = array(
        "@type" => "Book",
        "name" => get_sub_field('book_title'),
        "sameAs" => get_sub_field('book_link'),
        "image" => get_sub_field('book_image'),
        "isbn" => get_sub_field('book_isbn'),
        "datePublished" => get_sub_field('book_publication_date'),
        "author" => array(
            "@type" => "Person",
            "name" => get_sub_field('book_author_name'),
            "sameAs" => get_sub_field('book_author_website')
        )
    );
endwhile; endif;

// Review - Movie
if( have_rows('movie_review') ): while( have_rows('movie_review') ): the_row();
    $review_type = array(
        "@type" => "Movie",
        "name" => get_sub_field('book_title'),
        "sameAs" => get_sub_field('book_link'),
        "image" => get_sub_field('book_image'),
        "isbn" => get_sub_field('book_isbn'),
        "datePublished" => get_sub_field('book_publication_date'),
        "author" => array(
            "@type" => "Person",
            "name" => get_sub_field('book_author_name'),
            "sameAs" => get_sub_field('book_author_website')
        )
    );
endwhile; endif;

// Content Type - Event
$event_venue_name = '';
$event_title = get_field('event_title');
$event_summary = get_field('event_summary');
$event_start = get_field('event_start');
$event_end = get_field('event_end');
$event_presenter = array(
    "@type" => "PerformingGroup",
    "name" => get_field('event_presenter')
);

if( have_rows('event_venue') ): while( have_rows('event_venue') ): the_row();
$event_venue_name = get_sub_field('event_venue_name');
$event_street = get_sub_field('event_street');
$event_city = get_sub_field('event_city');
$event_zip = get_sub_field('event_zip');
$event_state = get_sub_field('event_state');
$event_country = get_sub_field('event_country');
    $event_location = array(
        "@type" => "Place",
        "name" => $event_venue_name,
        "address" => array(
            "@type" => "PostalAddress",
            "streetAddress" => $event_street,
            "addressLocality" => $event_city,
            "postalCode" => $event_zip,
            "addressRegion" => $event_state,
            "addressCountry" => $event_country
        )
    );
endwhile; endif;
if( have_rows('event_tickets') ): while( have_rows('event_tickets') ): the_row();
    $event_tickets = array(
        "@type" => "Offer",
        "url" => get_sub_field('event_ticket_link'),
        "price" => get_sub_field('event_ticket_price'),
        "priceCurrency" => "USD",
        "validFrom" => get_sub_field('event_ticket_start'),
        "validThrough" => get_sub_field('event_ticket_end'),
        "availability" => get_sub_field('event_ticket_avail')
    );
endwhile; endif;
$event_sponsors = array();
if( have_rows('event_sponsors') ): while( have_rows('event_sponsors') ): the_row();
    $logo = get_sub_field('event_sponsor_logo');
    $event_sponsor = array(
        "@type" => "Organization",
        "name" => get_sub_field('event_sponsor_name'),
        "url" => get_sub_field('event_sponsor_url'),
        "logo" => $logo['url']
    );
    array_push($event_sponsors, $event_sponsor);
endwhile; endif;

// Content Type - Course
$course_title = get_field('course_title');
$course_description = get_field('course_description');
$course_code = get_field('course_code');
$course_prerequisite = get_field('course_prerequisite');

// Content Type - Video
$video_link = get_field('video_link');
$video_link_trim = trim($video_link, 'https://youtu.be/');
$video_thumbnail = 'https://i3.ytimg.com/vi/' . $video_link_trim . '/maxresdefault.jpg';
if(get_field('video_duration')){ $preptime = get_field('video_duration'); $preparr = explode(':', $preptime); $hour = $preparr[0]; $min = $preparr[1]; $sec = $preparr[2]; $video_duration = 'PT'.$hour.'H'.$min.'M'.$sec.'S';}

// Content Type - Potential Action !!! Don't forget this for organization

// Types Conditionals
$content_push = array();
$schema_types_array = array();

if (in_array('Article', $content_types)) {
    $content_push = array(
        "@type" => "Article",
        "@id" => $page_url . '#article',
        "name" => $page_title,
        "url" => $page_url,
        "description" => $page_excerpt,
        "author" => $page_author,
        "datePublished" => $page_publication_date,
        "dateModified" => $page_modified_date,
        "headline" => $page_title,
        "image" => $page_image,
        "articleBody" => $page_content,
        "articleSection" => $page_category,
        "speakable" => "main#content",
        "wordCount" => $page_word_count,
        "publisher" => $org,
        "mainEntityOfPage" => array(
            "@type" => "WebPage",
            "@id" => $page_url
        )
    );
    array_push($schema_types_array, $content_push);
}
if (in_array("Course", $content_types)) {
    $content_push = array(
        "@type" => "Course",
        "@id" => $page_url . '#course',
        "name" => $course_title,
        "description" => $course_description,
        "courseCode" => $course_code,
        "coursePrerequisites" => $course_prerequisite,
        "provider" => array(
            "@id" => $org_id
        ),
        "url" => $page_url
    );
    array_push($schema_types_array, $content_push);
}
if (in_array("Event", $content_types)) {
    $content_push = array(
        "@type" => "Event",
        "@id" => $page_url . '#event',
        "name" => $event_title,
        "url" => $page_url,
        "description" => $event_summary,
        "image" => $page_image,
        "location" => $event_location,
        "startDate" => $event_start,
        "endDate" => $event_end,
        "performer" => $event_presenter,
        "offers" => $event_tickets,
        "sponsor" => $event_sponsors
    );
    array_push($schema_types_array, $content_push);
}
if (in_array("Product", $content_types)) {
    $content_push = array(
        "@type" => "Product",
        "@id" => $page_url . '#product',
        "name" => $page_title,
        "url" => $page_url,
        "description" => $page_excerpt
    );
    array_push($schema_types_array, $content_push);
}
if (in_array("Review", $content_types)) {
    $content_push = array(
        "@type" => "Review",
        "@id" => $page_url . '#review',
        "name" => $page_title,
        "url" => $page_url,
        "description" => $page_excerpt_review,
        "author" => $page_author,
        "datePublished" => $page_publication_date,
        "inLanguage" => "en",
        "publisher" => $org,
        "itemReviewed" => $review_type
    );
    array_push($schema_types_array, $content_push);
}
if (in_array("Video", $content_types)) {
    $content_push = array(
        "@type" => "VideoObject",
        "@id" => $page_url . '#video',
        "name" => $page_title,
        "url" => $page_url,
        "description" => $page_excerpt,
        "thumbnailUrl" => $video_thumbnail,
        "duration" => $video_duration,
        "dateModified" => $page_modified_date,
        "datePublished" => $page_publication_date,
        "uploadDate" => $page_publication_date,
        "contentUrl" => $video_link,
        "embedUrl" => $video_link,
        "publisher" => $org
    );
    array_push($schema_types_array, $content_push);
}
$schemagraph = array(
    "@context" => "https://schema.org",
    "@graph" => $schema_types_array
);

echo '<script type="application/ld+json">';
echo json_encode($schemagraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
echo '</script>';

?>
