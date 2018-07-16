<?php
global $post;
setup_postdata($post);

// Related Service for Services
$post_object = get_field('related_service');
$service_related = array();
if( $post_object ): $post = $post_object;setup_postdata( $post );
  $service_related = array(
    "@type" => "Service",
    "@id" => get_the_permalink(),
    "name" => get_the_title(),
    "url" => get_the_permalink(),
    "description" => get_the_excerpt(),
    "image" => get_the_post_thumbnail_url(),
    "serviceType" => get_field('service_type')
  );
wp_reset_postdata();
endif;

// Potential Actions for Services
$service_actions = array();
$service_actions_item = array();
if( have_rows('service_calls') ): while( have_rows('service_calls') ): the_row();
  $service_actions_item = array(
    "@type" => "CommunicateAction",
    "target" => array(
      "@type" => "EntryPoint",
      "name" => get_sub_field('button')['title'],
      "inLanguage" => "en-US",
      "urlTemplate" => get_sub_field('button')['url'],
      "actionPlatform" => array(
        "https://schema.org/DesktopWebPlatform",
        "https://schema.org/IOSPlatform",
        "https://schema.org/AndroidPlatform"
      )
    )
  );
  array_push($service_actions, $service_actions_item);
endwhile; endif;

// Service Specific Details for Services
$service_offer = array();
if( have_rows('service_details') ): while( have_rows('service_details') ): the_row();
  $service_offer = array(
    "@type" => "Offer",
    "itemOffered" => array(
      "@type" => "Service",
      "name" => get_the_title(),
      "description" => get_the_excerpt(),
      "url" => get_the_permalink(),
      "mainEntityOfPage" => get_the_permalink(),
      "image" => get_the_post_thumbnail_url(),
      "areaServed" => array(
        "@type" => "GeoCircle",
        "address" => array(
            "@id" => get_bloginfo('url') . '#address'
        ),
        "geoRadius" => get_sub_field('region') . ' Miles'
      )
    )
  );
endwhile; endif;


// Grab all the variables and toss them into an array
$service_landing_array = array(
    "@context" => "https://schema.org",
    "@type" => "Service",
    "@id" => get_the_permalink(),
    "name" => get_the_title(),
    "url" => get_the_permalink(),
    "description" => get_the_excerpt(),
    "audience" => get_field('service_audience'),
    "image" => get_the_post_thumbnail_url(),
    "mainEntityOfPage" => get_the_permalink(),
    "serviceType" => get_field('service_type'),
    "provider" => array(
      "@type" => "Organization",
      "name" => get_bloginfo('title'),
      "@id" => get_bloginfo('url')
    ),
    "isRelatedTo" => $service_related,
    "potentialAction" => $service_actions,
    "offers" => $service_offer

);

// Echo the @graph with JSON Encode: clean up slashes and unicode
echo '<script type="application/ld+json">';
echo json_encode($service_landing_array, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
echo '</script>';
?>
