<div class="col-md-9 col-sm-9 col-xs-12">
  <br>
  <br>
  <div>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.15.1/css/ol.css" type="text/css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.js" integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA=" crossorigin="anonymous"></script>
  <!--script src="../src/jquery.csv.js"></script-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/1.0.21/jquery.csv.js" ></script>
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
  <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.15.1/build/ol.js"></script>
  <div id="map" class="map"></div>
  <div id="popup" class="ol-popup">
      <a href="#" id="popup-closer" class="ol-popup-closer"></a>
      <div id="popup-content"></div>
    </div>

  <script type="text/javascript">


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
    clusters*/], //for when there will be clustering option
    overlays: [overlay],
    target: 'map',
    view: new ol.View({
      //If not specified, the map goes to Web Mercator Projection (EPSG:3857)
      center: ol.proj.fromLonLat([-3.55, 57.7901]),
      zoom: 6
    })
  });

  //define locationsArray array
  var locationsArray = [];

  </script>

  <?php

//use curl to read the data to plot
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

?>

<?php

$url = base_url() . "files/subjects_out.csv";
$data = file_get_contents($url);

//use the "/s"(ubject) part in the .csv to separate rows and allow parsing
$subjects=explode("/s", $data);
//print_r($subjects[1]);

foreach ($subjects as $value) {
  $arra = explode(',', $value);
  //print_r($arra);
  //$record_id = $arra[0];
  if (isset($arra[1])) {
    $place_name = $arra[1];

    if (isset($arra[2])) {
      $lon = $arra[2];

      if (isset($arra[3])) {
        $lat = $arra[3];

//echo("locationsArray.push([".$lon.",".$lat.", '".$place_name."']);");
echo("<script>locationsArray.push([".$lon.",".$lat.", '".$place_name."']);</script>");

  };
};
};

};

?>

