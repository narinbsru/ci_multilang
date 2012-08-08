<!DOCTYPE html>
<html>
    <head>
        <title>Google Maps V3 Demostrate</title>
        <!--  language = ภาษา , region = ประเทศ  -->
        <script src="http://maps.googleapis.com/maps/api/js?v=3.9&sensor=false&language=th&region=GB"></script>
        <script>
            function initWithMapStart() {
                var latlng = new google.maps.LatLng(13.75, 100.517);
                var mapOptions = {
                    zoom: 12,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var maps = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
                
                var marker = new google.maps.Marker({
                    position: latlng,
                    map: maps,
                    animation: google.maps.Animation.DROP,
                    title: "Welcome to Thailand",
                    icon: "http://localhost:8080/ci_multilang/images/ihome.png"
                });
                
                var info = new google.maps.InfoWindow({
                    content: '<h1>Hello</h1>'
                });
                google.maps.event.addListener(
                marker,
                'click',
                function() {
                    info.open(maps, marker);
                }
            );
            }
            
            
            
            /*
             if (useragent.indexOf('iPhone') != -1 || useragent.indexOf('Android') != -1 ) {
                mapdiv.style.width = '100%';
                mapdiv.style.height = '100%';
              } else {
                mapdiv.style.width = '600px';
                mapdiv.style.height = '800px';
              }
             */
        </script>
        <style>
            header,
            footer {
                text-align: center;
            }
            #map-canvas {
                display: block;
                margin: 20px auto;
                height: 400px;
                width: 640px;
                background-color: #ccc;
            }
        </style>
    </head>
    <body onload="initWithMapStart()">
        <header>
            <h1>Google Maps Demo</h1>
        </header>
        <article>
            <div id="map-canvas"></div>
        </article>
        <footer>
        </footer>
    </body>
</html>