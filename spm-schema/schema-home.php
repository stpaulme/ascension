<?php

// Basic Organization Information
$global_name = get_bloginfo('name');
$global_description = get_field('global_description', 'option');
$global_url = get_bloginfo('url');
$global_email = get_field('global_email', 'option');
$global_fax = get_field('global_fax_number', 'option');
$global_phone = get_field('global_phone_number', 'option');
$logo = get_field('global_logo', 'option');
$photo = get_field('global_photo', 'option');
$global_location = array();
$global_address = array();
if( have_rows('global_location', 'option') ): while( have_rows('global_location', 'option') ): the_row();
  $global_address = array(
      "@type" => "PostalAddress",
      "@id" => get_bloginfo('url') . '#address',
      "streetAddress" => get_sub_field('global_address_street'),
      "addressLocality" => get_sub_field('global_address_city'),
      "addressRegion" => get_sub_field('global_address_state'),
      "postalCode" => get_sub_field('global_address_zip')
    );
  $global_location = array(
      "@type" => "Place",
      "name" => get_sub_field('global_location_name'),
      "address" => $global_address,
      "hasMap" => get_sub_field('global_map_link')
  );
endwhile; endif;


// $organization_options = get_field('global_options', 'option');
$contact_points=array();$address='';$area_served=array();$department=array();
if( have_rows('global_contact', 'option') ): while( have_rows('global_contact', 'option') ): the_row();
    if( have_rows('global_contact_points', 'option') ): while( have_rows('global_contact_points', 'option') ): the_row();
        $contact_point = array(
            "@type" => "ContactPoint",
            "name" => get_sub_field('name'),
            "email" => get_sub_field('email'),
            "telephone" => '+1' . get_sub_field('phone'),
            "areaServed" => "US",
            "availableLanguage" => get_sub_field('language'),
            "contactType" => get_sub_field('type'),
            "contactOption" => get_sub_field('options'),
            // "productSupported" => get_sub_field('service'),
        );
        array_push($contact_points, $contact_point);
    endwhile; endif;
    $area_served = array(
        "@type" => "GeoCircle",
        "address" => array(
            "@id" => get_bloginfo('url') . '#address'
        ),
        "geoRadius" => get_sub_field('global_contact_radius') . ' Miles'
    );
    if( have_rows('global_contact_departments', 'option') ): while( have_rows('global_contact_departments', 'option') ): the_row();
        if( have_rows('hours', 'option') ): while( have_rows('hours', 'option') ): the_row();
            $department_hours = array(
              "@type" => "OpeningHoursSpecification",
              "dayOfWeek" => get_sub_field('days'),
              "opens" => get_sub_field('opening'),
              "closes" => get_sub_field('closing')
            );
        endwhile; endif;
        if( have_rows('address', 'option') ): while( have_rows('address', 'option') ): the_row();
          $department_address = array(
            "@type" => "PostalAddress",
            "streetAddress" => get_sub_field('street'),
            "addressLocality" => get_sub_field('city'),
            "addressRegion" => get_sub_field('state'),
            "postalCode" => get_sub_field('zip')
          );
        endwhile; endif;
        $department = array(
            "@type" => get_sub_field('type'),
            "@id" => get_bloginfo('url') . '#department-' . get_sub_field('name'),
            "name" => get_sub_field('name'),
            "telephone" => get_sub_field('phone'),
            "email" => get_sub_field('email'),
            "url" => get_sub_field('url'),
            "image" => get_sub_field('image'),
            "openingHoursSpecification" => $department_hours,
            "address" => $department_address
        );
    endwhile; endif;
endwhile; endif;

// Global Reference
$tax_id='';$naics='';$duns='';$awards=array();$brands=array();
if( have_rows('global_reference', 'option') ): while( have_rows('global_reference', 'option') ): the_row();
    $tax_id = get_sub_field('global_ein');
    $naics = get_sub_field('global_naics');
    $duns = get_sub_field('global_duns');

    if( have_rows('global_awards', 'option') ): while( have_rows('global_awards', 'option') ): the_row();
        array_push($awards, get_sub_field('global_award_title'));
    endwhile; endif;

    if( have_rows('global_brands', 'option') ): while( have_rows('global_brands', 'option') ): the_row();
        $brand_logo = get_sub_field('logo');
        $brand_link = get_sub_field('url');
        $brand = array(
            "@type" => "Brand",
            "name" => get_sub_field('name'),
            "description" => get_sub_field('description'),
            "logo" => $brand_logo['url'],
            "url" => $brand_link
        );
        array_push($brands, $brand);
    endwhile; endif;