<script>

    //define variables
    var lon;
    var lat;
    var title;
    var record;
    var rec_title;
    var JsonData = [];


    //for each item in the array, pass the csv data into the addLocation function
    var arrayLength = locationsArray.length;
    for (var i = 0; i < arrayLength; i++) {
        addLocation(locationsArray[i][0], locationsArray[i][1], locationsArray[i][2]);
        JsonData.push(locationsArray[i][0], locationsArray[i][1]);
    }

    //define addLocation function to draw pins on the map based on input coordinates
    function addLocation(lon, lat, title){
        var poi = new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.fromLonLat([Number(lon), Number(lat)])),
            title: title
            });

            //define style of the pin
            var style1 = [
                new ol.style.Style({
                    image: new ol.style.Icon(({
                        scale: 0.5,
                        rotateWithView: false,
                        anchor: [0.5, 1],
                        anchorXUnits: 'fraction',
                        anchorYUnits: 'fraction',
                        opacity: 1,
                        src: '//raw.githubusercontent.com/jonataswalker/map-utils/master/images/marker.png'
                    })),
                    zIndex: 5
                }),
            ];

        //set the style of the pin
        poi.setStyle(style1)

        //define vector source
        var vectorSource = new ol.source.Vector({
            features: [poi]
            });

        //create vector layer
        var vectorLayer = new ol.layer.Vector({
            source: vectorSource
            });

        //add the layer to the map
        map.addLayer(vectorLayer);


        //POP-UP functionality
        //use 'pointermove' for hover)
        map.on('singleclick', function(evt) {
          const feature = map.forEachFeatureAtPixel(evt.pixel, function(feature) {
            return feature;
        });

        if (feature) {
                //define place coordinate and name
                var coordinate = evt.coordinate;
                var Name = feature.get('title');

                //Content of pop-up
                content.innerHTML = '<p><b>'+ Name + '</b></p><a href="./search/subjects:%22'+Name+'%22">Click here for related interviews</a>' ;

                //set popup position where the coordinates are
                overlay.setPosition(coordinate);
                }
          });

      };


      //change cursor style when hovering over a pin
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
      THIS WAS TEST CODE FOR OPENLAYERS CLUSTERING - not working
      sources:
      https://openlayers.org/en/latest/examples/clusters-dynamic.html
      https://openlayers.org/en/latest/examples/earthquake-clusters.html
      https://scientificprogrammer.net/2019/08/18/applying-clustering-on-openlayers-map/
      https://scientificprogrammer.net/samples/openlayers-clustering-example-markup.html



      var iconFeatures = []
      setIconFeatures();

			function setIconFeatures() {
				for(var key in jsonData) {
					var jsonItem = jsonData[key];
					var iconFeature = new ol.Feature(new ol.geom.Point(ol.proj.fromLonLat([Number(key[0]), Number(key[1])])));
					iconFeature.setId(key);
					iconFeatures.push(iconFeature);
				}
			}

      var source = new ol.source.Vector({features: iconFeatures});

      var source = new ol.source.Vector({
          features: source
          });


        var clusterSource = new ol.source.Cluster({
          distance: 2000,
          source: source
        });

        var styleCache = {};

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
 				minResolution: 100
 			});


      map.addLayer(vectorLayer);
      //map.addLayer(clusters);
      */
      /*
      var style = new ol.Style({
                  pointRadius: "${radius}",
                  fillColor: "#FF3300",
                  fillOpacity: 0.8,
                  strokeColor: "#66FF00",
                  strokeWidth: "${width}",
                  strokeOpacity: 0.8,
                  label: "${getLabel}",
                  fontSize: "12px",
                  fontFamily: "Courier New, monospace",
                  fontWeight: "bold",
                  labelOutlineColor: "white",
                  labelOutlineWidth: 2.5
              }, {
                  context: {
                      width: function(feature) {
                          return (feature.cluster) ? 2 : 1;
                      },
                      radius: function(feature) {
                          var pix = 2;
                          if(feature.cluster) {
                              pix = Math.min(feature.attributes.count, 7) + 2;
                          }
                          return pix;
                      },
                      getLabel: function(feature) {
                          if (feature.cluster) {
                              if (feature.cluster.length > 1) {
                                  return feature.cluster.length;
                              }
                          }
                          return '';
                      }
                  }
              });

         var clusters = new ol.layer.Vector({
           source: clusterSource,
           style : new ol.style.Style({
             image: new ol.style.Icon({
               src: '//raw.githubusercontent.com/jonataswalker/map-utils/master/images/marker.png'}),
               text: new ol.style.Text({
                 font: '18px Helvetica, Arial Bold, sans-serif',
                 text: size.toString(),
                 fill: new ol.style.Fill({
                   color: '#fff'
                 });
               });
             });
           });

        map.addLayer(clusters);
        //}

      var arrayLength = locationsArray.length;
      for (var i = 0; i < arrayLength; i++) {
          addLocation(locationsArray[i][0], locationsArray[i][1], locationsArray[i][2]);
      }

      //use singleclick if you just want click
      /*
      map.on('singleclick', function(evt) {
        const feature = map.forEachFeatureAtPixel(evt.pixel, function(feature) {
          return feature;
      });
      if (feature) {
              //const Name = feature.get("title")
              //window.location.href = feature.values_.record
              var coordinate = evt.coordinate;
              var Name = feature.get('title');
              //var Url =feature.get('record');
              //var Rec_title = feature.get('rec_title');
              //document.getElementById("mytext").value = Name;
              //add name of interviewee other than record id
              content.innerHTML = '<p><b>'+ Name + '</b></p><a href="./search/'+Name+'">Click here for related interviews</a>' ;
              overlay.setPosition(coordinate);
              }
        });


//clustering attempt #2

//var vSource = new ol.source.Vector({ features: features});
/*
var vFeatures = vectorSource.getFeatures();

var clusterSource = new ol.source.Cluster({
                   distance: 20,
                   source: vectorSource});
 var clusters = new ol.layer.Vector({
                             source: clusterSource,
                             style : new ol.style.Style({
                                   image: new ol.style.Icon(({
                                   src: '//raw.githubusercontent.com/jonataswalker/map-utils/master/images/marker.png'})),
                             text: new ol.style.Text({
                                   font: '18px Helvetica, Arial Bold, sans-serif',
                                   text: size.toString(),
                                   fill: new ol.style.Fill({
                                   color: '#fff'
                                   })
                   })
map.add(clusters)



/*
        var iconFeatures = [];

        			setIconFeatures();

        			function setIconFeatures() {
        				for(var key in vectorLayer) {
        					var jsonItem = vectorLayer[key];

        					var iconFeature = new ol.Feature(new ol.geom.Point(ol.proj.fromLonLat([jsonItem.long, jsonItem.lat])));
        					iconFeature.setId(key);
        					iconFeature.set('style', createStyle('https://openlayers.org/en/latest/examples/data/icon.png', undefined));
        					iconFeatures.push(iconFeature);
        				}
        			}



        			var distance = document.getElementById('distance');
        			var source = new ol.source.Vector({features: vectorLayer});

        			var unclusteredLayer = new ol.layer.Vector({
        				source: source,
        				style: function(feature) {
        					return feature.get('style');
        				},
        				maxResolution: 1000
        			});

        			var clusterSource = new ol.source.Cluster({
        				distance: parseInt(distance.value, 10),
        				source: source
        			});

        			var styleCache = {};

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
              map.addLayer(clusters);
*/
  </script>
</div>
<br>
<br>
    <div class="content byEditor">
        <h1 class="itemtitle">Explore our interactive map</h1>


        <div style="float: left;"><!--p>how to use the map</p>-->

            <p>The above map displays the key geographical locations mentioned in RESP interviews. Pan, zoom, and click on a pin to reveal the place name. Click on the link in the pop-up window to view all interviews relating to the chosen pin.</p>
            <p>More places will be added to the map as the digital catalogue grows!</p>
            <p span style="color:red">Please bear with us if you find the map is running a little slow. We have been experiencing some technical difficulties but we are working on it.</span></p>

        </div>



    </div>
</div>
</body>
