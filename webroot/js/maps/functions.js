'use strict';
function worldMap(id, defaultFill, borderColor, altFill, labelFill, dangerFill, warningFill, infoFill, successFill) {
    var world = new Datamap({
        element: document.getElementById(id),
        responsive: true,
        projection: 'mercator',
        fills: {
            defaultFill: defaultFill,
            altFill: altFill,
            labelFill: labelFill,
            dangerFill: dangerFill,
            warningFill: warningFill,
            infoFill: infoFill,
            successFill: successFill
        },
        geographyConfig: {
            borderWidth: 1,
            borderOpacity: 1,
            borderColor: borderColor,
            highlightOnHover: true,
            highlightFillColor: borderColor,
            highlightBorderColor: borderColor,
            highlightBorderWidth: 1,
            highlightBorderOpacity: 1
        },
        labels: {
            labelColor: 'labelFill',
            fontSize: 12
        },
        data: {
            AUS: {
                fillKey: 'infoFill'
            },
            JPN: {
                fillKey: 'dangerFill'
            },
            ITA: {
                fillKey: 'altFill'
            },
            BRA: {
                fillKey: 'successFill'
            },
            DEU: {
                fillKey: 'warningFill'
            },
        }
    });
    window.addEventListener('resize', function() {
        world.resize();
    });
}
function usaMap(id, defaultFill, altFill, labelColor) {
    var USmap = new Datamap({
        element: document.getElementById(id),
        scope: 'usa', //currently supports 'usa' and 'world', however with custom map data you can specify your own
        projection: 'equirectangular', //style of projection to be used. try 'mercator'
        responsive: true,
        fills: {
            defaultFill: defaultFill
        },
        geographyConfig: {
            borderWidth: 1,
            borderOpacity: 1,
            borderColor: altFill,
            highlightOnHover: true,
            highlightFillColor: altFill,
            highlightBorderColor: altFill,
            highlightBorderWidth: 1,
            highlightBorderOpacity: 1,
            popupTemplate: function(geography, data) {
                return '<div class="hoverinfo">' + geography.properties.name + '</div>';
            }
        }
    });
    USmap.labels({
        labelColor: labelColor,
        fontSize: 12
    });
    window.addEventListener('resize', function() {
        USmap.resize();
    });
}
function worldMapWithBubbles(id, defaultFill, altFill, borderColor, highlightFillColor, highlightBorderColor) {
    var bubbleMap = new Datamap({
        element: document.getElementById(id),
        scope: 'world',
        projection: 'mercator',
        responsive: true,
        fills: {
            defaultFill: defaultFill
        },
        geographyConfig: {
            popupOnHover: false,
            borderWidth: 1,
            borderOpacity: 1,
            borderColor: altFill,
            highlightOnHover: true,
            highlightFillColor: altFill,
            highlightBorderColor: altFill,
            highlightBorderWidth: 1,
            highlightBorderOpacity: 1,
            popupTemplate: function(geography, data) {
                return '<div class="hoverinfo">' + geography.properties.name + '</div>';
            }
        }
    });
    var bubbles = [{
        name: 'Bubble 1',
        radius: 25,
        latitude: 0,
        longitude: 0
    }, {
        name: 'Bubble 2',
        radius: 25,
        latitude: 50,
        longitude: 0
    }, {
        name: 'Bubble 3',
        radius: 25,
        latitude: -33,
        longitude: -70
    }, {
        name: 'Bubble 4',
        radius: 45,
        latitude: 50,
        longitude: -78
    }, {
        name: 'Bubble 5',
        radius: 45,
        latitude: 50,
        longitude: 120
    }, ];
    bubbleMap.bubbles(bubbles, {
        borderWidth: 1,
        borderOpacity: 1,
        borderColor: borderColor,
        highlightFillColor: highlightFillColor,
        highlightBorderColor: highlightBorderColor,
        popupTemplate: function(geo, data) {
            return ['<div class="hoverinfo">' + data.name,
                '</div>'
            ].join('');
        }
    });
    window.addEventListener('resize', function() {
        bubbleMap.resize();
    });
}
function googleMapSimple() {
    new google.maps.Map(document.getElementById('simple'), {
        center: {
            lat: -34.397,
            lng: 150.644
        },
        zoom: 8
    });
}
//geolocation
//// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.
function googleMapGeolocation() {
    var map = new google.maps.Map(document.getElementById('geolocation'), {
        center: {
            lat: -34.397,
            lng: 150.644
        },
        zoom: 6
    });
    var infoWindow = new google.maps.InfoWindow({
        map: map
    });
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ? 'Error: The Geolocation service failed.' : 'Error: Your browser doesn\'t support geolocation.');
}
//styled
function googleMapStyled(colors) {
    var customMapType = new google.maps.StyledMapType([{
        stylers: [{
            hue: colors.primary
        }, {
            visibility: 'simplified'
        }, {
            gamma: 0.5
        }, {
            weight: 0.5
        }]
    }, {
        elementType: 'labels',
        stylers: [{
            visibility: 'off'
        }]
    }, {
        featureType: 'water',
        stylers: [{
            color: colors.danger
        }]
    }], {
        name: 'Custom Style'
    });
    var customMapTypeId = 'custom_style';
    var map = new google.maps.Map(document.getElementById('styled'), {
        zoom: 12,
        center: {
            lat: 40.674,
            lng: -73.946
        }, // Brooklyn.
        mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
        }
    });
    map.mapTypes.set(customMapTypeId, customMapType);
    map.setMapTypeId(customMapTypeId);
}
function googleMapTransit() {
    var map = new google.maps.Map(document.getElementById('transit-layer'), {
        zoom: 13,
        center: {
            lat: 51.501904,
            lng: -0.115871
        }
    });
    var transitLayer = new google.maps.TransitLayer();
    transitLayer.setMap(map);
}
function googleMapBicycling() {
    var map = new google.maps.Map(document.getElementById('bicycling-layer'), {
        zoom: 14,
        center: {
            lat: 42.3726399,
            lng: -71.1096528
        }
    });
    var bikeLayer = new google.maps.BicyclingLayer();
    bikeLayer.setMap(map);
}
function googleMapStreetView() {
    new google.maps.StreetViewPanorama(
        document.getElementById('street-view'), {
            position: {
                lat: 37.869260,
                lng: -122.254811
            },
            pov: {
                heading: 165,
                pitch: 0
            },
            zoom: 1
        });
}
