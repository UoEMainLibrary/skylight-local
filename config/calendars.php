<?php

$config['skylight_appname'] = 'calendars';

$config['skylight_theme'] = 'calendars';

// Uncomment this if you are using a url of the form http://.../art/...
$config['skylight_url_prefix'] = 'calendars';

$config['skylight_fullname'] = 'University of Edinburgh Calendars';

$config['skylight_adminemail'] = 'HeritageCollections@ed.ac.uk';

$config['skylight_oaipmhcollection'] = 'hdl_10683_19396';

$config['skylight_oaipmhallowed'] = true;

// Global CodeIgniter ENVIRONMENT variable is set in skylight/index.php
// Container ID and the field used in solr index to store this ID. Used for restricting search/browse scope.
if (ENVIRONMENT == 'development') {
	$config['skylight_container_id'] = 'dde7662b-e357-4a4a-8c14-4d08b858bfe9';
    $config['skylight_ga_code'] = 'G-8VP4HF0K5M';
}
else {
	$config['skylight_container_id'] = '4e5e82a5-c06c-4844-bc65-c6aef272f646';
    $config['skylight_ga_code'] = 'G-L20JS09H7H';
}

$config['skylight_container_field'] = 'location.coll';
$config['skylight_sitemap_type'] = 'internal';

$config['skylight_fields'] = array('Title' => 'dc.title.en',
    'Calendar Month' => 'dc.title.alternative.en',
    'Creator' => 'dc.contributor.author.en',
    'Reference' => 'dc.identifier.other',
    'Link' => 'dc.identifier.uri',
    'Subject' => 'dc.subject.en',
    'Type' => 'dc.type.en',
    'Date' => 'dc.coverage.temporal',
    'Bitstream'=> 'dc.format.original.en',
    'Thumbnail'=> 'dc.format.thumbnail.en',
    'Description'=>'dc.description.en',
    'Format' => 'dc.format.en',
    'Year'=> 'dc.date.issued',
    'Shelf Mark' => 'dc.identifier.other'
);

$config['skylight_schema_links'] = array(
      'Title'=>'name',
      'Calendar Month'=>'alternateName',
      'Creator'=>'creator',
      'Link'=>'url',
      //'Subject'=>'Collection',
      'Date'=>'temporalCoverage',
      'Thumbnail'=>'thumbnailUrl',
      'Description'=>'description',
      'Year'=>'alternativeName',
      'Shelf Mark'=>'identifier'
);

// HM 14/09/2020
// Date filtering broken in Skylight upgrade so disabling
//$config['skylight_date_filters'] = array('Date' => 'dateIssued.year_sort');
$config['skylight_date_filters'] = array();
$config['skylight_filters'] = array('Subject' => 'subject_filter');

$config['skylight_filter_delimiter'] = ':';

$config['skylight_meta_fields'] = array('Title' => 'dc.title',
    'Subject' => 'dc.subject',
    'Type' => 'dc.type',
);

$config['skylight_recorddisplay'] = array('Title','Creator','Date','Format','Subject','Calendar Month','Description','Shelf Mark');

$config['skylight_searchresult_display'] = array('Title','Subject','Type','Origin', 'Bitstream', 'Thumbnail');

$config['skylight_search_fields'] = array(
    'Subject' => 'dc.subject',
    'Type' => 'dc.type',
    'Creator' => 'dc.contributor.author',
);

$config['skylight_related_fields'] = array('Subject' => 'dc.subject.en');

$config['skylight_sort_fields'] = array('Title' => 'dc.title_sort',
    'Subject' => 'dc.subject_sort'
);
$config['skylight_default_sort'] = 'dc.title_sort+asc';

$config['skylight_feed_fields'] = array('Title' => 'Title',
    'Subject' => 'Subject',
    'Origin' => 'Origin',
    'Identifier' => 'Identifier');

$config['skylight_results_per_page'] = 15;
$config['skylight_share_buttons'] = false;

// $config['skylight_homepage_recentitems'] = false;

// Set to the number of minutes to cache pages for. Set to false for no caching.
// This overrides the setting in skylight.php so is commented by default
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
$config['skylight_highlight_fields'] = 'dc.title.en,dc.creator,dc.subject.en,dc.description.en';

$config['skylight_homepage_recentitems'] = false;
$config['skylight_homepage_fullwidth'] = false;

?>
