<?php

    $config['skylight_appname'] = 'cockburn';

    $config['skylight_theme'] = 'rocks';

    // Uncomment this if you are using a url of the form http://.../art/...
    $config['skylight_url_prefix'] = 'cockburn';

    $config['skylight_fullname'] = 'Cockburn Collection';

    $config['skylight_adminemail'] = 'lddt@mlist.is.ed.ac.uk';

    $config['skylight_oaipmhcollection'] = 'hdl_10683_19104';

    // Container ID and the field used in solr index to store this ID. Used for restricting search/browse scope.
    if (ENVIRONMENT == 'development')
    {
        $config['skylight_container_id'] = 'c7bc550e-8bb5-44aa-9ac3-128832466067';
        $config['skylight_ga_code'] = 'G-8VP4HF0K5M';
    }
    else {
        $config['skylight_container_id'] = 'dbf9e7d0-e031-4ed1-bfe5-30d5b450903f';
        $config['skylight_ga_code'] = 'G-9JWTY9TLXS';
    }

    $config['skylight_container_field'] = 'location.coll';

    $config['skylight_fields'] = array('Title' => 'dc.title.en',
                                        'Author' => 'dc.contributor.author.en',
                                        'Subject' => 'dc.subject.en',
                                        'Type' => 'dc.type.en',
                                        'Abstract' => 'dc.description.abstract.en',
                                        'Measurements' => 'dc.format.extent.en',
                                        'Description' => 'dc.description.en',
                                        'Labels' => 'dc.description.inscription.en',
                                        'Other context' => 'dc.description.level1.en',
                                        'Related document' => 'dc.relation.relateddocument.en',
                                        //trying to recreate mimed's treatment of place
                                        'Place' => 'dc.coverage.spatial.en',
                                        'Place Certainty' => 'dc.coverage.spatialrole.en',
                                        'Date' => 'dc.date.issued',
                                        'Accession Number' => 'dc.identifier.en',
                                        'Accession Date' => 'dc.date.accessioned_dt',
                                        'Bitstream'=> 'dc.format.original.en',
                                        'Thumbnail'=> 'dc.format.thumbnail.en',
                                        'ImageUri' => 'dc.identifier.imageUri.en',
                                        'ArchivesSpace Number' => 'dc.identifier.archive'
                                        );

    $config['skylight_date_filters'] = array();
    //added place to filter
    $config['skylight_filters'] = array('Author' => 'author_filter', 'Type' => 'type_filter', 'Place' => 'place_filter', 'Date' => 'date_filter');
    $config['skylight_filter_delimiter'] = ':';

    $config['skylight_meta_fields'] = array('Title' => 'dc.title',
                                              'Author' => 'dc.contributor.author',
                                              'Description' => 'dc.description.en',
                                              'Subject' => 'dc.subject.en',
                                              'Date' => 'dc.date.issued',
                                              'Type' => 'dc.type.en');
//added accession number to display
    $config['skylight_recorddisplay'] = array('Title','Author','Subject','Type','Place', 'Place Certainty','Measurements','Labels','Description','Other context','Related document','Accession Number');
    $config['skylight_searchresult_display'] = array('Title','Author','Subject','Type','Abstract');

    $config['skylight_search_fields'] = array('Title' => 'dc.title.en',
                                                'Subject' => 'dc.subject.en',
                                                'Type' => 'dc.type.en',
                                                //mimed place copying
                                                'Place' => 'dc.coverage.spatial',
                                                'Author' => 'dc.contributor.author',
                                                'Accession Number' => 'dc.identifier.en'
                                                  );

    $config['skylight_sort_fields'] = array('Title' => 'title_sort');

    $config['skylight_feed_fields'] = array('Title' => 'Title',
                                            'Author' => 'Author',
                                            'Subject' => 'Subject',
                                            'Description' => 'Abstract',
                                            'Date' => 'Date');

    $config['skylight_results_per_page'] = 10;
    $config['skylight_share_buttons'] = false;

    //related items
    $config['skylight_related_fields'] = array('Artist' => 'dc.contributor.authorfull.en', 'Subject' => 'dc.subject.en', 'Type' => 'dc.type.en');
    $config['skylight_related_number'] = 5;

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
    $config['skylight_highlight_fields'] = 'dc.title.en,dc.contributor.author,dc.subject.en,dc.description.en,dc.relation.ispartof.en';

?>