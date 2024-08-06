    <h4>Related Items</h4>
    <?php

    // Set up some variables to easily refer to particular fields you've configured
    // in $config['skylight_searchresult_display']
    // copied from search results

    $title_field = $this->skylight_utilities->getField('Title');
    $author_field = $this->skylight_utilities->getField('Author');
    $place_field = $this->skylight_utilities->getField('Place');
    $date_field = $this->skylight_utilities->getField('Date');
    $type_field = $this->skylight_utilities->getField('Type');
    $bitstream_field = $this->skylight_utilities->getField('Bitstream');
    $thumbnail_field = $this->skylight_utilities->getField('Thumbnail');
    $abstract_field = $this->skylight_utilities->getField('Abstract');
    $subject_field = $this->skylight_utilities->getField('Subject');
    $image_uri_field = $this->skylight_utilities->getField('ImageUri');
    ?>
    <ul class="related">

        <?php

        // if there are related items
        if(count($related_items) > 0) {

            $type_field = $this->skylight_utilities->getField('Type');

            foreach ($related_items as $index => $doc) {

                $type = 'Unknown';

                if(isset($doc[$type_field])) {
                    $type = "media-" . strtolower(str_replace(' ','-',$doc[$type_field][0]));
                }

                ?>

                <li<?php if($index == 0) { echo ' class="first"'; } elseif($index == sizeof($related_items) - 1) { echo ' class="last"'; } ?>>
                    <a class="related-record" href="./record/<?php echo $doc['id']?>" title="<?php echo $doc[$title_field][0]; ?>"><?php echo $doc[$title_field][0]; ?></a>
                    <!-- whole div thumbnail-image copied across from search -->
                    <div class = "thumbnail-image">
                        <?php
                        $numThumbnails = 0;
                        $imageset = false;
                        $thumbnailLink = array();
                        if (isset($doc[$image_uri_field]))
                        {
                            foreach ($doc[$image_uri_field] as $imageUri)
                            {
                                //change to stop LUNA erroring on redirect
                                $imageUri = str_replace('http://', 'https://', $imageUri);
                                list($width, $height) = getimagesize($imageUri);
                                //echo 'WIDTH'.$width.'HEIGHT'.$height
                                $portrait = true;
                                //attempt to modify dimensions - original is 120, for first ,120 for second
                                if ($width > $height)
                                {
                                    $parms = '/50,/0/';
                                }
                                else
                                {
                                    $parms = '/,50/0/';
                                }

                                if (strpos($imageUri, 'luna') > 0)
                                {
                                    $iiifurlsmall = str_replace('/full/0/', $parms, $imageUri);
                                    $thumbnailLink[$numThumbnails]  = '<a title = "' . $doc[$title_field][0] . '" class="fancybox" rel="group" href="' . $imageUri . '"> ';
                                    $thumbnailLink[$numThumbnails] .= '<img src = "' . $iiifurlsmall . '" class="record-thumbnail-search" title="' . $doc[$title_field][0] . '" /></a>';
                                    $numThumbnails++;
                                    $imageset = true;
                                }
                            }
                            if ($imageset == true) {
                                echo $thumbnailLink[0];
                            }
                        }
                        ?>
                        <?php
                        ?> <?php

                        $bitstream_array = array();

                        if(isset($doc[$bitstream_field])) {

                            $i = 0;
                            $started = false;
                            // loop through to get min sequence
                            foreach ($doc[$bitstream_field] as $bitstream)
                            {
                                $b_segments = explode("##", $bitstream);
                                $b_filename = $b_segments[1];
                                $b_seq = $b_segments[4];

                                if((strpos($b_filename, ".jpg") > 0) || (strpos($b_filename, ".JPG") > 0)) {

                                    $bitstream_array[$b_seq] = $bitstream;

                                    if ($started) {
                                        if ($b_seq < $min_seq) {
                                            $min_seq = $b_seq;
                                        }
                                    }
                                    else {
                                        $min_seq = $b_seq;
                                        $started = true;
                                    }
                                }

                                $i++;

                            }

                            // if there is a thumbnail and a bitstream
                            if(isset($min_seq) && count($bitstream_array) > 0) {

                                // get all the information
                                $b_segments = explode("##", $bitstream_array[$min_seq]);
                                $b_filename = $b_segments[1];
                                $b_handle = $b_segments[3];
                                $b_seq = $b_segments[4];
                                $b_handle_id = preg_replace('/^.*\//', '',$b_handle);
                                $b_uri = './record/'.$b_handle_id.'/'.$b_seq.'/'.$b_filename;
                                $thumbnailLink = "";

                                if(isset($doc[$thumbnail_field])) {
                                    foreach ($doc[$thumbnail_field] as $thumbnail) {

                                        $t_segments = explode("##", $thumbnail);
                                        $t_filename = $t_segments[1];

                                        if ($t_filename === $b_filename . ".jpg") {

                                            $t_handle = $t_segments[3];
                                            $t_seq = $t_segments[4];
                                            $t_uri = './record/'.$b_handle_id.'/'.$t_seq.'/'.$t_filename;

                                            $thumbnailLink = '<a title = "' . $doc[$title_field][0] . '" class="fancybox" rel="group' . $j .'" href="' . $b_uri . '"> ';
                                            $thumbnailLink .= '<img src = "'.$t_uri.'" class="search-thumbnail" title="'. $doc[$title_field][0] .'" /></a>';
                                        }
                                    }
                                }
                                // there isn't a thumbnail so display the bitstream itself
                                else {
                                    $thumbnailLink = '<a title = "' . $doc[$title_field][0] . '" class="fancybox" rel="group' . $j .'" href="' . $b_uri . '"> ';
                                    $thumbnailLink .= '<img src = "'.$b_uri.'" class="search-thumbnail" title="'. $doc[$title_field][0] .'" /></a>';
                                }

                                echo $thumbnailLink;
                            }

                        } //end if there are bitstreams ?>
                    </div>
                    <div class="tags">
                        
                        <?php if(array_key_exists($type_field,$doc)) { 
                            $num_types = 0;
                            foreach ($doc[$type_field] as $type) {

                                $orig_filter = ucwords(urlencode($type));
                                $lower_orig_filter = strtolower($type);
                                $lower_orig_filter = urlencode($lower_orig_filter);

                                echo '<a href="./search/*:*/Type:%22'.$lower_orig_filter.'+%7C%7C%7C+'.$orig_filter.'%22">'.$type.'</a>';
                                $num_types++;
                                if($num_types < sizeof($doc[$type_field])) {
                                    echo ' ';
                                }
                            }
                            ?>

                        <?php } ?>

                    </div>
                </li>
            <?php }

        }
        // else there aren't any related items
        else { ?>

            <li>None.</li>

        <?php }?>
    </ul>
