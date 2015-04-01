
 <div class="randoms">
    <?php

    $title_field = $this->skylight_utilities->getField('Title');
    $author_field = $this->skylight_utilities->getField('Author');
    $subject_field = $this->skylight_utilities->getField('Subject');
    $abstract_field = $this->skylight_utilities->getField('Abstract');
    $date_field = $this->skylight_utilities->getField('Date');
    $type_field = $this->skylight_utilities->getField("Type");
    $bitstream_field = $this->skylight_utilities->getField('Bitstream');
    $thumbnail_field = $this->skylight_utilities->getField('Thumbnail');

   //pop the first item from the list

    $first_doc = array_shift($randomitems);


    ?>

     <div class="container-random">

         <?php

         $k = 0;
         foreach ($randomitems as $index => $doc) {

             $extraclass = ($k == 0) ? "thumbnail-first" : ""; ?>

             <div class="thumbnail random-thumbnail <?php echo $extraclass; ?>">
                 <div class="random-title"><a href="./record/<?php echo $doc['id']?>"><?php echo $doc[$title_field][0]; ?></a></div>

                 <?php

                 $bitstream_array = array();
                 if(isset($doc[$bitstream_field])) {

                     $i = 0;
                     $j = 0;
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
                         $thumbnailLink = '<div class="random-image">';
                         $thumbnailLink .= '<a class="random-image-link" href="./record/'.$doc['id'].'" title="' . $doc[$title_field][0] . '"> ';
                         $thumbnailLink .= '<img src="'.$b_uri.'" class="random-thumbnailimg" title="'. $doc[$title_field][0] .'" /></a></div>';

                         echo $thumbnailLink;
                     }


                 } //end if there are bitstreams ?>


             </div>

            <?php $k++;

            } ?>

     </div>




     <div class="random-first">
         <a title="<?php echo $first_doc[$title_field][0] ?>" href="./record/<?php echo $first_doc['id'] ?>">
             <?php

             $bitstream_array = array();

             if(isset($first_doc[$bitstream_field])) {

                 $i = 0;
                 $j = 0;
                 $started = false;
                 // loop through to get min sequence
                 foreach ($first_doc[$bitstream_field] as $bitstream) {
                     $b_segments = explode("##", $bitstream);
                     $b_filename = $b_segments[1];
                     $b_seq = $b_segments[4];

                     if ((strpos($b_filename, ".jpg") > 0) || (strpos($b_filename, ".JPG") > 0)) {

                         $bitstream_array[$b_seq] = $bitstream;

                         if ($started) {
                             if ($b_seq < $min_seq) {
                                 $min_seq = $b_seq;
                             }
                         } else {
                             $min_seq = $b_seq;
                             $started = true;
                         }
                     }

                     $i++;

                 }

                 // if there is a thumbnail and a bitstream
                 if (isset($min_seq) && count($bitstream_array) > 0) {

                     // get all the information
                     $b_segments = explode("##", $bitstream_array[$min_seq]);
                     $b_filename = $b_segments[1];
                     $b_handle = $b_segments[3];
                     $b_seq = $b_segments[4];
                     $b_handle_id = preg_replace('/^.*\//', '', $b_handle);
                     $b_uri = './record/' . $b_handle_id . '/' . $b_seq . '/' . $b_filename;
                     ?>
                     <div class="random-first-caption">
                         <?php if (isset($first_doc)) { ?>

                             <div class="random-caption"><div class="random-caption-title"><?php echo $first_doc[$title_field][0]; ?></div><br/>
                             <?php if (array_key_exists($abstract_field, $first_doc)) {
                                 echo '<div class="random-caption-abstract">' . $first_doc[$abstract_field][0] . '</div>';
                                 ?>
                                 </div>
                             <?php }
                         } ?>
                     </div>
                     <div class="random-first-image-holder">
                         <img src="<?php echo $b_uri ?>" class="random-first-image" title="<?php echo $first_doc[$title_field][0] ?>">
                     </div>

                 <?php }

             } //end if there are bitstreams ?>
         </a>
     </div>

 </div>
 <div class="clearfix"></div>
 <br />
