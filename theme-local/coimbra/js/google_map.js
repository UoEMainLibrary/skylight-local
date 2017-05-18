/**
 * Created by Kristiyan Tsvetanov on 14/03/2017.\
 * Contact me: kristiyan.c@gmail.com
 *
 * Initializing the google map, adding pinpoints
 */

map;

function initMap(center) {
    center = center || {lat:51.509865, lng:-0.118092};
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center:  center,
        scrollwheel: false,
        disableDefaultUI: true,
        scaleControl: true,
        zoomControl: true,
        styles: [
            {
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#1d2c4d"
                    }
                ]
            },
            {
                "elementType": "labels.text",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "weight": 1.5
                    }
                ]
            },
            {
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#8ec3b9"
                    }
                ]
            },
            {
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "color": "#1a3646"
                    }
                ]
            },
            {
                "featureType": "administrative.country",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#4b6878"
                    }
                ]
            },
            {
                "featureType": "administrative.land_parcel",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "administrative.land_parcel",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#64779e"
                    }
                ]
            },
            {
                "featureType": "administrative.neighborhood",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "administrative.province",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#4b6878"
                    }
                ]
            },
            {
                "featureType": "landscape.man_made",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#334e87"
                    }
                ]
            },
            {
                "featureType": "landscape.natural",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#023e58"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#283d6a"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "labels.text",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#6f9ba5"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "color": "#1d2c4d"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#023e58"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#3C7680"
                    }
                ]
            },
            {
                "featureType": "road",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#304a7d"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#98a5be"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "color": "#1d2c4d"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#2c6675"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#255763"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#b0d5ce"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "color": "#023e58"
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#98a5be"
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "color": "#1d2c4d"
                    }
                ]
            },
            {
                "featureType": "transit.line",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#283d6a"
                    }
                ]
            },
            {
                "featureType": "transit.station",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#3a4762"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#0e1626"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "labels.text",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#4e6d70"
                    }
                ]
            }
        ]
    });

    google.maps.event.addListener(map, 'mousedown', function(){
        enableScrollingWithMouseWheel();
    });
}

// Adding pinpoint to map given coordinates
function addLocation(ugly_coordinates, record_name, index, image_url, opacity){
    var coordinates = convertToCoordinates(ugly_coordinates);

    var marker = new google.maps.Marker({
        position: coordinates,
        map: map,
        title: record_name,
        icon: image_url,
        id: index,
        opacity: opacity
    });

    markers[index] = marker;

    marker.addListener('mouseover', function() {
        $('.row.record img.active').removeClass('active');
        // $('html, body').animate({
        //     scrollTop: $('.row.record.'+marker.id).offset().top - 100
        // }, 1000);
        $('.row.record.'+marker.id + ' img').addClass('active');
    });

    // Didn't allow users to click on the reord he liked
    // marker.addListener('mouseout', function() {
    //     $('.list-group-item .pull-right').html()=='Open map view' ? $('.row.record').fadeIn() : $('.row.record').hide();
    // });
}

function removeMarker(id){
    markers[id].toggle();
}

// Reading coordinates
function convertToCoordinates(ugly_coordinates){
    var latitude, longitude;

    latitude = parseFloat(ugly_coordinates.substring(0, ugly_coordinates.indexOf(",")));
    longitude = parseFloat(ugly_coordinates.substring(ugly_coordinates.indexOf(",")+1, ugly_coordinates.length));

    return {lat: latitude, lng: longitude};
}

function initMapAndAddLocations(){
    initMap();
    for (var i = 0; i < locations.length; i++) {
        addLocation(locations[i]['location'], locations[i]['title'], locations[i]['index'], locations[i]['image_url']);
    }
}

$(window).scroll(function(){
    if ($(window).scrollTop()+$(window).height() + 80 >= $('.footer').offset().top) {
        $(".sidebar-nav").css('position', 'absolute').css('top', $('.footer').offset().top - $('.sidebar-nav').height() - 150);
    }
    else{
        $(".sidebar-nav").css('position', 'fixed').css('top', 50);
    }
});