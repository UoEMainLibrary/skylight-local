<?php

    $title_field = $this->skylight_utilities->getField('Title');
    $author_field = $this->skylight_utilities->getField('Author');
    $shelfmark_field =  $this->skylight_utilities->getField('Shelfmark');
    $date_field = $this->skylight_utilities->getField('Date Made');
    $bitstream_field = $this->skylight_utilities->getField('Bitstream');
    $thumbnail_field = $this->skylight_utilities->getField('Thumbnail');
    $filters = array_keys($this->config->item("skylight_filters"));
    $placedisplay = $this->config->item("skylight_placedisplay");
    $measurementdisplay = $this->config->item("skylight_measurementdisplay");
    $associationdisplay = $this->config->item("skylight_associationdisplay");
    $locationdisplay = $this->config->item("skylight_locationdisplay");
    $datedisplay = $this->config->item("skylight_datedisplay");
    $identificationdisplay = $this->config->item("skylight_identificationdisplay");
    $descriptiondatadisplay = $this->config->item("skylight_descriptiondatadisplay");
    $typedisplay = $this->config->item("skylight_typedisplay");
    $link_uri_field = $this->skylight_utilities->getField("ImageURI");
    $short_field = $this->skylight_utilities->getField("Short Description");
    $date_field = $this->skylight_utilities->getField("Date");
    $media_uri = $this->config->item("skylight_media_url_prefix");
    $theme = $this->config->item("skylight_theme");
    $acc_no_field = $this->skylight_utilities->getField("Accession Number");
    $manifest_field =  $this->skylight_utilities->getField("Manifest");
    $manifest_endpoint = $this->config->item("skylight_manifest_endpoint");

    $type = 'Unknown';
    $mainImageTest = false;
    $numThumbnails = 0;
    $bitstreamLinks = array();
    $image_id = "";

    // booleans for video/audio
    $mainImage = false;
    $videoFile = false;
    $audioFile = false;
    $audioLink = "";
    $videoLink = "";


            if ((strpos($solr[$shelfmark_field][0], 'ADO') !== false))
            {

                $manifest = $manifest_endpoint.$solr[$manifest_field][0].'/manifest';

                $json = file_get_contents($manifest);
                $jobj = json_decode($json, true);
                $error = json_last_error();

                $linkURI = $jobj['related'];
                $linkURI = str_replace('detail', 'iiif', $linkURI);
                $linkURI = $linkURI.'/full/!300,300/0/default.jpg';

                $jsonLink = '<span class ="json-link-item"><a href="https://librarylabs.ed.ac.uk/iiif/uv/?manifest=' . $manifest . '" target="_blank" class="uvlogo" title="View in UV"></a></span>';
                $jsonLink .= '<span class ="json-link-item"><a target="_blank" title="View in Mirador" href="https://librarylabs.ed.ac.uk/iiif/mirador/?manifest='.$manifest.'" class="miradorlogo"></a></span>';
                //  $jsonLink .= '<span class ="json-link-item"><a href="https://images.is.ed.ac.uk/luna/servlet/view/search?search=SUBMIT&q=' . $accno . '" class="lunalogo" title="View in LUNA"></a></span>';
                $jsonLink .= '<span class ="json-link-item"><a href="' . $manifest . '" target="_blank"  class="iiiflogo" title="IIIF manifest"></a></span>';
                //$jsonLink .= '<span class ="json-link-item"><a href = "https://creativecommons.org/licenses/by/3.0/" class ="ccbylogo" title="All images CC-BY" target="_blank" ></a></span>';
                $hasprimo = '';
                $hasalma ='';
                $catalogue_link = '';
                foreach ( $jobj['sequences'][0]['canvases'][0]['metadata']as $metadatapair) {
                    $label = $metadatapair['label'];
                    $value = $metadatapair['value'];

                    if (strpos($value, "discovered") !== false) {
                        $value = str_replace("<span>", "", $value);
                        $value = str_replace("</span>", "", $value);
                        $primourl = $value;
                        $hasprimo = 'Y';

                    }

                    if ($label == 'Catalogue Number') {
                        $value = str_replace("<span>", "", $value);
                        $value = str_replace("</span>", "", $value);
                        $almaurl = "https://open-na.hosted.exlibrisgroup.com/alma/44UOE_INST/bibs/" . $value;

                        $hasalma = 'Y';
                    }

                    echo '<!--'.$label.'-->';
                    if ($label == 'Catalogue Entry' || $label == 'Catalogue Link') {

                        echo "<!--in here with ".$value."-->";
                        $value = str_replace("<span>", "", $value);
                        $value = str_replace("</span>", "", $value);

                        if ($value !== 'N/A') {
                            $catalogue_link = '<h3><a  class ="cat-link"href="' . $value . '" target = "_blank">Visit the catalogue entry  in Archives Space</a></h3>';
                        }
                    }
                }

                ?>


                <?php


                foreach($recorddisplay as $key)
                {
                    $element = $this->skylight_utilities->getField($key);

                    if(isset($solr[$element]))
                    {
                        foreach($solr[$element] as $index => $metadatavalue)
                        {
                            // if it's a facet search
                            // make it a clickable search link

                            if($key == 'Date') {
                                $date = $metadatavalue;
                            }
                            if (!(isset($date))){
                                $date = 'Undated';
                            }
                            if($key == 'Author') {
                                $maker = $metadatavalue;
                            }
                            if (!(isset($maker))){
                                $maker = 'Unknown author';
                            }
                            if($key == 'Title') {
                                $title = $metadatavalue;
                            }
                            if (!(isset($title))){
                                $title = 'Unnamed item';
                            }

                            if($key == 'Shelfmark') {
                                $date = $metadatavalue;
                            }
                        }
                    }
                }

                ?>

                <div id="stc-section1" class="container-fluid record-content">
                    <h2 class="itemtitle hidden-sm hidden-xs"><?php echo $title .' | '. $maker. ' | '.$date;?></h2>
                    <h4 class="itemtitle hidden-lg hidden-md"><?php echo $title .' | '. $maker. ' | '.$date;?></h4>
                </div>

                <div id="stc-section2" class="container-fluid">
                    <?php
                    if (isset($jsonLink)) {

                        $viewlink = '<div class="uv-cell"><div class="uv-fill"><iframe class ="uv-sizer" allowfullscreen="true" src="https://librarylabs.ed.ac.uk/iiif/uv/?manifest='.$manifest.'" ></iframe></div></div>';

                        echo $viewlink;
                    }
                    ?>
                    <div class = "json-link">
                        <p>
                            <?php if (isset($jsonLink)){echo $jsonLink;} ?>
                        </p>
                    </div>
                </div>

                <div id="stc-section5" class="panel panel-default container-fluid">


                    <?php
                    echo '<!--'.$catalogue_link.'-->';

                    if ($catalogue_link !== '' and $catalogue_link !== 'N/A')
                    {
                        echo $catalogue_link;
                    }
                    if ($hasalma == 'Y' or $hasprimo == 'Y') {


                        foreach ($recorddisplay as $key) {

                            $element = $this->skylight_utilities->getField($key);

                            if (isset($solr[$element])) {

                                foreach ($solr[$element] as $index => $metadatavalue) {
                                    echo '<div class="stc-tags">';

                                    // if it's a facet search
                                    // make it a clickable search link
                                    if (in_array($key, $filters)) {
                                        if (!strpos($metadatavalue, "/") > 0) {
                                            $orig_filter = urlencode($metadatavalue);
                                            $lower_orig_filter = strtolower($metadatavalue);
                                            $lower_orig_filter = urlencode($lower_orig_filter);

                                            echo '<a href="./search/*:*/' . $key . ':%22' . $lower_orig_filter . '+%7C%7C%7C+' . $orig_filter . '%22" title="' . $metadatavalue . '">' . $metadatavalue . '</a>';
                                        }
                                    }
                                    echo '</div>';

                                }
                            }
                        }

                    }
            }
            else
            {
                $url = $_SERVER['REQUEST_URI'];
                $url_bit = substr($url, strpos($url,"record") + 7);
                $url_stem = substr($url, 0, strpos($url,"ed.ac.uk"));
           ?>

               <div id="stc-section1" class="container-fluid record-content">
                    <h2 class="itemtitle hidden-sm hidden-xs">This is not a valid Archive. Please visit the item <a href = "<?php echo $url_stem; ?>/speccoll/record/<?php echo $url_bit; ?>">here.</a></h2>
                    <h4 class="itemtitle hidden-lg hidden-md">This is not a valid Archive. Please visit the item <a href = "<?php echo $url_stem; ?>/speccoll/record/<?php echo $url_bit; ?>">here.</a></h4>
                </div>
            <?php
            }

    ?>
</div>
