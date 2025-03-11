<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome-4.7.0/css/font-awesome.min.css">


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/ie10-viewport-bug-workaround.css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/socialicon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/secondmenu.css">
    <!--<link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/slide-text.css">-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/search.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/locate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/picgallery.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/style.css?v=2">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/flowplayer-7.0.4/skin/skin.css">

    <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
    <script src="<?php echo base_url()?>assets/modernizr/modernizr-1.7.min.js"></script>
    <script src="<?php echo base_url()?>assets/jquery-1.11.0/jquery-1.11.0.min.js"></script>
    <script src="<?php echo base_url()?>assets/jquery-ui-1.10.4/ui/minified/jquery-ui.min.js"></script>
    <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/jquery-1.11.0/jcarousel/jquery.jcarousel.min.js"></script>
    <script src="<?php echo base_url()?>assets/google-analytics/analytics.js"></script>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga_code ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '<?php echo $ga_code ?>');

    // global options

        if(typeof flowplayer !== 'undefined') {
            flowplayer.conf = {
                analytics: "<?php echo $ga_code ?>"
            };
        }
    </script>
    <!-- End Google Analytics -->

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

<script>
    function warnNewTab() {
      return confirm("This link will open in a new tab. Proceed?");
    }
  </script>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="skip-links">
            <a class="screen-reader-text" href="<?php echo current_url(); ?>#content">Skip to content</a>
        </div>
        <div class="navbar-header">
            <div id="collection-title">
                <a href="https://www.ed.ac.uk" class="navbar-brand logo" title="The University of Edinburgh Home" target="_blank"><img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/UoELogo.gif" alt="The University of Edinburgh Logo"/> <span class="sr-only">(opens in a new tab)</span> </a>
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
                <li><a href="#" title="University of Edinburgh Collections Home">Home</a></li>
                <li><a href="https://collections.ed.ac.uk/about" target="_blank" title="About Edinburgh University Collections">About <span class="sr-only">(opens in a new tab)</span></a></li>
                <li><a href="https://collections.ed.ac.uk/feedback/" target="_blank" title="Provide feedback">Feedback <span class="sr-only">(opens in a new tab)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right hidden-xs" id="navbar-right">
                <li><a href="https://www.facebook.com/crc.edinburgh" target="_blank" title="CRC Facebook Page" data-toggle="tooltip" data-trigger="focus"><i id="social-fb" class="fa fa-facebook-square fa-3x social" aria-hidden="true"></i> <span class="sr-only">(opens in a new tab)</span></a></li>
                <li><a href="https://twitter.com/CRC_EdUni" target="_blank" title="CRC Twitter Feed" data-toggle="tooltip" data-trigger="focus"><i id="social-tw" class="fa fa-twitter-square fa-3x social" aria-hidden="true"></i> <span class="sr-only">(opens in a new tab)</span></a></li>
                <li><a href="https://www.flickr.com/photos/crcedinburgh" target="_blank" title="CRC Flickr Page" data-toggle="tooltip" data-trigger="focus"><i id="social-fr" class="fa fa-flickr fa-3x social" aria-hidden="true"></i> <span class="sr-only">(opens in a new tab)</span></a></li>
                <li><a href="http://libraryblogs.is.ed.ac.uk/" target="_blank" title="University of Edinburgh Library Blogs" data-toggle="tooltip" data-trigger="focus"><i id="social-wp" class="fa fa-wordpress fa-3x social" aria-hidden="true"></i> <span class="sr-only">(opens in a new tab)</span></a></li>
            </ul>
        </div>
    </div>
</nav>

<div id="content" class="tab-heading">
    <div class="container">
        <ul class="cldmenu" >
            <li class="current" ><a href="https://collections.ed.ac.uk/search/*/Type:%22archives+%7C%7C%7C+Archives%22/Header:%22archives%22?sort_by=cld.weighting_sort+desc,dc.title_sort+asc" data-hover="ARCHIVES" title="Archive and Manuscript Collections">Archives</a></li>
            <li><a href="https://collections.ed.ac.uk/search/*/Type:%22rare+books+%7C%7C%7C+Rare+Books%22/Header:%22rarebooks%22?sort_by=cld.weighting_sort+desc,dc.title_sort+asc" data-hover="RARE BOOKS" title="Rare Book Collections">Rare Books</a></li>
            <li><a href="https://collections.ed.ac.uk/search/*/Type:%22mimed+%7C%7C%7C+MIMEd%22/Header:%22mimed%22?sort_by=cld.weighting_sort+desc,dc.title_sort+asc" data-hover="MUSICAL INSTRUMENTS" title="Musical Instrument Collections">Musical Instruments</a></li>
            <li><a href="https://collections.ed.ac.uk/search/*/Type:%22art+%7C%7C%7C+Art%22/Header:%22art%22?sort_by=cld.weighting_sort+desc,dc.title_sort+asc" data-hover="ART" title="Art Collections">Art</a></li>
            <li><a href="https://collections.ed.ac.uk/search/*/Type:%22museums+%7C%7C%7C+Museums%22/Header:%22museums%22?sort_by=cld.weighting_sort+desc,dc.title_sort+asc" data-hover="MUSEUMS" title="Museums">Museums</a></li>
        </ul>
    </div>
</div>
<div class="tab-heading">
    <div class="container">
        <!--h2 class="tab-h2"><a class="address" href="https://collections.ed.ac.uk/" target="_blank">COLLECTIONS.ED.AC.UK</a></h2-->
        <p class="tab-p">The University of Edinburgh's rare and unique collections catalogue online.</p>
        <div class="form-group hidden-xs">
            <form action="./redirect/" method="post">
                <div class="icon-addon addon-lg">
                    <div class="input-group-btn">
                        <input type="text" placeholder="Search the Collection Level Descriptions" class="form-control" name="q" id="q" >
                        <label class="glyphicon glyphicon-search" rel="tooltip"></label>
                        <input type="submit" name="submit_search" class="btn" value="Search" id="submit_search" title="Search the Collection Level Descriptions" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