endwhile; endif;

// Global Social Media
$sameAs = array();
if( have_rows('global_social_media', 'option') ): while( have_rows('global_social_media', 'option') ): the_row();
    array_push($sameAs, get_sub_field('url'));
endwhile; endif;
array_push($sameAs, get_field('global_wikipedia', 'option'));
array_push($sameAs, get_field('global_podcast_link', 'option'));

// Global Hours
if( have_rows('global_hours', 'option') ): while( have_rows('global_hours', 'option') ): the_row();
    $global_hours = array(
        "@type" => "OpeningHoursSpecification",
        "dayOfWeek" => get_sub_field('days'),
        "opens" => get_sub_field('opening'),
        "closes" => get_sub_field('closing')
    );
endwhile; endif;

// Content Type - Potential Action !!! Don't forget this for organization


// Organization actions
$potential_actions = array();
if( have_rows('global_social_media', 'option') ): while( have_rows('global_social_media', 'option') ): the_row();
  $follow_action = array(
    "@type" => "FollowAction",
    "target" => array(
      "@type" => "EntryPoint",
      "urlTemplate" => get_sub_field('url'),
      "inLanguage" => 'en-US',
    ),
    "followee" => array(
      "@type" => "Organization",
      "id" => get_bloginfo('url')
    )
  );
  array_push($potential_actions, $follow_action);
endwhile; endif;
if (get_field('global_newsletter', 'option')) {
  $global_newsletter = get_field('global_newsletter', 'option');
  $subscribe_action = array(
    "@type" => "SubscribeAction",
    "name" => 'Subscribe to the ' . $global_name . ' Newsletter',
    "target" => array(
      "@type" => "EntryPoint",
      "urlTemplate" => $global_newsletter['url'],
      "inLanguage" => "en-US"
    ),
    "object" => array(
      "@type" => "Periodical",
      "name" => $global_name . 'Newsletter'
    )
  );
  array_push($potential_actions, $subscribe_action);
}

// if
//"hasOfferCatalog" =>
$services_catalog = array();
if (get_field('global_services', 'option')) {
  if( have_rows('services_options', 'option') ): while( have_rows('services_options', 'option') ): the_row();
    $services_catalog = array(
      "@type" => "OfferCatalog",
      "name" => get_sub_field('global_services_name_plural'),
      "url" => get_bloginfo('url') . '/' . get_sub_field('global_services_url') . '/'
    );
  endwhile;endif;
}

// if
//"employees" => $employees
if (get_field('global_directory', 'option')) {
  
}
// if
//"employees" => $employees
//"numberOfEmployees" =>

// if
//"events" =>

//if
//"aggregateRating" =>

// Grab all the variables and toss them into an array
$organization_push = array();$graph_array = array();
$organization_push = array(
    "@type" => "Organization",
    "@id" => get_bloginfo('url'),
    "name" => $global_name,
    "url" => $global_url,
    "description" => $global_description,
    "telephone" => $global_phone,
    "faxNumber" => $global_fax,
    "email" => $global_email,
    "taxID" => $tax_id,
    "naics" => $naics,
    "duns" => $duns,
    "sameAs" => $sameAs,
    "awards" => $awards,
    "brand" => $brands,
    "contactPoint" => $contact_points,
    "address" => $global_address,
    "areaServed" => $area_served,
    "department" => $department,
    "location" => $global_location,
    "logo" => $logo,
    "image" => $photo,
    "potentialAction" => $potential_actions,
    "hasOfferCatalog" => $services_catalog
);
array_push($graph_array, $organization_push);

// Website Actions
$website_actions = array();
$search_action = array(
  "@type" => "SearchAction",
  "target" => $global_url . '?s={search_term_string}',
  "query-input" => "required name=search_term_string"
);
// Push actions to potential action array
array_push($website_actions, $search_action);
$website_push = array(
  "@type" => "Website",
  "url" => $global_url,
  "potentialAction" => $website_actions
);
array_push($graph_array, $website_push);



// Grab that huge array and create an even deeper array using schema's @graph property
$schemagraph = array(
    "@context" => "https://schema.org",
    "@graph" => $graph_array
);
// Echo the @graph with JSON Encode: clean up slashes and unicode
echo '<script type="application/ld+json">';
echo json_encode($schemagraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
echo '</script>';
?>
