@extends('layouts.app')

@section('content')
<div id="map" class=""></div>
<script src="maps/geojson-municipios.geojson"></script>
<script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: {lat: -28, lng: 137}
            });

            // NOTE: This uses cross-domain XHR, and may not work on older browsers.
            map.data.addGeoJson(data);              
        }
        
        
    </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEzRWaZPpl4CLklC9sPkoOid6sEWtTPt8&callback=initMap"
        async defer></script>
@endsection