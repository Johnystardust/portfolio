<?php
/* Template Name: Contact */

/**
 * Created by:  Tim van der Slik
 * Project:     Portfolio
 * Website:     http://timvanderslik.nl
 */

get_header();
?>

<div id="page-header" class="container-fluid" style="background-image: url(<?php echo get_stylesheet_directory_uri().'/assets/images/contact_header.jpg'; ?>)">
    <div class="overlay">

        <div class="middle-wrap">
            <div class="middle-wrap-inner">
                <div class="title">
                    <h1>CONTACT</h1>
                    <hr class="divider"/>
                </div>
                <div class="quote">
                    <p>"Embrace your differences and the qualities about you that you think are weird. <br/>Eventually, they're going to be the only things separating you from everyone else." <span class="quote-author">- Sebastian Stan</span></p>

                </div>
            </div>
        </div>

    </div>
</div>

<div class="container intro-section">
    <div class="row">
        <div class="col-md-12">
            <div class="title">
                <h3>Ik sta klaar voor uw vragen</h3>
                <hr class="divider"/>
            </div>
            <p>
                Dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo,
                rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend
                tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.
            </p>
        </div>
    </div>
</div>

<div class="container contact-form">
    <div class="row">
        <div class="col-md-12">
            <?php echo do_shortcode('[contact-form-7 id="74" title="Contactformulier 1"]'); ?>
        </div>
    </div>
</div>

<div id="call-back" class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="call-back-inner animated">
                <h3>Wilt u teruggebeld worden?</h3>
                <a href="#" id="call-back-activate" class="button-white"><span class="txt">Bel mij terug</span><span class="bg"></span></a>
            </div>

            <div class="call-back-form animated">
                <?php echo do_shortcode('[contact-form-7 id="77" title="Terugbellen"]'); ?>
            </div>

        </div>

        <a href="#" class="close-button button-callback animated"><i class="icon icon-cancel"></i><span class="bg"></span></a>
    </div>
</div>

<div class="container-fluid maps no-padding">
    <script>
        function initMap() {

            // Create an array of styles.
            var styles = [
                {
                    "featureType": "all",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "saturation": 36
                        },
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 40
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 17
                        },
                        {
                            "weight": 1.2
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 29
                        },
                        {
                            "weight": 0.2
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 18
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 19
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                }
            ];
            var myLatLng = new google.maps.LatLng(51.9794907, 5.9095527);

            // Create a new StyledMapType object, passing it the array of styles,
            // as well as the name to be displayed on the map type control.
            var styledMap = new google.maps.StyledMapType(styles,
                {name: "Styled Map"});

            // Create a map object, and include the MapTypeId to add
            // to the map type control.
            var mapOptions = {
                zoom: 14,
                disableDefaultUI: false,
                center: myLatLng,
                mapTypeControlOptions: {
                    mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
                }
            };

            var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Media Critics',
                animation: google.maps.Animation.DROP
            });

            //Associate the styled map with the MapTypeId and set it to display.
            map.mapTypes.set('map_style', styledMap);
            map.setMapTypeId('map_style');
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTt9O5A-JKM5ashi6K_3rCsHCdSkkVUuU&callback=initMap"></script>
    <div id="map-canvas" style="min-height: 300px"></div>
</div>


<?php get_footer(); ?>