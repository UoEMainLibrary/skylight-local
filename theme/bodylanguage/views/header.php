<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <base href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } echo $this->config->item('skylight_url_prefix'); echo '/' ?>">

        <title><?php echo $page_title; ?></title>

        <link rel="pingback" href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } echo 'pingback'; ?>" />

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>University of Edinburgh <?php echo $this->config->item('skylight_fullname');?></title>

        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="title" content="<?php echo $page_title; ?>">

        <!-- Mobile viewport optimized: j.mp/bplateviewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/favicon.ico">
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/apple-touch-icon.png">

        <!-- CSS: implied media="all" -->
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Metrophobic" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/style.css?v=2">
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/bodylanguage.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/flowplayer-7.0.4/skin/skin.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.min.css">

        <!-- Uncomment if you are specifically targeting less enabled mobile browsers
        <link rel="stylesheet" media="handheld" href="css/handheld.css?v=2">  -->

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
        <div id="container">
            <header>
                <nav id="menu">
                    <ul class="menu-links">
                        <li><a href="./about" title="About Link">About</a></li>
                        <li><a href="./catalogue" title="Catalogues Link">Catalogue</a></li>
                        <li><a href="./people" title="People Link">People</a></li>
                        <li><a href="./contact" title="Contact Us Link">Contact Us</a></li>

                        <li><a href="<?php echo base_url(); ?>bodylanguage"  title="<?php echo $this->config->item('skylight_fullname');?> Home" title="Home Link">Home</a></li>
                    </ul>
                </nav>

                    <a href="<?php echo base_url(); ?>bodylanguage"  title="<?php echo $this->config->item('skylight_fullname');?> Home">
                        <div id="collection-title">
                            <!--<img src="../theme-local/bodylanguage/images/bodylanguage-logo-1.jpg">-->
                        </div>
                    </a>


                    
                <div class="clearfix"></div>

                <h3 class="site-tag">An online portal to collections of movement, dance and physical education archives in Scotland, 1890-1990</h3>


                <div class="quick-links">
                        <ul>
                            <li>
                                <a class="quick-link" href="./about#project-anchor">About the Project</a>
                            </li>
                            <li>
                                <a class="quick-link" href="./catalogue">View the Catalogue</a>
                            </li>
                            <li>
                                <a class="quick-link" href="./people">Meet the People</a>
                            </li>
                        </ul>
                    </div>

            </header>

        <?php if (strpos($_SERVER['REQUEST_URI'], "bodylanguage/feedback") !== false){
            echo '<div id="main-feedback" role="main" class="clearfix">'; 
        }
        else {
            echo '<div id="main" role="main" class="clearfix">';
        }?>