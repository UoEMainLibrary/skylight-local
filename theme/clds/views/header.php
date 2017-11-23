<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">

    <meta name="description" content="The University of Edinburgh Collections">
    <meta name="author" content="The University of Edinburgh">
    <meta name="keywords" content="art, museums, rare books, exhibitions, collections, mimed, musical instruments, archives, st cecilia, iiif" />

    <base href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } ?>">

    <title><?php echo $page_title; ?></title>

    <link rel="pingback" href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } echo 'pingback'; ?>" />

    <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/apple-touch-icon.png">

    <!-- CSS: implied media="all" -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/style.css?v=2">
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/socialicon.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/secondmenu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/slide-text.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/search.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/locate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/picgallery.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/flowplayer-7.0.4/skin/skin.css">

    <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
    <script src="<?php echo base_url()?>assets/modernizr/modernizr-1.7.min.js"></script>
    <script src="<?php echo base_url()?>assets/jquery-1.11.0/jquery-1.11.0.min.js"></script>
    <script src="<?php echo base_url()?>assets/jquery-ui-1.10.4/ui/minified/jquery-ui.min.js"></script>
    <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/jquery-1.11.0/jcarousel/jquery.jcarousel.min.js"></script>
    <script src="<?php echo base_url()?>assets/google-analytics/analytics.js"></script>

    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','<?php echo base_url()?>assets/google-analytics/analytics.js','ga');
        ga('create', '<?php echo $ga_code ?>', 'auto');
        ga('send', 'pageview');
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

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <div id="collection-title">
                <a href="http://www.ed.ac.uk" class="navbar-brand logo" title="The University of Edinburgh Home" target="_blank"><img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/UoELogo.gif" /></a>
                <div id="navbar-word">
                    <a href="<?php echo base_url(); ?>" class="collectionslogo" title="University of Edinburgh Collections Home"></a>
                </div>
                <div id="navbar-smallword">
                    <a href="<?php echo base_url(); ?>" class="collectionswordsmall" title="University of Edinburgh Collections Home">Collections</a>
                </div>
            </div>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav" id="navbar-middle">
                <li><a href="#">HOME</a></li>
                <li><a href="http://collections.ed.ac.uk/about" target="_blank">ABOUT</a></li>
                <li><a href="http://collections.ed.ac.uk/feedback/" target="_blank">FEEDBACK</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right hidden-xs" id="navbar-right">
                <a href="https://www.facebook.com/crc.edinburgh" target="_blank" ><i id="social-fb" class="fa fa-facebook-square fa-3x social" aria-hidden="true"></i></a>
                <a href="https://twitter.com/CRC_EdUni" target="_blank"><i id="social-tw" class="fa fa-twitter-square fa-3x social" aria-hidden="true"></i></a>
                <a href="" target="_blank"><i id="social-fr" class="fa fa-flickr fa-3x social" aria-hidden="true"></i></a>
                <a href="http://libraryblogs.is.ed.ac.uk/" target="_blank"><i id="social-wp" class="fa fa-wordpress fa-3x social" aria-hidden="true"></i></a>
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="background-color: #FAEBD7;width: 100%;padding: 0;">
    <div class="sub-menu">
        <ul class="cldmenu" >
            <li class="current" ><a href="http://collections.ed.ac.uk/search/*/Type:%22archives%7C%7C%7CArchives%22/Header:%22archives%22?sort_by=cld.weighting_sort+desc,dc.title_sort+asc" data-hover="ARCHIVES">ARCHIVES</a></li>
            <li><a href="http://collections.ed.ac.uk/search/*/Type:%22rare+books|||Rare+Books%22/Header:%22rarebooks%22?sort_by=cld.weighting_sort+desc,dc.title_sort+asc" data-hover="RARE BOOKS">RARE BOOKS</a></li>
            <li><a href="http://collections.ed.ac.uk/search/*/Type:%22mimed%7C%7C%7CMIMEd%22/Header:%22mimed%22?sort_by=cld.weighting_sort+desc,dc.title_sort+asc" data-hover="MUSICAL INSTRUMENTS">MUSICAL INSTRUMENTS</a></li>
            <li><a href="http://collections.ed.ac.uk/search/*/Type:%22art%7C%7C%7CArt%22/Header:%22art%22?sort_by=cld.weighting_sort+desc,dc.title_sort+asc" data-hover="ART">ART</a></li>
            <li><a href="http://collections.ed.ac.uk/search/*/Type:%22museums%7C%7C%7CMuseums%22/Header:%22museums%22?sort_by=cld.weighting_sort+desc,dc.title_sort+asc" data-hover="MUSEUMS">MUSEUMS</a></li>
        </ul>
    </div>
</div>

