
<?php

function request($url, $data = null, $post = true, $session = null)    {

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, $post);
        // Set connection timeout to 1 second
        //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT_MS, 1000);

        if($data) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        if($session) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-type: text/json', 'X-ArchivesSpace-Session: '. $session]);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }


// Set up some variables to easily refer to particular fields you've configured
// in $config['skylight_searchresult_display']
$ID_field = $this->skylight_utilities->getField('Identifier');
$title_field = $this->skylight_utilities->getField('Title');
$author_field = $this->skylight_utilities->getField('Creator');
$date_field = $this->skylight_utilities->getField('Date');
$type_field = $this->skylight_utilities->getField('Type');
$abstract_field = $this->skylight_utilities->getField('Agents');
$subject_field = $this->skylight_utilities->getField('Subject');

$as_base_url = $this->config->item('skylight_archivesspace_url');
//$as_url = $this->config->item('skylight_archivesspace_tree');
$as_user = $this->config->item('skylight_archivesspace_user');
$as_password = $this->config->item('skylight_archivesspace_password');

$base_url = $as_base_url;


// Login
$result = request($base_url . "/users/" . $as_user . "/login",
     ['password' => $as_password]);

//echo $result;

$json_obj = json_decode($result, TRUE);

if($json_obj !== NULL && !array_key_exists('error', $json_obj))
 {
     log_message("debug", "Logged in to ArchivesSpace REST API.");
     $session = $json_obj['session'];
 }


$base_parameters = preg_replace("/[?&]sort_by=[_a-zA-Z+%20. ]+/","",$base_parameters);
if($base_parameters == "") {
    $sort = '?sort_by=';
}
else {
    $sort = '&sort_by=';
}

if (isset($_GET['map'])){
$type = 'map';
}

else{
$type = 'catalogue';
}

