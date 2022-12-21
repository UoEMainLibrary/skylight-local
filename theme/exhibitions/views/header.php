<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <base href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } if ($this->config->item('skylight_url_prefix') != "") { echo $this->config->item('skylight_url_prefix'); echo '/'; } ?>">

        <title><?php echo $page_title; ?></title>

        <link rel="pingback" href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } echo 'pingback'; ?>" />

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="title" content="<?= $page_title ?>">

        <!-- Mobile viewport optimized: j.mp/bplateviewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/favicon.ico">
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/apple-touch-icon.png">

        <!-- CSS: implied media="all" -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/style.css?v=2">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/flowplayer-7.0.4/skin/skin.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">

        <!-- PARALLAX STYLES -->
        <!-- CSS FILES -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/parallax_styles.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/custom_styles.css">

        <!-- Uncomment if you are specifically targeting less enabled mobile browsers
        <link rel="stylesheet" media="handheld" href="css/handheld.css?v=2">  -->

        <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects--> 
        <script src="<?php echo base_url()?>assets/modernizr/modernizr-1.7.min.js"></script>
        <script src="<?php echo base_url()?>assets/jquery-1.11.0/jquery-1.11.0.min.js"></script>
        <script src="<?php echo base_url()?>assets/jquery-ui-1.10.4/ui/minified/jquery-ui.min.js"></script>
        <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/jquery-1.11.0/jcarousel/jquery.jcarousel.min.js"></script>
        <script src="http://www.google-analytics.com/analytics.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
        <script src="https://cdn.rawgit.com/mejackreed/Leaflet-IIIF/master/leaflet-iiif.js"></script>
        <script src="<?php echo base_url()?>assets/openseadragon/openseadragon.min.js"></script>

        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga_code ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '<?php echo $ga_code ?>');
        </script>
        <!-- End Google Analytics -->

        <script src="<?php echo base_url(); ?>assets/flowplayer-7.0.4/flowplayer.min.js"></script>

        <!-- global options -->
        <script>
            flowplayer.conf = {
                analytics: "<?php echo $ga_code ?>"
            };
        </script>

        <?php if (isset($solr)) { ?><link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
            <link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" />

            <?php

            foreach($metafields as $label => $element) {
                $field = "";
                if(isset($recorddisplay[$label])) {
                    $field = $recorddisplay[$label];
                    if(isset($solr[$field])) {
                        $values = $solr[$field];
                        foreach($values as $value) {
                            ?>  <meta name="<?php echo $element; ?>" content="<?php echo $value; ?>"> <?php
                        }
                    }
                }
            }

        } ?>

    </head>

    <body>

    <!-- HEADER DIV -->
    <div class="header"></div>

    <!-- CONDITION BLOCK TO DETERMINE HOW TO SERVE UP PARALLAX 'BACKGROUND' GAPS BASED ON URL -->
    <?php
    // Conditional to compare current and root url and serve up parallax styles accordingly
    $current_url = trim( "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}", "http");
    $base_string = trim(base_url(), "https");

    // IF ON LANDING/INDEX PAGE
    if ($current_url == $base_string) {
          
        echo 
        '
    <!-- PARALLAX WRAPPERS FOR BACKGROUND IMAGES -->
    <!-- Associated with the block before the gap appears -->

    <!-- WRAPPER FOR TOP PARALLAX IMAGE -->
    <div
        id="head-wrapper"
        class="parallax-image-wrapper"
        data-anchor-target="#page-gap"
        data-bottom-top="transform:translateY(200%)"
        data-top-bottom="transform:translateY(0)"
        alt="parallax background image wrapper"
        >
        <div
            class="parallax-image"
            style="background-image:url(' .  base_url() . 'theme/' . $this->config->item('skylight_theme') . '/images/background/library_entrance.jpg)"
            data-anchor-target="#page-gap"
            data-bottom-top="transform: translateY(-100%);"
            data-top-bottom="transform: translateY(50%);"
            alt="parallax background image"
            >
        </div>
    </div>

    <!-- WRAPPER FOR VISIT US PARALLAX IMAGE -->
    <div
        id="visit-block-wrapper"
        class="parallax-image-wrapper"
        data-anchor-target="#block-one + .gap"
        data-bottom-top="transform:translateY(200%)"
        data-top-bottom="transform:translateY(0)"
        alt="parallax background image wrapper"
        >
        <div
            class="parallax-image"
            style="background-image:url(' .  base_url() . 'theme/' . $this->config->item('skylight_theme') . '/images/background/visit_us.png)"
            data-anchor-target="#block-one + .gap"
            data-bottom-top="transform: translateY(-80%);"
            data-top-bottom="transform: translateY(80%);"
            alt="parallax background image"
            >
        </div>
    </div>

    <!-- WRAPPER FOR EXHIBITIONS PARALLAX IMAGE -->
    <div
        id="exhibitions-block-wrapper"
        class="parallax-image-wrapper"
        data-anchor-target="#block-two + .gap"
        data-bottom-top="transform:translateY(200%)"
        data-top-bottom="transform:translateY(0)"
        alt="parallax background image wrapper"
        >
        <div
            class="parallax-image"
            style="background-image:url(' .  base_url() . 'theme/' . $this->config->item('skylight_theme') . '/images/background/current_exhibition.jpg)"
            data-anchor-target="#block-two + .gap"
            data-bottom-top="transform: translateY(-80%);"
            data-top-bottom="transform: translateY(80%);"
            alt="parallax background image"
            >
        </div>
    </div>

    <!--  WRAPPER FOR EVENTS PARALLAX IMAGE -->
    <div
        id="events-block-wrapper"
        class="parallax-image-wrapper"
        data-anchor-target="#block-three + .gap"
        data-bottom-top="transform:translateY(200%)"
        data-top-bottom="transform:translateY(0)"
        alt="parallax background image wrapper"
        >
        <div
            class="parallax-image"
            style="background-image:url(' .  base_url() . 'theme/' . $this->config->item('skylight_theme') . '/images/background/events.jpg)"
            data-anchor-target="#block-three + .gap"
            data-bottom-top="transform: translateY(-80%);"
            data-top-bottom="transform: translateY(80%);"
            alt="parallax background image"
            >
        </div>
    </div>

    <!--  WRAPPER FOR SUPPORT US PARALLAX IMAGE -->
    <div
        id="support-block-wrapper"
        class="parallax-image-wrapper"
        data-anchor-target="#block-four + .gap"
        data-bottom-top="transform:translateY(200%)"
        data-top-bottom="transform:translateY(0)"
        alt="parallax background image wrapper"
        >
        <div
            class="parallax-image"
            style="background-image:url(' .  base_url() . 'theme/' . $this->config->item('skylight_theme') . '/images/background/support.jpg)"
            data-anchor-target="#block-four + .gap"
            data-bottom-top="transform: translateY(-80%);"
            data-top-bottom="transform: translateY(80%);"
            alt="parallax background image"
            >
        </div>
    </div>'
        
        ;
    }

    // IF ON PAGES RELATING TO LIBRARY EVENTS
    elseif (strpos("http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}", 'event') !== false ){
        echo '
        <div id="container">

            <!-- WRAPPER FOR TOP PARALLAX IMAGE -->
            <div
                id="head-wrapper"
                class="parallax-image-wrapper"
                data-anchor-target="#page-gap"
                data-bottom-top="transform:translateY(200%)"
                data-top-bottom="transform:translateY(0)"
                alt="parallax background image wrapper"
                >
                <div
                    class="parallax-image"
                    style="background-image:url(' .  base_url() . 'theme/' . $this->config->item('skylight_theme') . '/images/background/events-list.jpg)"
                    data-anchor-target="#page-gap"
                    data-bottom-top="transform: translateY(-100%);"
                    data-top-bottom="transform: translateY(50%);"
                    alt="parallax background image"
                    >
                </div>
            </div>
                <header id="page-gap" class="gap">

                <!-- EVENTS NAVIGATION BAR -->

                <!-- MAIN UNIVERSITY LOGO -->
                <div id="non-index" class="logo-container">
                    <a href="' . base_url() . '" title="Link back to Library Exhibitions home page">
                        <img src="' . base_url() . 'theme/' . $this->config->item('skylight_theme') . '/images/logos/uofe_logo.png" alt="University of Edinburgh Logo">
                    </a>
                </div>

                <!-- SEARCH FORM -->
                <div class="nav-search">
                    <div id="collection-search">
                        <form action="./redirect/" method="post">
                            <fieldset class="search">
                                <input type="text" name="q" value=" spellcheck="true"'; 
                                if (isset($searchbox_query)){echo urldecode($searchbox_query);}
                                echo '" id="q" />
                                <a id="info-gap" alt="Submit search" title="Click to submit search">
                                    <button type="submit" id="submit_search" class="search-button">
                                        <p>Search</p>
                                    </button>
                                </a>
                                <!--<input type="submit" name="submit_search" class="btn" value="Search" id="submit_search" />-->
                            </fieldset>
                        </form>
                    </div>

                    <!-- NAVIGATION LINKS -->
                    <div class="nav-adv-search">
                        <div id="adv-search">
                            <a class="nav-link" href="./advanced" alt="navigation link" title="Link to advanced search page">Advanced search</a>
                        </div>
                    </div>
                    <div class="nav-adv-search">
                        <div id="adv-search">
                            <a class="nav-link" href="./events" alt="navigation link" title="Link to upcoming events list">Upcoming Events</a>
                        </div>
                    </div>
                </div>

                <div class="block-title">
                    <h1  class="block-title-head">Library Events</h1>    
                </div>
                </header>

                ';

    }

    // ALL OTHER PAGES
    else { echo '
        <div id="container">

            <!-- WRAPPER FOR TOP PARALLAX IMAGE -->
            <div
                id="head-wrapper"
                class="parallax-image-wrapper"
                data-anchor-target="#page-gap"
                data-bottom-top="transform:translateY(200%)"
                data-top-bottom="transform:translateY(0)"
                alt="parallax background image wrapper"
                >
                <div
                    class="parallax-image"
                    style="background-image:url(' .  base_url() . 'theme/' . $this->config->item('skylight_theme') . '/images/background/library_entrance.jpg)"
                    data-anchor-target="#page-gap"
                    data-bottom-top="transform: translateY(-100%);"
                    data-top-bottom="transform: translateY(50%);"
                    alt="parallax background image"
                    >
                </div>
            </div>
                <header id="page-gap" class="gap">

                <!-- EXHIBITIONS NAVIGATION BAR -->

                <!-- MAIN UNIVERSITY LOGO -->
                <div id="non-index" class="logo-container">
                    <a href="' . base_url() . '" title="Link back to Library Exhibitions home page">
                        <img src="' . base_url() . 'theme/' . $this->config->item('skylight_theme') . '/images/logos/uofe_logo.png" alt="University of Edinburgh Logo">
                    </a>
                </div>

                <!-- SEARCH FORM -->
                <div class="nav-search">
                    <div id="collection-search">
                        <form action="./redirect/" method="post">
                            <fieldset class="search">
                                <input type="text" name="q" value=" spellcheck="true"'; 
                                if (isset($searchbox_query)){echo urldecode($searchbox_query);}
                                echo '" id="q" />
                                <a id="info-gap" alt="Submit search" title="Click to submit search">
                                    <button type="submit" id="submit_search" class="search-button">
                                        <p>Search</p>
                                    </button>
                                </a>
                                <!--<input type="submit" name="submit_search" class="btn" value="Search" id="submit_search" />-->
                            </fieldset>
                        </form>
                    </div>

                    <!-- NAVIGATION LINKS -->
                    <div class="nav-adv-search">
                        <div id="adv-search">
                            <a class="nav-link" href="./advanced" alt="navigation link" title="Link to advanced search page">Advanced search</a>
                        </div>
                    </div>
                    <div class="nav-adv-search">
                        <div id="adv-search">
                            <a class="nav-link" href="./past" alt="navigation link" title="Link to past exhibitions list">Past Exhibitions</a>
                        </div>
                    </div>
                    <div class="nav-adv-search">
                        <div id="adv-search">
                            <a class="nav-link" href="./search" alt="navigation link" title="Link to view all the items from all collections">View All Items</a>
                        </div>
                    </div>
                </div>

                <div class="block-title">
                    <h1  class="block-title-head">Library Exhibitions</h1>
                </div>
                </header>

                ';
    }
        
