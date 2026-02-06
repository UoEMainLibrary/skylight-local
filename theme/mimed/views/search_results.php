<?php

        // Set up some variables to easily refer to particular fields you've configured
        // in $config['skylight_searchresult_display']

        $title_field = $this->skylight_utilities->getField('Title');
        $author_field = $this->skylight_utilities->getField('Author');
        $date_field = $this->skylight_utilities->getField('Date Made');
        $type_field = $this->skylight_utilities->getField('Type');
        $bitstream_field = $this->skylight_utilities->getField('Bitstream');
        $thumbnail_field = $this->skylight_utilities->getField('Thumbnail');
        $abstract_field = $this->skylight_utilities->getField('Abstract');
        $link_uri_field = $this->skylight_utilities->getField('Link');
        $image_uri_field = $this->skylight_utilities->getField('ImageUri');


        $base_parameters = preg_replace("/[?&]sort_by=[_a-zA-Z+%20. ]+/","",$base_parameters);
        if($base_parameters == "") {
            $sort = '?sort_by=';
        }
        else {
            $sort = '&sort_by=';
        }
    ?>
    <div class="listing-filter">
        <span class="no-results">
            <strong><?php echo $startrow ?>-<?php echo $endrow ?></strong> of
            <strong><?php echo $rows ?></strong> results
        </span>

        <span class="sort">
            <strong>Sort by</strong>
            <?php foreach($sort_options as $label => $field) {
                if($label == 'Relevancy')
                {
                    ?>
                    <em><a href="<?php echo $base_search.$base_parameters.$sort.$field.'+desc'?>"><?php echo $label ?></a></em>
                    <?php
                }
                else {
            ?>

                <em><?php echo $label ?></em>
                <?php if($label != "Date") { ?>
                <a href="<?php echo $base_search.$base_parameters.$sort.$field.'+asc' ?>">A-Z</a> |
                <a href="<?php echo $base_search.$base_parameters.$sort.$field.'+desc' ?>">Z-A</a>
            <?php } else { ?>
                <a href="<?php echo $base_search.$base_parameters.$sort.$field.'+desc' ?>">newest</a> |
                <a href="<?php echo $base_search.$base_parameters.$sort.$field.'+asc' ?>">oldest</a>
          <?php } } } ?>
            
        </span>

    </div>


    <ul class="listing">

        <?php

        $j = 0;
        foreach ($docs as $index => $doc) {
        ?>

        <?php
        $type = 'Unknown';

        if(isset($doc[$type_field])) {
            $type = "media-" . strtolower(str_replace(' ','-',$doc[$type_field][0]));
        }
        ?>

        <li<?php if($index == 0) { echo ' class="first"'; } elseif($index == sizeof($docs) - 1) { echo ' class="last"'; } ?>>
            <div class="item-div">
                <div class = "iteminfo">
                    <h3><a href="./record/<?php echo $doc['id']?>?highlight=<?php echo $query ?>"><?php echo $doc[$title_field][0]; ?></a></h3>
                    <div class="tags">


                        <?php if(array_key_exists($author_field,$doc)) { ?>
                            <?php

                            $num_authors = 0;
                            foreach ($doc[$author_field] as $author) {

                                $orig_filter = urlencode($author);

                                $lower_orig_filter = strtolower($author);
                                $lower_orig_filter = urlencode($lower_orig_filter);


                                echo '<a href="./search/*:*/Maker:%22'.$lower_orig_filter.'+%7C%7C%7C+'.$orig_filter.'%22">'.str_replace('|','&nbsp;', $author).'</a>';
                                $num_authors++;
                                if($num_authors < sizeof($doc[$author_field])) {
                                    echo ' ';
                                }
                            }

                            ?>
                        <?php } ?>


                        <?php

                            if(array_key_exists($abstract_field, $doc)) {
                                echo '<p>';
                                //$abstract =  $doc[$abstract_field][0];
                                $abstract =  str_replace('|','&nbsp;',$doc[$abstract_field][0]);
                                $abstract_words = explode(' ',$abstract);
                                $shortened = '';
                                $max = 40;
                                $suffix = '...';
                                if($max > sizeof($abstract_words)) {
                                    $max = sizeof($abstract_words);
                                    $suffix = '';
                                }
                                for ($i=0 ; $i<$max ; $i++){
                                    $shortened .= $abstract_words[$i] . ' ';
                                }
                                echo $shortened.$suffix;
                                echo '</p>';
                            }

                        ?>

                    </div> <!-- close tags div -->

                </div> <!-- close item-info -->

                <div class = "thumbnail-image">
                    <?php
                    /*CACHING WORK SHOULD WE PURSUE IT
                    $numThumbnails = 0;
                    $imageset = false;
                    $thumbnailLink = [];
                    $root_path = '/var/html/www/skylight';
                    $imageCacheDir = $root_path . '/imagecache';
                    $infoCacheDir  = $root_path . '/infocache';

                    if (!is_dir($imageCacheDir)) mkdir($imageCacheDir, 0777, true);
                    if (!is_dir($infoCacheDir))  mkdir($infoCacheDir, 0777, true);

                    if (isset($doc[$image_uri_field])) {
                        foreach ($doc[$image_uri_field] as $imageUri) {
                            // force https
                            $imageUri = str_replace('http://', 'https://', $imageUri);

                            // only process luna images
                            if (strpos($imageUri, 'luna') === false) continue;

                            // generate cache filenames
                            $landscapeThumbFile = $imageCacheDir . '/' . md5(str_replace('/full/0/', '/120,/0/', $imageUri)) . '.jpg';
                            $portraitThumbFile  = $imageCacheDir . '/' . md5(str_replace('/full/0/', '/,120/0/', $imageUri)) . '.jpg';

                            // check for cached thumbnails first
                            if (file_exists($landscapeThumbFile)) {
                                $thumbnail = '/imagecache/' . basename($landscapeThumbFile);
                            } elseif (file_exists($portraitThumbFile)) {
                                $thumbnail = '/imagecache/' . basename($portraitThumbFile);
                            } else {
                                // neither thumbnail cached → check info.json cache
                                $infoUrl       = preg_replace('#/full/0/.*$#', '/info.json', $imageUri);
                                $infoCacheFile = $infoCacheDir . '/' . md5($infoUrl) . '.json';

                                if (!file_exists($infoCacheFile)) {
                                    // fetch info.json and save to cache
                                    $ch = curl_init($infoUrl);
                                    $fp = fopen($infoCacheFile, 'w');
                                    curl_setopt($ch, CURLOPT_FILE, $fp);
                                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
                                    curl_exec($ch);
                                    curl_close($ch);
                                    fclose($fp);
                                }
                                $data = file_get_contents($infoCacheFile);
                                echo "Contents:\n";
                                echo $data;
                                $info = json_decode($data, true);
                                if ($info === null) {
                                    echo "\nJSON decode failed: " . json_last_error_msg();
                                }
                                $info = @json_decode(file_get_contents($infoCacheFile), true);


                                var_dump($info);
                                $parms = '/120,/0/'; // default
                                if ($info && isset($info['width'], $info['height'])) {
                                    echo ("reading this");
                                    $parms = ($info['width'] > $info['height']) ? '/120,/0/' : '/,120/0/';
                                }

                                // build IIIF thumbnail URL
                                $iiifurlsmall = str_replace('/full/0/', $parms, $imageUri);
                                print($iiifurlsmall);

                                // fetch thumbnail and store in cache
                                $thumbFileName = $imageCacheDir . '/' . md5($iiifurlsmall) . '.jpg';
                                if (!file_exists($thumbFileName)) {
                                    $ch = curl_init($iiifurlsmall);
                                    $fp = fopen($thumbFileName, 'w');
                                    curl_setopt($ch, CURLOPT_FILE, $fp);
                                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
                                    curl_exec($ch);
                                    curl_close($ch);
                                    fclose($fp);
                                }
                                $thumbnail = '/imagecache/' . basename($thumbFileName);

                            }

                        }
                        // render thumbnail HTML
                        $thumbnailLink[$numThumbnails]  = '<a title="' . htmlspecialchars($doc[$title_field][0]) . '" class="fancybox" rel="group" href="' . $imageUri . '">';
                        $thumbnailLink[$numThumbnails] .= '<img src="' . $thumbnail . '" class="record-thumbnail-search" title="' . htmlspecialchars($doc[$title_field][0]) . '" /></a>';

                        $numThumbnails++;
                        $imageset = true;
                        // output first thumbnail if any
                        if ($imageset) {
                            echo $thumbnailLink[0];
                        }

                    }
                    */

                    $numThumbnails = 0;
                    $imageset = false;
                    $thumbnailLink = array();
                    if (isset($doc[$image_uri_field]))
                    {
                        foreach ($doc[$image_uri_field] as $imageUri)
                        {
                            //change to stop LUNA erroring on redirect
                            $imageUri = str_replace('http://', 'https://', $imageUri);

                            if (strpos($imageUri, 'luna') > 0)
                            {
                                $thumbnailLink[$numThumbnails]  = '<div class="thumbnail-placeholder"></div>';
                                $thumbnailLink[$numThumbnails] .= '<a title = "' . $doc[$title_field][0] . '" class="fancybox" rel="group" href="' . $imageUri . '"> ';
                                $thumbnailLink[$numThumbnails] .= '<img src = "' . $imageUri . '" class="record-thumbnail-search" title="' . $doc[$title_field][0] . '" loading="lazy"/></a>';
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
                    ?>

                </div>
                <div class="clearfix"></div>
            </div> <!-- close item div -->
        </li>
            <?php

            $j++;

        } // end for each search result

        ?>
    </ul>


    <div class="pagination">
        <span class="no-results">
            <strong><?php echo $startrow ?>-<?php echo $endrow ?></strong> of
            <strong><?php echo $rows ?></strong> results </span>
       <?php echo $pagelinks ?>
    </div>
    
    <script>
        const thumbnailImages = document.querySelectorAll(".thumbnail-image")
        thumbnailImages.forEach(div => {
            const img = div.querySelector("img")
            const placeholder = div.querySelector(".thumbnail-placeholder")

            if (!img || !placeholder) {
                console.log("no image found")
                return;
            }

            function loaded() {
                placeholder.style.display = "none";
            }

            if (img.complete) {
                loaded()
            } 
            else {
                img.addEventListener("load", loaded)
            }

        })
    </script>