<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8">

    <base href="<?php echo base_url() . index_page();
    if (index_page() !== '') {
        echo '/';
    }
    echo $this->config->item('skylight_url_prefix');
    echo '/' ?>">

    <title><?php echo $page_title; ?></title>

    <link rel="pingback" href="<?php echo base_url() . index_page();
    if (index_page() !== '') {
        echo '/';
    }
    echo 'pingback'; ?>" />

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
    Remove this if you use the .htaccess -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="title" content="<?= str_replace('"', '&quot;', $page_title); ?>">

    <!-- Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
    <link rel="shortcut icon"
        href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/favicon.ico">
    <link rel="apple-touch-icon"
        href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/apple-touch-icon.png">

    <!-- CSS: implied media="all" -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fancybox/source/jquery.fancybox.css?v=2.1.4"
        type="text/css" media="screen" />
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5"
        type="text/css" media="screen" />
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7"
        type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/flowplayer-7.0.4/skin/skin.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" type="text/css" media="screen">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/style.css?v=2">
        
    <!-- Uncomment if you are specifically targeting less enabled mobile browsers
    <link rel="stylesheet" media="handheld" href="css/handheld.css?v=2">  -->

    <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
    <script src="<?php echo base_url() ?>assets/modernizr/modernizr-1.7.min.js"></script>
    <script src="<?php echo base_url() ?>assets/jquery-1.11.0/jquery-1.11.0.min.js"></script>
    <script src="<?php echo base_url() ?>assets/jquery-ui-1.10.4/ui/minified/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/jquery-1.11.0/jcarousel/jquery.jcarousel.min.js"></script>
    <script src="<?php echo base_url() ?>assets/google-analytics/analytics.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
    <script src="https://cdn.rawgit.com/mejackreed/Leaflet-IIIF/master/leaflet-iiif.js"></script>
    <script src="<?php echo base_url() ?>assets/openseadragon/openseadragon.min.js"></script>
    <!--<script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.js"></script>-->

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga_code ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
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

    <?php if (isset($solr)) { ?>
        <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
        <link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" />

        <?php

        foreach ($metafields as $label => $element) {
            $field = "";
            if (isset($recorddisplay[$label])) {
                $field = $recorddisplay[$label];
                if (isset($solr[$field])) {
                    $values = $solr[$field];
                    foreach ($values as $value) {
                        ?>
                        <meta name="<?php echo $element; ?>" content="<?php echo $value; ?>"> <?php
                    }
                }
            }
        }
    } ?>

</head>

<body>
    <div id="container">
        <div class="skip-links">
            <a class="screen-reader-text" href="<?php echo current_url(); ?>#main">Skip to content</a>
        </div>
        <header>
            <div id="collection-title">
                <div class="logo-title-group">
                    <a href="https://www.ed.ac.uk" class="uoelogo" title="The University of Edinburgh Homepage Link"
                        target="_blank"><span class="visually-hidden"> (opens in a new tab)</span></a>
                    <a href="<?php echo base_url(); ?>mimed" class="mimedlogo"
                        title="Musical Instrument Museums Edinburgh Home"></a>
                </div>
                <a href="http://www.stcecilias.ed.ac.uk/" class="menulogo" title="St Cecilia's Hall Link"
                    target="_blank"><span class="visually-hidden"> (opens in a new tab)</span></a>
            </div>
            <div id="collection-search">
                <form action="./redirect/" method="post">
                    <fieldset class="search">
                        <input type="text" name="q" aria-label="Website searchbox"
                            value="<?php if (isset($searchbox_query))
                                echo urldecode($searchbox_query); ?>" id="q" />
                        <input type="submit" name="submit_search" class="btn" value="Search" id="submit_search" aria-label="Submit search button"/>
                        <a href="./advanced" class="advanced">Advanced<br>Search</a>
                    </fieldset>
                </form>
            </div>
        </header>

        <div id="main" role="main" class="clearfix">