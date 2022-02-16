<?php
require_once "connection.php";
    if( $_SERVER['REQUEST_METHOD']=='GET' && isset( $_GET['ajax'] ) ){

        $dbhost =   'localhost';
        $dbuser =   'root'; 
        $dbpwd  =   ''; 
        $dbname =   'geolocation';
        $db     =   new mysqli( $dbhost, $dbuser, $dbpwd, $dbname );

        $places=array();

        $sql    =   'select 
                        AGENT_NAME,
                        AGENT_LATITUDE,
                        AGENT_LONGITUDE
                        from `agents`
                        ';

        $res    =   $db->query( $sql );
        if( $res ) 
            while( $rs=$res->fetch_object() )
                $places[]=array( 'latitude'=>$rs->AGENT_LATITUDE, 'longitude'=>$rs->AGENT_LONGITUDE, 'name'=>$rs->AGENT_NAME );
                $db->close();

        header( 'Content-Type: application/json' );
        echo json_encode( $places,JSON_FORCE_OBJECT );
        exit();
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'/>
        <title>Google Maps</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src='https://maps.google.com/maps/api/js' type='text/javascript'></script>
        <script type='text/javascript'>
            (function(){

                var map,marker,center,bounds,infowin;
                /* initial locations for map*/

                var getacara=0; 

                function showMap(){
                    /* set the default initial location of the map */
                    center={ lat: -1.1559, lng: 36.6715 };

                    bounds = new google.maps.LatLngBounds();
                    infowin = new google.maps.InfoWindow();

                    /* invoke the map */
                    map = new google.maps.Map( document.getElementById('map'), {
                       center:center,
                       zoom: 10,
                    });
                    /* show the initial marker */
                    marker = new google.maps.Marker({
                       position:center,
                       map: map,
                       title: 'Here'
                    });
                    bounds.extend( marker.position );
                    
                    const locationButton = document.createElement("button");
                    //getting the current location of the device 
                    
                    locationButton.textContent = "Pan to Current Location";
                    locationButton.classList.add("custom-map-control-button");
                    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
                    locationButton.addEventListener("click", () => {
                        // Try HTML5 geolocation.
                        if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            (position) => {
                            const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };

                            infowin.setPosition(pos);
                            infowin.setContent("Your Location.");
                            infowin.open(map);
                            map.setCenter(pos);
                            },
                            () => {
                            handleLocationError(true, infowin, map.getCenter());
                            }	
                        );
                        } 
                        else {
                        // Browser doesn't support Geolocation
                        handleLocationError(false, infowin, map.getCenter());
                        }
                    });
                    $.ajax({
                        
                        url: document.location.href,
                        data: { 'id': getacara, 'ajax':true },
                        dataType: 'json',
                        success: function( data, status ){
                            $.each( data, function( i,item ){
                                /* add a marker for each location in response data */ 
                                addMarker( item.latitude, item.longitude, item.name );
                            });
                        },
                        error: function(){
                            output.text('There was an error loading the data.');
                        }
                    });                 
                }

                /* simple function just to add a new marker */
                function addMarker(lat,lng,title){
                    marker = new google.maps.Marker({/* Cast the returned data as floats using parseFloat() */
                       position:{ lat:parseFloat( lat ), lng:parseFloat( lng ) },
                       map:map,
                       title:title
                    });

                    google.maps.event.addListener( marker, 'click', function(event){
                        infowin.setContent(this.title);
                        infowin.open(map,this);
                        infowin.setPosition(this.position);
                    }.bind( marker ));

                    bounds.extend( marker.position );
                    map.fitBounds( bounds );
                }


                document.addEventListener( 'DOMContentLoaded', showMap, false );
            }());
        </script>
        <style>
            html, html body, #map{ height:100%; width:100%; padding:0; margin:0; }
        </style>
    </head>
    <body>
        <div id='map'></div>
		<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp8AKESqaZkxdoD1YNjZmVKygfNTRc-MU&callback=showMap&libraries=&v=weekly"
      async
    ></script>
    </body>
</html>