if ($type == 'map') {
?>
<div class="col-md-9 col-sm-9 col-xs-12">

     <!--delete from here-->

    <div class="row search-row">

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 results-num">
            <h5 class="text-muted">Showing <?php echo $rows ?> results </h5>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 results-num sort">
            <h5 class="text-muted">Sort By:
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
            </h5>
        </div>
    <a href="./about">link to about</a>
    <a href="./map">link to map</a>
    </div>
    <!-- to here -->

    <script type=text/javascript>
    var locationsArray = [];
    </script>
    <?php
    // print_r($docs);
    $data = request(base_url()."eerc/about");
    print_r($data);

    foreach ($docs as $index => $doc) {


      //name of the interview
      $strip_rec_title = strip_tags($doc[$title_field]);
      $strip_title = substr($strip_rec_title, 0, strpos($strip_rec_title, ','));
      //print_r($strip_title);

/*
      if(strpos($strip_rec_title, ',')) {
          echo substr($strip_rec_title, 0, strpos($strip_rec_title, ','));
      }
      else    {
          echo $strip_rec_title;
      }
*/


      //because error "undefined index" was showing up for some subject_uris too
      if (isset($doc['subject_uris'])) {

        foreach($doc['subject_uris'] as $subject)  {

          $url = $base_url . $subject;
          //echo $url;


          $result = request($url, null, false, $session);


          $json_obj = json_decode($result, TRUE);
/*
          $do_file = $json_obj['title'];
          $do_title_short = substr($do_file, 0, strpos($do_file, '.'));
          $do_url = $json_obj['file_versions'][0]['file_uri'];
          $file_size = curl_get_file_size($do_url);
*/
          if (isset($json_obj['terms'][0]['term_type'])) {
            $term_type = $json_obj['terms'][0]['term_type'];

            if ($term_type =='geographic') {
              $scope_note = $json_obj['scope_note'];

              //echo'<h1>SCOPE NOTE :'.$scope_note.'</h1>';
              //echo"<h3>it's geographic !</h3>";

              $title = $json_obj['title'];
              //print_r($title);
              //$title = isset($json_obj['title']) ? $json_obj['title'] : "Untitled";

              $map_location = explode(',', $scope_note); //used to be $doc[$scope_note][0]
              //print_r($map_location);

              /*
              if (endsWith($do_file, ['.jpg','.jpeg'])) {
                  log_message('debug', print_r($digital_obj, true));
                  $photo .= '<a href="' . $do_url . '" title="Photograph ' . $do_title_short .  $file_size . '">';
                  $photo .= '<img src="' . $do_url . '" alt="Photograph ' . $do_title_short .  $file_size . '" class="photos" style="width: 300px; padding: 8px;"></a>';
              }
              //$imageName = $image_name = str_replace("/full/full/","/full/50,/",$doc[$image_uri][0])
              */
              $url = "./record/".$doc['id'];
              //print_r($url);
              //<h3><a href="./record/<?php echo $doc['id']endphp/<?php echo $doc['types'][0]endphp"><?php

              echo("<script>locationsArray.push([".$map_location[1].",".$map_location[0].", '".$title."', '".$url."', '".$strip_title."']);</script>");
              //echo("<script>locationsArray.push([-3.1865286802087667,55.947601552780945,'./record/124627','A Torch Racer [Golden Boy]','https://images.is.ed.ac.uk/luna/servlet/iiif/uoeart~1~1~76064~216415/full/50,/0/default.jpg']);</script>");
              //echo("<script>locationsArray.push([-3.1728735541139486,55.924065556710296,'./record/125646','Ashworth Laboratories Reliefs','https://images.is.ed.ac.uk/luna/servlet/iiif/uoeart~1~1~75496~199487/full/50,/0/default.jpg']);</script>");
              //echo("locationsArray.push([".$map_location[1].",".$map_location[0].", '".$title."' , '".$url."']);");

              //echo("<script>locationsArray</script> ")

              //}
            }
          }
        }
      }
      // for images from record.php
      /*foreach($json_array as $digital_obj)  {
          try {
              $digital_obj = json_decode($digital_obj, TRUE);

              $do_file = $digital_obj['title'];
              $do_title_short = substr($do_file, 0, strpos($do_file, '.'));
              $do_url = $digital_obj['file_versions'][0]['file_uri'];
              $file_size = curl_get_file_size($do_url);



      //function to be invesitgated from public-art search-results.php
      /*
        foreach ($docs as $doc) {
          $title = isset($doc[$title_field][0]) ? $doc[$title_field][0] : "Untitled";
          $map_location = explode(',',$doc[$location][0]);
          $imageName = $image_name = str_replace("/full/full/","/full/50,/",$doc[$image_uri][0]);
          $url = "./record/".$doc['id'];
          echo "locationsArray.push([".$map_location[1].",".$map_location[0].",'".$url."','".$title."','".$imageName."']);";
        }
      */
        ?>

        <?php

    } // end for each search result
?>

<div>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.10.0/css/ol.css" type="text/css">
  <style>
  .map {
    height: 650px;
    width: 100%;
  }
  .ol-popup {
        position: absolute;
        background-color: white;
        box-shadow: 0 1px 4px rgba(0,0,0,0.2);
        padding: 15px;
        border-radius: 10px;
        border: 1px solid #cccccc;
        bottom: 12px;
        left: -50px;
        min-width: 200px;
      }
      .ol-popup:after, .ol-popup:before {
        top: 100%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
      }
      .ol-popup:after {
        border-top-color: white;
        border-width: 10px;
        left: 48px;
        margin-left: -10px;
      }
      .ol-popup:before {
        border-top-color: #cccccc;
        border-width: 11px;
        left: 48px;
        margin-left: -11px;
      }
      .ol-popup-closer {
        text-decoration: none;
        position: absolute;
        top: 2px;
        right: 8px;
      }
      .ol-popup-closer:after {
        content: "✖";
      }
  </style>
  <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.10.0/build/ol.js"></script>
  <div id="map" class="map"></div>
  <div id="popup" class="ol-popup">
      <a href="#" id="popup-closer" class="ol-popup-closer"></a>
      <div id="popup-content"></div>
    </div>
    <div>
      <h1> This is a map </h1>
      <p> How to use the map </p>
    </div>
  <!--div #popup class="popup" [hidden]="true"></div>-->
  <!--script src="https://unpkg.com/ol-popup@4.0.0"></script>-->
  <!--link rel="stylesheet" href="https://unpkg.com/ol-popup@4.0.0/src/ol-popup.css" /> -->
  <script type="text/javascript">

  /**
 * Elements that make up the popup.
 */
var container = document.getElementById('popup');
var content = document.getElementById('popup-content');
var closer = document.getElementById('popup-closer');


/**
 * Create an overlay to anchor the popup to the map.
 */
var overlay = new ol.Overlay({
  element: container,
  autoPan: {
    animation: {
      duration: 250,
    },
  },
});


/**
 * Add a click handler to hide the popup.
 * @return {boolean} Don't follow the href.
 */
closer.onclick = function() {
  overlay.setPosition(undefined);
  closer.blur();
  return false;
};


  //Initialise map
  var map = new ol.Map({
    target: 'map',
    layers: [
      new ol.layer.Tile({
        source: new ol.source.OSM()
      })/*,
    clusters*/],
    overlays: [overlay],
    target: 'map',
    view: new ol.View({
      //If not specified, the map goes to Web Mercator Projection (EPSG:3857)
      //Geopy returns coords in WGS84.
      center: ol.proj.fromLonLat([-3.55, 57.7901]),
      zoom: 6
    })
  });

    //define variables
    var lon;
    var lat;
    var title;
    //var author
    var record;
    var rec_title;
    //var oldFeature;

    function addLocation(lon, lat, title, record, rec_title){
        var poi = new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.fromLonLat([Number(lon), Number(lat)])),
            title: title,
            record: record,
            rec_title: rec_title
            });

            var style1 = [
                new ol.style.Style({
                    image: new ol.style.Icon(({
                        scale: 0.7,
                        rotateWithView: false,
                        anchor: [0.5, 1],
                        anchorXUnits: 'fraction',
                        anchorYUnits: 'fraction',
                        opacity: 1,
                        src: '//raw.githubusercontent.com/jonataswalker/map-utils/master/images/marker.png'
                        //src:'https://collections.ed.ac.uk/theme/eerc/marker_blue.png'
                    })),
                    zIndex: 5
                }),
            ];

       poi.setStyle(style1)
        var vectorSource = new ol.source.Vector({
            features: [poi]
            });
        var vectorLayer = new ol.layer.Vector({
            source: vectorSource
            });
        map.addLayer(vectorLayer);
        //oldFeature = poi;
        }

      var arrayLength = locationsArray.length;
      for (var i = 0; i < arrayLength; i++) {
          addLocation(locationsArray[i][0], locationsArray[i][1], locationsArray[i][2], locationsArray[i][3], locationsArray[i][4]);
      }


