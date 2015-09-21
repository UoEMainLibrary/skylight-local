<?php

$config['skylight_appname'] = 'exhibitions';

// Uncomment this if you are using a url of the form http://.../art/...
//$config['skylight_url_prefix'] = 'exhibitions';

// set the base url and ga code
if (strpos($_SERVER['HTTP_HOST'], "test") !== false) {
    $config['base_url'] = 'https://test.exhibitions.ed.ac.uk/';
    $config['skylight_ga_code'] = 'UA-25737241-6';
}
else {
    $config['base_url'] = 'https://exhibitions.ed.ac.uk/';
    $config['skylight_ga_code'] = 'UA-25737241-8';
}

$config['skylight_theme'] = 'exhibitions';

$config['skylight_fullname'] = 'Library and University Collections Exhibitions';

$config['skylight_adminemail'] = 'is-crc@ed.ac.uk';

$config['skylight_oaipmhcollection'] = 'hdl_10683_23132';

$config['skylight_oaipmhallowed'] = true;

// Container ID and the field used in solr index to store this ID. Used for restricting search/browse scope.
$config['skylight_container_id'] = '17';
$config['skylight_container_field'] = 'location.coll';
$config['skylight_sitemap_type'] = 'external';


$config['skylight_fields'] = array('Title' => 'dc.title.en',
    'Creator' => 'dc.contributor.author.en',
    'Subject' => 'dc.subject.en',
    'Type' => 'dc.type.en',
    'Abstract' => 'dc.description.abstract',
    'Date Issued' => 'dc.date.issued_dt',
    'Date' => 'dc.coverage.temporal.en',
    'Bitstream'=> 'dc.format.original.en',
    'Thumbnail'=> 'dc.format.thumbnail.en',
    'Description'=>'dc.description.en',
    'Collection'=>'dc.relation.ispartof.en',
    'Rights' => 'dc.rights.en',
    'Link' => 'dc.identifier.uri.en',
    'Alternative' => 'dc.title.alternative.en',
    'Identifier' => 'dc.identifier.en',
    'Tags' => 'dc.subject.crowdsourced.en',
    'Exhibition' => 'dc.relation.ispartofexhibition.en'
);

$config['skylight_date_filters'] = array();
$config['skylight_filters'] = array('Exhibition' => 'exhibition_filter','Creator' => 'author_filter', 'Subject' => 'subject_filter', 'Type' => 'type_filter',  'Tags' => 'tags_filter' );
$config['skylight_filter_delimiter'] = ':';

$config['skylight_meta_fields'] = array('Title' => 'dc.title.en',
    'Creator' => 'dc.contributor.author.en',
    'Subject' => 'dc.subject.en',
    'Date' => 'dc.date.issued_dt',
    'Type' => 'dc.type.en',
    'Bitstream'=> 'dc.format.original',
    'Thumbnail'=> 'dc.format.thumbnail');

$config['skylight_recorddisplay'] = array('Title','Alternative','Creator','Exhibition','Subject','Type','Description','Date','Collection','Rights', 'Identifier');

$config['skylight_searchresult_display'] = array('Title','Creator','Subject','Type','Exhibition');

$config['skylight_search_fields'] = array(
    'Subject' => 'dc.subject.en',
    'Title' => 'dc.title.en',
    'Creator' => 'dc.contributor.author.en',
);

$config['skylight_related_fields'] = array('Exhibition' => 'dc.relation.ispartofexhibition.en', 'Subject' => 'dc.subject.en', 'Creator' => 'dc.contributor.author.en');

$config['skylight_sort_fields'] = array(
    'Creator' => 'dc.contributor.author_sort ', 'Title' => 'dc.title_sort'
);

$config['skylight_feed_fields'] = array('Title' => 'Title',
    'Creator' => 'Creator',
    'Subject' => 'Subject',
    'Description' => 'Abstract',
    'Date' => 'Date');

$config['skylight_results_per_page'] = 10;
$config['skylight_share_buttons'] = false;

$config['skylight_homepage_recentitems'] = false;

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
$config['skylight_highlight_fields'] = 'dc.title.en,dc.contributor.author.en,dc.subject.en,dc.description.en,dc.relation.ispartof.en';

?>