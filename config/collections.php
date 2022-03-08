<?php

$config['skylight_appname'] = 'collections';
$config['skylight_url_prefix'] = 'collections';

$config['skylight_theme'] = 'collections';

$config['skylight_fullname'] = 'Library and University Collections';

$config['skylight_adminemail'] = 'lddt@mlist.is.ed.ac.uk';

$config['skylight_oaipmhcollection'] = 'hdl_10683_4';


// Container ID and the field used in solr index to store this ID. Used for restricting search/browse scope.
$config['skylight_container_id'] = 'a7784e7b-782e-4852-b418-0431560bbc16';
$config['skylight_container_field'] = 'location.comm';

// Global CodeIgniter ENVIRONMENT variable is set in skylight/index.php
if (ENVIRONMENT == 'development') {
    $config['skylight_link_colls'] = array(
        '55da8679-0e59-473c-9c2f-41c69448ed0a'   => base_url() ."art/",
        '21f59b48-a294-4960-b926-e1f56d32d90b'  => base_url() ."mimed/",
        '7f32ba59-795e-40e8-b869-5b2a5114a4be'   => base_url() ."colllevel/",
        'dde7662b-e357-4a4a-8c14-4d08b858bfe9' => base_url() ."calendars/",
        '8b29daa7-16dd-4217-8366-5576cce3e79f'  => base_url() ."exhibitions/",
        '10b6ab37-9abc-4036-9f64-edfe4b4a984c' => base_url() ."public-art/",
        'e9122b44-420c-4247-9fe7-364214db5f94'  => base_url() ."iconics/",
        'bac433ed-36a9-4660-b49c-49d3fd0bed2c'  => base_url() ."stcecilias/",
        '89c89f7c-a883-443e-8bf4-431234e91d3e'  => base_url() ."speccoll/",
        'c7bc550e-8bb5-44aa-9ac3-128832466067' => base_url() ."cockburn/"
    );

    $config['skylight_link_titles'] = array(
        '55da8679-0e59-473c-9c2f-41c69448ed0a'  => "Art Collection",
        '21f59b48-a294-4960-b926-e1f56d32d90b'  => "MIMEd Collection",
        '7f32ba59-795e-40e8-b869-5b2a5114a4be'   => "a collection",
        'dde7662b-e357-4a4a-8c14-4d08b858bfe9'  => "Calendars",
        '8b29daa7-16dd-4217-8366-5576cce3e79f'  => "Exhibitions",
        '10b6ab37-9abc-4036-9f64-edfe4b4a984c'  => "Public Art Collection",
        'e9122b44-420c-4247-9fe7-364214db5f94'  => "Iconics Collection",        
        'bac433ed-36a9-4660-b49c-49d3fd0bed2c'  => "St Cecilia's Hall",
        '89c89f7c-a883-443e-8bf4-431234e91d3e'  => "Archives, Rare Books & Manuscripts",
        'c7bc550e-8bb5-44aa-9ac3-128832466067' => "Cockburn Collection"
    );
}
else{
    $config['skylight_link_colls'] = array(
        '55da8679-0e59-473c-9c2f-41c69448ed0a'   => base_url() ."art/",
        '21f59b48-a294-4960-b926-e1f56d32d90b'  => base_url() ."mimed/",
        '7f32ba59-795e-40e8-b869-5b2a5114a4be'   => base_url() ."colllevel/",
        'dde7662b-e357-4a4a-8c14-4d08b858bfe9' => base_url() ."calendars/",
        '8b29daa7-16dd-4217-8366-5576cce3e79f'  => base_url() ."exhibitions/",
        '10b6ab37-9abc-4036-9f64-edfe4b4a984c' => base_url() ."public-art/",
        'e9122b44-420c-4247-9fe7-364214db5f94'  => base_url() ."iconics/",
        'bac433ed-36a9-4660-b49c-49d3fd0bed2c'  => base_url() ."stcecilias/",
        '89c89f7c-a883-443e-8bf4-431234e91d3e'  => base_url() ."speccoll/",
        'c7bc550e-8bb5-44aa-9ac3-128832466067' => base_url() ."cockburn/"
    );

    $config['skylight_link_titles'] = array(
        '55da8679-0e59-473c-9c2f-41c69448ed0a'  => "Art Collection",
        '21f59b48-a294-4960-b926-e1f56d32d90b'  => "MIMEd Collection",
        '7f32ba59-795e-40e8-b869-5b2a5114a4be'   => "a collection",
        'dde7662b-e357-4a4a-8c14-4d08b858bfe9'  => "Calendars",
        '8b29daa7-16dd-4217-8366-5576cce3e79f'  => "Exhibitions",
        '10b6ab37-9abc-4036-9f64-edfe4b4a984c'  => "Public Art Collection",
        'e9122b44-420c-4247-9fe7-364214db5f94'  => "Iconics Collection",        
        'bac433ed-36a9-4660-b49c-49d3fd0bed2c'  => "St Cecilia's Hall",
        '89c89f7c-a883-443e-8bf4-431234e91d3e'  => "Archives, Rare Books & Manuscripts",
        'c7bc550e-8bb5-44aa-9ac3-128832466067' => "Cockburn Collection"
    );
}

