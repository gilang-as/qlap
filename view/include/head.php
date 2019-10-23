<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="JobBoard - HTML Template" />
	<meta property="og:title" content="JobBoard - HTML Template" />
	<meta property="og:description" content="JobBoard - HTML Template" />
	<meta property="og:image" content="social-image.png" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON -->
	<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
	
	<!-- PAGE TITLE HERE -->
	<title>Qlap - Ku Lapor Kabupaten Kudus</title>
	
	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="http://job-board.dexignzone.com/xhtml/js/html5shiv.min.js"></script>
	<script src="http://job-board.dexignzone.com/xhtml/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="<?php echo $domain; ?>assets/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $domain; ?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $domain; ?>assets/css/templete.css">
	<link class="skin" rel="stylesheet" type="text/css" href="<?php echo $domain; ?>assets/css/skin/skin-1.css">
	<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="<?php echo $domain;?>assets/js/bjax.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo $domain; ?>assets/css/bjax.min.css">	
    <script type="text/javascript">
          $(document).ready(function() {
            $('[cyine-ajax]').bjax();
          });
	</script>
	<style>
    .gllpMap	{ height: 300px; }
    /* Style the form */
    #regForm {
        margin: 0 auto;
        min-height: 400px;
    }

    /* Style the input fields */
    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
        text-align: center;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    /* Mark the active step: */
    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #4CAF50;
    }

    .paymentWrap {
        padding: 50px;
    }

    .paymentWrap .paymentBtnGroup {
        max-width: 800px;
        margin: auto;
    }

    .paymentWrap .paymentBtnGroup .paymentMethod {
        padding: 40px;
        box-shadow: none;
        position: relative;
    }

    .paymentWrap .paymentBtnGroup .paymentMethod.active {
        outline: none !important;
    }

    .paymentWrap .paymentBtnGroup .paymentMethod.active .method {
        border-color: #6665e8;
        outline: none !important;
        box-shadow: 0px 3px 22px 0px #7b7b7b;
    }

    .paymentWrap .paymentBtnGroup .paymentMethod .method {
        position: absolute;
        right: 3px;
        top: 3px;
        bottom: 3px;
        left: 3px;
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        border: 2px solid transparent;
        transition: all 0.5s;
    }

    .paymentWrap .paymentBtnGroup .paymentMethod .method:hover {
        border-color: #6665e8;
        outline: none !important;
    }