/*
      var clusters = new ol.layer.Vector({
       source: clusterSource,
       style: function(feature) {
        var size = feature.get('features').length;
        var style = styleCache[size];
        if (!style) {
         style = new ol.style.Style({
          image: new ol.style.Circle({
           radius: 10,
           stroke: new ol.style.Stroke({
            color: '#fff'
           }),
           fill: new ol.style.Fill({
            color: '#3399CC'
           })
          }),
          text: new ol.style.Text({
           text: size.toString(),
           fill: new ol.style.Fill({
            color: '#fff'
           })
          })
         });
         styleCache[size] = style;
        }
        return style;
       },
       minResolution: 2001
      });
      */
/*

map.on('singleclick', function(evt) {
  map.forEachFeatureAtPixel(evt.pixel, function(feature) {
        var Name = feature.get("title")
        //window.location.href = feature.values_.record
        var coordinate = evt.coordinate;
        //var hdms = ol.toStringHDMS(toLonLat(coordinate));
        content.innerHTML = '<p>You clicked here!</p>'+ '<b>${Name}</b>';
        overlay.setPosition(coordinate);
        });
  })
*/

//from https://openlayers.org/en/latest/examples/icon.html
//use 'singleclick' for on-click interaction, 'pointermove'
map.on('singleclick', function(evt) {
  const feature = map.forEachFeatureAtPixel(evt.pixel, function(feature) {
    return feature;
});
if (feature) {
        //const Name = feature.get("title")
        //window.location.href = feature.values_.record
        var coordinate = evt.coordinate;
        var Name = feature.get('title');
        var Url =feature.get('record');
        var Rec_title = feature.get('rec_title');
        //document.getElementById("mytext").value = Name;
        //add name of interviewee other than record id
        //content.innerHTML = '<p><b>'+ Name + '</b></p> Related interviews:<br><a href=" '+Url +'/archival_object">'+Rec_title+' </a>' ;
        content.innerHTML = '<p><b>'+ Name + '</b></p><a href="./search/'+Name+'">Click here for related interviews</a>' ;
        overlay.setPosition(coordinate);
        }
  });


  // change mouse cursor when over marker