$config['skylight_fields'] = array('Title' => 'dc.title.en',
    'Author' => 'dc.contributor.author.en',
    'Subject' => 'dc.subject.en',
    'Type' => 'dc.type.en',
    'Abstract' => 'dc.description.abstract',
    'Date' => 'dc.date.issued_dt',
    'Date Coverage'=> 'dc.coverage.temporal.en',
    'Bitstream'=> 'dc.format.original.en',
    'Thumbnail'=> 'dc.format.thumbnail.en',
    'Description'=>'dc.description.en',
    'ImageUri' => 'dc.identifier.imageUri.en',
    'OwningCollection' => 'location.coll',
    'Score' => 'float'
);

// HM 14/09/2020
// Date filtering broken in Skylight upgrade so disabling
//$config['skylight_date_filters'] = array('Date' => 'dateIssued.year_sort');
$config['skylight_date_filters'] = array();
$config['skylight_filters'] = array('Author' => 'author_filter', 'Subject' => 'subject_filter', 'Type' => 'type_filter');
$config['skylight_filter_delimiter'] = ':';

$config['skylight_meta_fields'] = array('Title' => 'dc.title.en',
    'Author' => 'dc.contributor.author',
    'Abstract' => 'dc.description.abstract',
    'Subject' => 'dc.subject.en',
    'Date' => 'dc.date.issued_dt',
    'Type' => 'dc.type.en',
    'Bitstream'=> 'dc.format.original',
    'Thumbnail'=> 'dc.format.thumbnail'
);

$config['skylight_recorddisplay'] = array('Title','Author','Subject','Type','Abstract');

$config['skylight_searchresult_display'] = array('Title','Author','Subject','Type','Abstract');

$config['skylight_search_fields'] = array('Keywords' => 'text',
    'Subject' => 'dc.subject.en',
    'Type' => 'dc.type.en',
    'Author' => 'dc.contributor.author'
);

$config['skylight_sort_fields'] = array('Title' => 'dc.title',
    'Date' => 'dc.date.issued_dt',
    'Author' => 'dc.contributor.author'
);

$config['skylight_feed_fields'] = array('Title' => 'Title',
    'Author' => 'Author',
    'Subject' => 'Subject',
    'Description' => 'Abstract',
    'Date' => 'Date');

$config['skylight_results_per_page'] = 40;
$config['skylight_share_buttons'] = false;

// $config['skylight_homepage_recentitems'] = false;

// Set to the number of minutes to cache pages for. Set to false for no caching.
// This overrides the setting in skylight.php so is commented by Demo
$config['skylight_cache'] = false;

// Digital object management
$config['skylight_display_thumbnail'] = true;
$config['skylight_link_bitstream'] = true;

// Display common image formats in "light box" gallery?
$config['skylight_lightbox'] = true;
$config['skylight_lightbox_mimes'] = array('image/jpeg', 'image/gif', 'image/png');

// Language and locale settings
$config['skylight_language_default'] = 'en';
$config['skylight_language_options'] = array('en', 'ko', 'jp');
$config['skylight_highlight_fields'] = 'dc.title.en,dc.contributor.author,dc.subject.en,lido.country.en,dc.description.en,dc.relation.ispartof.en';
$config['skylight_homepage_recentitems'] =false;

?>