</style>
<script src="<?php echo $domain;?>jquery-2.1.1.min.js"></script>
<script type="text/javascript">
var jQuery_2_1_1 = $.noConflict(true);
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
<script type="text/javascript">
var jQuery_3_1_0 = $.noConflict(true);
</script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDQMx8UbAoT0mkNdBYBOjt2gY0nR6RzUAU&libraries=places&libraries=drawing"></script>
<script>
    (function($) {

    // for ie9 doesn't support debug console >>>
    if (!window.console) window.console = {};
    if (!window.console.log) window.console.log = function () { };
    // ^^^

    $.fn.gMapsLatLonPicker = (function() {

        var _self = this;

        ///////////////////////////////////////////////////////////////////////////////////////////////
        // PARAMETERS (MODIFY THIS PART) //////////////////////////////////////////////////////////////
        _self.params = {
            defLat : 0,
            defLng : 0,
            defZoom : 1,
            queryLocationNameWhenLatLngChanges: true,
            queryElevationWhenLatLngChanges: true,
            mapOptions : {
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: false,
                disableDoubleClickZoom: true,
                zoomControlOptions: true,
                streetViewControl: false
            },
            strings : {
                markerText : "Drag this Marker",
                error_empty_field : "Couldn't find coordinates for this place",
                error_no_results : "Couldn't find coordinates for this place"
            },
            displayError : function(message) {
                alert(message);
            }
        };


        ///////////////////////////////////////////////////////////////////////////////////////////////
        // VARIABLES USED BY THE FUNCTION (DON'T MODIFY THIS PART) ////////////////////////////////////
        _self.vars = {
            ID : null,
            LATLNG : null,
            map : null,
            marker : null,
            geocoder : null
        };

        ///////////////////////////////////////////////////////////////////////////////////////////////
        // PRIVATE FUNCTIONS FOR MANIPULATING DATA ////////////////////////////////////////////////////
        var setPosition = function(position) {
            _self.vars.marker.setPosition(position);
            _self.vars.map.panTo(position);

            $(_self.vars.cssID + ".gllpZoom").val( _self.vars.map.getZoom() );
            $(_self.vars.cssID + ".gllpLongitude").val( position.lng() );
            $(_self.vars.cssID + ".gllpLatitude").val( position.lat() );

            $(_self.vars.cssID).trigger("location_changed", $(_self.vars.cssID));

            if (_self.params.queryLocationNameWhenLatLngChanges) {
                getLocationName(position);
            }
            if (_self.params.queryElevationWhenLatLngChanges) {
                getElevation(position);
            }
        };

        // for reverse geocoding
        var getLocationName = function(position) {
            var latlng = new google.maps.LatLng(position.lat(), position.lng());
            _self.vars.geocoder.geocode({'latLng': latlng}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK && results[1]) {
                    $(_self.vars.cssID + ".gllpLocationName").val(results[1].formatted_address);
                } else {
                    $(_self.vars.cssID + ".gllpLocationName").val("");
                }
                $(_self.vars.cssID).trigger("location_name_changed", $(_self.vars.cssID));
            });
        };

        // for getting the elevation value for a position
        var getElevation = function(position) {
            var latlng = new google.maps.LatLng(position.lat(), position.lng());

            var locations = [latlng];

            var positionalRequest = { 'locations': locations };

            _self.vars.elevator.getElevationForLocations(positionalRequest, function(results, status) {
                if (status == google.maps.ElevationStatus.OK) {
                    if (results[0]) {
                        $(_self.vars.cssID + ".gllpElevation").val( results[0].elevation.toFixed(3));
                    } else {
                        $(_self.vars.cssID + ".gllpElevation").val("");
                    }
                } else {
                    $(_self.vars.cssID + ".gllpElevation").val("");
                }
                $(_self.vars.cssID).trigger("elevation_changed", $(_self.vars.cssID));
            });
        };
        
        // search function
        var performSearch = function(string, silent) {
            if (string == "") {
                if (!silent) {
                    _self.params.displayError( _self.params.strings.error_empty_field );
                }
                return;
            }
            _self.vars.geocoder.geocode(
                {"address": string},
                function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        $(_self.vars.cssID + ".gllpZoom").val(11);
                        _self.vars.map.setZoom( parseInt($(_self.vars.cssID + ".gllpZoom").val()) );
                        setPosition( results[0].geometry.location );
                        console.log(results[0].geometry.location);
                    } else {
                        if (!silent) {
                            _self.params.displayError( _self.params.strings.error_no_results );
                        }
                    }
                }
            );
        };

        ///////////////////////////////////////////////////////////////////////////////////////////////
        // PUBLIC FUNCTIONS  //////////////////////////////////////////////////////////////////////////
        var publicfunc = {

            // INITIALIZE MAP ON DIV //////////////////////////////////////////////////////////////////
            init : function(object) {

                if ( !$(object).attr("id") ) {
                    if ( $(object).attr("name") ) {
                        $(object).attr("id", $(object).attr("name") );
                    } else {
                        $(object).attr("id", "_MAP_" + Math.ceil(Math.random() * 10000) );
                    }
                }

                _self.vars.ID = $(object).attr("id");
                _self.vars.cssID = "#" + _self.vars.ID + " ";

                _self.params.defLat  = $(_self.vars.cssID + ".gllpLatitude").val()  ? $(_self.vars.cssID + ".gllpLatitude").val()		: _self.params.defLat;
                _self.params.defLng  = $(_self.vars.cssID + ".gllpLongitude").val() ? $(_self.vars.cssID + ".gllpLongitude").val()	    : _self.params.defLng;
                _self.params.defZoom = $(_self.vars.cssID + ".gllpZoom").val()      ? parseInt($(_self.vars.cssID + ".gllpZoom").val()) : _self.params.defZoom;

                _self.vars.LATLNG = new google.maps.LatLng(_self.params.defLat, _self.params.defLng);

                _self.vars.MAPOPTIONS		 = _self.params.mapOptions;
                _self.vars.MAPOPTIONS.zoom   = _self.params.defZoom;
                _self.vars.MAPOPTIONS.center = _self.vars.LATLNG;

                _self.vars.map = new google.maps.Map($(_self.vars.cssID + ".gllpMap").get(0), _self.vars.MAPOPTIONS);
                _self.vars.geocoder = new google.maps.Geocoder();
                _self.vars.elevator = new google.maps.ElevationService();

                _self.vars.marker = new google.maps.Marker({
                    position: _self.vars.LATLNG,
                    map: _self.vars.map,
                    title: _self.params.strings.markerText,
                    draggable: true
                });

                // Set position on doubleclick
                google.maps.event.addListener(_self.vars.map, 'dblclick', function(event) {
                    setPosition(event.latLng);
                    console.log(event.latLng);
                });

                // Set position on marker move
                google.maps.event.addListener(_self.vars.marker, 'dragend', function(event) {
                    setPosition(_self.vars.marker.position);
                });

                // Set zoom feld's value when user changes zoom on the map
                google.maps.event.addListener(_self.vars.map, 'zoom_changed', function(event) {
                    $(_self.vars.cssID + ".gllpZoom").val( _self.vars.map.getZoom() );
                    $(_self.vars.cssID).trigger("location_changed", $(_self.vars.cssID));
                });

                // Update location and zoom values based on input field's value
                $(_self.vars.cssID + ".gllpUpdateButton").bind("click", function() {
                    var lat = $(_self.vars.cssID + ".gllpLatitude").val();
                    var lng = $(_self.vars.cssID + ".gllpLongitude").val();
                    var latlng = new google.maps.LatLng(lat, lng);
                    _self.vars.map.setZoom( parseInt( $(_self.vars.cssID + ".gllpZoom").val() ) );
                    setPosition(latlng);
                });
                $(_self.vars.cssID + ".myLocation").bind("click", function() {
                    navigator.geolocation.getCurrentPosition(showPosition);	
                    function showPosition(position) {
                        var lat =  position.coords.latitude;
                        var lng = position.coords.longitude; 
                        var latlng = new google.maps.LatLng(lat, lng);
                        setPosition(latlng);
                        console.log(lat);
                    }
                });

                // Search function by search button
                $(_self.vars.cssID + ".gllpSearchButton").bind("click", function() {
                    performSearch( $(_self.vars.cssID + ".gllpSearchField").val(), false );
                });

                // Search function by gllp_perform_search listener
                $(document).bind("gllp_perform_search", function(event, object) {
                    performSearch( $(object).attr('string'), true );
                });

                // Zoom function triggered by gllp_perform_zoom listener
                $(document).bind("gllp_update_fields", function(event) {
                    var lat = $(_self.vars.cssID + ".gllpLatitude").val();
                    var lng = $(_self.vars.cssID + ".gllpLongitude").val();
                    var latlng = new google.maps.LatLng(lat, lng);
                    _self.vars.map.setZoom( parseInt( $(_self.vars.cssID + ".gllpZoom").val() ) );
                    setPosition(latlng);
                });
            },

            // EXPORT PARAMS TO EASILY MODIFY THEM ////////////////////////////////////////////////////
            params : _self.params

        };

        return publicfunc;
    });
        
    $(document).ready( function() {
        if (!$.gMapsLatLonPickerNoAutoInit) {
            $(".gllpLatlonPicker").each(function () {
                $obj = $(document).gMapsLatLonPicker();
                $obj.init( $(this) );
            });
        }
    });

    $(document).bind("location_changed", function(event, object) {
        console.log("changed: " + $(object).attr('id') );
    });
    
    }(jQuery_2_1_1));
</script>
</head>