map.on('pointermove', function (e) {
  var hit = this.forEachFeatureAtPixel(e.pixel, function(feature, layer) {
    return true;
  });
  if (hit) {
    this.getTargetElement().style.cursor = 'pointer';
  } else {
    this.getTargetElement().style.cursor = '';
  }
});

/*
map.on('pointermove', function (e) {
  const pixel = map.getEventPixel(e.originalEvent);
  const hit = map.hasFeatureAtPixel(pixel);
  map.getTarget().style.cursor = hit ? 'pointer' : '';
});

*/
/*
      //POPUP test
      //code from https://developers.arcgis.com/openlayers/layers/display-a-popup/
      const popup = new ol.Popup();
      map.addOverlay(popup);

      map.on("click", (event) => {
        let Name;
        const trailheads = map.getFeaturesAtPixel(event.pixel, {
          layerFilter: (layer) => layer === vectorLayer
        });
        if (trailheads.length > 0) {
          const Name = trailheads[0].get("title");
          //const parkName = vectorLayer[0].get("PARK_NAME");
          popup.show(event.coordinate, `<b>${Name}</b>`);
        } else {
          popup.hide();
        }
      });

      //popup code from https://stackoverflow.com/questions/55743504/how-to-implement-feature-popups-in-openlayers-5-on-mouse-hover-and-click
      /*
      var popup = new ol.Overlay({
        element: document.getElementById('popup')
      });
      popup.setPosition(coordinate);
      map.AddOverlay(popup);
*/
//popup code from https://stackoverflow.com/questions/55743504/how-to-implement-feature-popups-in-openlayers-5-on-mouse-hover-and-click
/*
      this.popupOverlay = new ol.Overlay({
        element: this.popup.nativeElement,
        offset: [9, 9]
      });
      this.map.addOverlay(this.popupOverlay);

      this.map.on('pointermove', (event) => {
        let features = [];
        this.map.forEachFeatureAtPixel(event.pixel,
            (feature, layer) => {
                features = feature.get('features');
                const valuesToShow = [];
                if (features && features.length > 0) {
                    features.forEach(vectorLayer => {
                        valuesToShow.push(vectorLayer.get('title'));
                    });
                    this.popup.nativeElement.innerHTML = valuesToShow.join(', ');
                    this.popup.nativeElement.hidden = false;
                    this.popupOverlay.setPosition(event.coordinate);
                }
            },
            { layerFilter: (layer) => {
                return (layer.type === new ol.VectorLayer().type) ? true : false;
            }, hitTolerance: 6 }
        );
        if (!features || features.length === 0) {
            this.popup.nativeElement.innerHTML = '';
            this.popup.nativeElement.hidden = true;
        }
    });
    */
      /*
      map.on('singleclick', function(e) {
          map.forEachFeatureAtPixel(e.pixel, function(feature) {
                window.location.href = feature.values_.record
                });
          })
      map.on('pointermove', function(e){
        map.forEachFeatureAtPixel(e.pixel, function(feature) {
          oldFeature.setStyle(new Style({
                image: new Icon(/** @type {module:ol/style/Icon~Options} */ /*removethis {
                  crossOrigin: null,
                  src: 'https://collections.ed.ac.uk/theme/public-art/locations/pinpoint.png',
                  scale: 1.25
                })),
                overflow: true
              }));
          feature.setStyle(new Style({
                image: new Icon(/** @type {module:ol/style/Icon~Options} */ /*removethis ({
                  crossOrigin: null,
                  src: 'https://collections.ed.ac.uk/theme/public-art/locations/pinpoint2.png',
                  scale: 1.50
                })),
                overflow: true,
                text: new Text({
                  text: feature.values_.title,
                  font: '12px helvetica',
                  offsetY: -30,
                  padding: [5,5,5,5],
                  backgroundFill: new Fill({
                      color: '#fff'
                  })
                })
              }));
              oldFeature = feature;
              });
      })
*/
  </script>

