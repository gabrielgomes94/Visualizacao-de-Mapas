@extends('layouts.app')

@section('content')

<div>
    <h1 class="margin-auto align-center">{{ $map->name }}</h1>
</div>
<div id="map" class="" data-route="{{ route('map.getJson', $map->id) }}">
    
</div>



<script type="text/javascript">
</script>

<script type="text/javascript">
	var map;
function initMap() {
	var jsonRoute = $('#map').data('route');
	$.getJSON(jsonRoute, function(data){
		console.log(data);
	    map = new google.maps.Map(document.getElementById('map'), {
	        zoom: 8,
	        center: {lat: 0, lng: 0}
	    });
	    map.data.addGeoJson(data)

	    map.data.setStyle({ fillColor: 'green', strokeWeight: 1 });

        map.data.setStyle(function (feature) {
            var name = feature.getProperty('VEGET');
			if(name == 'CERRADO E CAMPO CERRADO'){
				color = 'red';
			} else if(name == 'CAMPO RUPESTRE DE ALTITUDE'){
				color = 'green';
			} else if(name == 'CAATINGA'){
				color = 'blue';
			} else if(name == 'FLORESTA  ATL�NTICA'){
				color = 'yellow';
			}
			else {
				color = 'blue';
			}
            return {
                fillColor: color,
                strokeWeight: 1
            };
        });
	});
}
</script>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcr9ehCQd6sl4KuJf0HpPfPaYlsl86310&callback=initMap"
    async defer></script>

@endsection