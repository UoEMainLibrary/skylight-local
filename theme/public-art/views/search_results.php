<?php
//search results script for showing image thumbnails
$id_field = $this->skylight_utilities->getField('ID');
$title_field = $this->skylight_utilities->getField('Title');
$image = $this->skylight_utilities->getField("Image URI");
$spatiallocation = $this->skylight_utilities->getField("Location");
$location = $this->skylight_utilities->getField("Map Reference");


$base_parameters = preg_replace("/[?&]sort_by=[_a-zA-Z+%20. ]+/", "", $base_parameters);
if ($base_parameters == "") {
    $sort = '?sort_by=';
} else {
    $sort = '&sort_by=';
}
if (isset($_GET['map'])){
    $type = 'map';
    }
  else{
    $type = 'images';
    }
  
  if ($type == 'images') {
      ?>

<div class="row">
<div class="container-fluid">
  <div style="margin:15px; color:#d0006f;" class="animated flipInX slow delay-2s"><h1 class="display-1">Art on Campus</h1></div>
    <div class="gallery-container">
        <?php
        foreach ($docs as $doc) {

          $title = isset( $doc[$title_field][0] ) ? $doc[$title_field][0] : "Untitled";
          
          $img_url = isset($doc[$image][0]) ? $doc[$image][0] : $doc[$image_alt][0];
          $img_url = str_replace("/full/full/", "/full/,450/",$img_url);

          $thumbnailLink = '<img class="img-responsive" src ="' . $img_url . '" title="' . $title . '" />';
          $thumbnailLink = '<a  class= "record-link" href="./record/' . $doc['id'] . '" title = "' . $title . '"> '. $thumbnailLink . '</a>';

          ?>

            <!--                Displaying-->
            <div class="row record">

                <?php echo $thumbnailLink ?>

                <div class="col-sm-9 hidden-xs result-info">
                  <div class ='record-link-background'>
                    <h4>
                        <a href="./record/<?php echo $doc['id'] ?>"><?php echo $title; ?></a>
                    </h4>
                  </div>
                </div>
            </div>
            <hr class="visible-xs">
            <?php
            //$n++;
        }// end for loop ?>
    </div>
    <!--        Pagination  -->
    <div class="row">
        <div class="centered text-center">
            <nav>
                <ul class="pagination">
                </ul>
            </nav>
        </div>
    </div>
</div>

<?php
}

if ($type == 'map') {
    ?>
  
    </div>
          <div id="map" class="full-width" style="height: 1500px;"></div>
          <script>
          var locationsArray = [];
          <?php
          foreach ($docs as $doc) {
            $title = isset($doc[$title_field][0]) ? $doc[$title_field][0] : "Untitled";
            $map_location = explode(',',$doc[$location][0]);
            $imageName = $image_name = str_replace("/full/full/","/full/50,/",$doc[$image_uri][0]);
            $url = "./record/".$doc['id'];
            echo "locationsArray.push([".$map_location[1].",".$map_location[0].",'".$url."','".$title."','".$imageName."']);";
          }
          ?>
          </script>
          <script src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/locations/bundle.js"></script>
        <!--        Pagination  -->
  
  
    <?php
  }
  ?>