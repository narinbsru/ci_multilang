<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            #map_canvas {
                height:600px;
                width:800px;
                float: left;
            }
            .forminsert{
                width: 300px;
                margin-left: 30px;
                float: left;
                position: relative;
                top: 0;
            }
            .forminsert .text{
                width: 340px;
            }
            .forminsert p label{

            }
            body{
                width: 100%;
            }
            strong{
                color: #009999;
                font-size: 16px;
            }
        </style>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

        <script type="text/javascript">
            var map;
            var markersArray = [];

            function initMap()
            {
                // Create an array of styles.
                var styles = [
                    {
                        featureType:"water",
                        elementType: "geometry",
                        stylers: [
                            { hue: '#00fff7' }
                        ]
                    },
                    {
                        featureType:"administrative.country",
                        elementType: "all",
                        stylers: [
                            {color: "#333333"},
                            {weight: "0.2"}
                        ]
                    },
                    {
                        featureType:"administrative",
                        elementType: "all",
                        stylers: [
                            {color: "#00638D"},
                            {weight: "0.2"}
                        ]
                    },
                    {
                        featureType:"poi.park",
                        elementType: "geometry.fill",
                        stylers: [
                            {color: "#D8D8D8"}
                        ]
                    }
                ];
                
                var styledMap = new google.maps.StyledMapType(styles,
                {name: "Styled Map"});
                
                var latlng = new google.maps.LatLng(41, 29);
                var myOptions = {
                    zoom: 2,
                    center: latlng,
                    mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
                };
                map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

                map.mapTypes.set('map_style', styledMap);
                map.setMapTypeId('map_style');
                
                // add a click event handler to the map object
                google.maps.event.addListener(map, "click", function(event)
                {
                    // place a marker
                    placeMarker(event.latLng);

                    // display the lat/lng in your form's lat/lng fields
                    document.getElementById("latFld").value = event.latLng.lat();
                    document.getElementById("lngFld").value = event.latLng.lng();
                });
            }
            function placeMarker(location) {
                // first remove all markers if there are any
                deleteOverlays();

                var marker = new google.maps.Marker({
                    position: location, 
                    map: map
                });

                // add marker in markers array
                markersArray.push(marker);

                //map.setCenter(location);
            }

            // Deletes all markers in the array by removing references to them
            function deleteOverlays() {
                if (markersArray) {
                    for (i in markersArray) {
                        markersArray[i].setMap(null);
                    }
                    markersArray.length = 0;
                }
            }
        </script>
    </head>
    <body onload="initMap()">
        <div id="map_canvas"></div>
        <div class="forminsert">
            <form action="" method="post"  enctype="multipart/form-data">
                <p><label>Title : </label></p><p> <input type="text" class="text" name="title"/></p>
                <p><label>Description : </label> </p><p> <textarea name="description" rows="5" cols="50"></textarea></p>
                <p><label>Image : </label></p><p> <input type="file" name="img"/></p>
                <p><input type="hidden" name="latFld" id="latFld" /><p>
                <p><input type="hidden" name="lngFld" id="lngFld"/></p>
                <p>
                    <input type="submit" name="submit" value="Save" />
                    <input type="reset" name="reset" value="Reset"/>
                </p>
            </form>
        </div>
    </body>
</html>