</body>

</div>
<?php


}
if ($type == 'catalogue') {
?>
<div class="col-md-9 col-sm-9 col-xs-12">
    <div class="row">
        <div class="centered text-center">
            <nav>
                <ul class="pagination pagination-sm pagination-xs">
                    <?php
                    foreach ($paginationlinks as $pagelink)
                    {
                        echo $pagelink;
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
    <div class="row search-row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 results-num">
            <h5 class="text-muted">Showing <?php echo $rows ?> results </h5>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 results-num sort">
            <h5 class="text-muted">Sort By:
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
            </h5>
        </div>

    </div>
    <?php
    foreach ($docs as $index => $doc) {
        ?>
        <div class="row search-row">
            <h3><a href="./record/<?php echo $doc['id']?>/<?php echo $doc['types'][0]?>"><?php

                    $strip_rec_title = strip_tags($doc[$title_field]);

                    if(strpos($strip_rec_title, ',')) {
                        echo substr($strip_rec_title, 0, strpos($strip_rec_title, ','));
                    }
                    else    {
                        echo $strip_rec_title;
                    } ?></a></h3>

            <?php
            if (isset($doc["component_id"])) {
                $component_id = $doc["component_id"];
                echo'<div class="component_id">' . $component_id . '</div>';
            } ?>

            <?php if(array_key_exists($author_field,$doc)) { ?>
                <?php

                $num_authors = 0;
                echo 'Interviewer/agent: ';
                foreach ($doc[$author_field] as $author) {
                    $orig_filter = urlencode($author);

                    echo '<a class="agent" href="./search/*:*/Agent:%22'.urlencode($orig_filter).'%22">'.$author.'</a>';
                    $num_authors++;
                    if($num_authors < sizeof($doc[$author_field])) {
                        echo ' ';
                    }
                }
                ?>
            <?php } ?>

            <?php if(array_key_exists($subject_field,$doc)) { ?>
                <div class="tags">
                    <?php

                    $num_subject = 0;
                    foreach ($doc[$subject_field] as $subject) {

                        $orig_filter = urlencode($subject);
                        echo '<a class="subject" href="./search/*:*/Subject:%22'.urlencode($orig_filter).'%22">'.$subject.'</a>';
                        $num_subject++;
                        if($num_subject < sizeof($doc[$subject_field])) {
                            echo ' ';
                        }
                    }

                    ?>
                </div>
            <?php } ?>
            <?php if(array_key_exists('summary',$doc)) { ?>
                <div class="interview_summary">
                    <?php

                    $text = $doc['summary'];
                    $needle = urldecode($query);
                    $hits = explode($needle, $text);
                    $max_length_summary = 200;

                    if(sizeof($hits) > 1) {
                        foreach ($hits as $a => $b) {
                            if ($a % 2 != 0) {
                                $before = $hits[$a - 1];
                                $after = $b;
                                if (strlen($before) > $max_length_summary)
                                    $before = '...' . substr($before, strlen($before) - $max_length_summary);

                                if (strlen($b) > $max_length_summary)
                                    $after = substr($b, 0, $max_length_summary);

                                echo $before . '<b class="hit">' . $needle . '</b>' . $after . '...<br/>';
                            }

                        }
                    }
                    else {
                        if(strlen($text) > $max_length_summary)
                            echo substr($text, 0,$max_length_summary) . '...';
                        else
                            echo $text;
                    }

                    ?>
                </div>
            <?php } ?>
        </div> <!-- close row-->
        <?php

    } // end for each search result
}
?>

</div> <!-- close col 9 -->
