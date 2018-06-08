@extends('layouts.app')

@section('content')

<div>
    <h1 class="margin-auto align-center">Minas Gerais</h1>
</div>

<div class="mdl-grid">
	<div class="mdl-cell mdl-cell--2-col">
		<div id="map-menu">
			<h3>Opções</h3>
			<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" 
				for="option-vegetacao">
				<input type="radio" id="option-vegetacao" 
					class="mdl-radio__button opt-check" 
					name="options" value="vegetacao"
					data-rota="{{ route('layer.show', 1) }}"
					data-propriedade="VEGET"
					data-map-type="polygon">
			  	<span class="mdl-radio__label">Vegetação</span>
			</label>	

			<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" 
				for="opt-bacias-federais">
				<input type="radio" id="opt-bacias-federais"
					class="mdl-radio__button opt-check"
					name="options" value="bacias"
					data-rota="{{ route('map.getJson', 16) }}"
					data-propriedade="FEDERAL"
					data-map-type="polygon">
				<span class="mdl-checkbox__label">Bacias Federais</span>
			</label>

			<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" 
				for="opt-excedente-hidrico">
				<input type="radio" id="opt-excedente-hidrico"
					class="mdl-radio__button opt-check"
					name="options" value="excedente"
					data-rota="{{ route('map.getJson', 18) }}"
					data-propriedade="EXCEDE"
					data-map-type="polygon">
				<span class="mdl-checkbox__label">Excedente Hídrico</span>
			</label>

			<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" 
				for="opt-reflorestamento">
				<input type="radio" id="opt-reflorestamento"
					class="mdl-radio__button opt-check"
					name="options" value="reflorestamento"
					data-rota="{{ route('map.getJson', 20)}} "
					data-propriedade="REGIAO"
					data-map-type="polygon">
				<span class="mdl-checkbox__label">Reflorestamento</span>
			</label>
			<br>
			<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" 
				for="opt-solo">
				<input type="radio" id="opt-solo"
					class="mdl-radio__button opt-check"
					name="options" value="solo"
					data-rota="{{ route('map.getJson', 22)}} "
					data-propriedade="GRUPO_SOLO"
					data-map-type="polygon">
				<span class="mdl-checkbox__label">Solo</span>
			</label>

			<hr>

			<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" 
				for="opt-rodovia">
				<input type="checkbox" id="opt-rodovia"
					class="mdl-checkbox__input opt-check"
					data-rota="{{ route('map.getJson', 16) }}">
				<span class="mdl-checkbox__label"
				data-map-type="polyline">Rodovia</span>
			</label>

			<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" 
				for="opt-hidrografia">
				<input type="checkbox" id="opt-hidrografia"
					class="mdl-checkbox__input opt-check"
					data-rota="{{ route('map.getJson', 19) }}">
				<span class="mdl-checkbox__label"
				data-map-type="polyline">Hidrografia</span>
			</label>

			<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect limpar-opcoes">
				Limpar
			</button>
		</div>
	</div>
	<div class="mdl-cell mdl-cell--10-col">
		<div id="map" class="">
		</div>
		<div class="legenda-mapa">
			<h3 class="legenda-mapa--titulo">Legenda</h3>
			<div class="legenda-mapa--conteudo">
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('js/DataColors.js') }}"></script>
<script src="{{ asset('js/DataLoader.js') }}"></script>
<script src="{{ asset('js/DataStyler.js') }}"></script>
<script src="{{ asset('js/MapLabel.js') }}"></script>



<script type="text/javascript">
	var map;
	var srcRodovias = 'http://localhost:8000/mapa/14/json';
	//var srcVegetacao = 'http://localhost:8000/mapa/15/json';
	var srcVegetacao = 'http://localhost:8000/api/camada/1';
	var srcBaciasFederais = 'http://localhost:8000/mapa/16/json';
	var srcExcedenteHidrico = 'http://localhost:8000/mapa/18/json';
	var srcHidrografia = 'http://localhost:8000/mapa/19/json';
	var srcReflorestamento = 'http://localhost:8000/mapa/20/json';
	var srcSolo = 'http://localhost:8000/mapa/22/json';

	var colorArray = new Array();
	var propertyArray = new Array();

	var bacias = new Array();
	var grupoSolo = new Array();
	var excedenteHidrico = new Array();
	var reflorestamento = new Array();
	var colorArray = new Array();	
	
	$(".opt-check").change(function(){
		if($(this).is(":checked")){		
			unloadAllData();			
			rota = $(this).data('rota');
			propertyName = $(this).data('propriedade');
			mapType = $(this).data('map-type');
			loadData(rota, propertyArray, colorArray, propertyName, mapType);
		} else {		
			propriedade = $(this).data('propriedade');
			unloadData(propriedade);
		}
	});

	$(".limpar-opcoes").click(function(){
		unloadAllData();
	});


function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: {lat: -19.899, lng: -43.9853}
    });

}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcr9ehCQd6sl4KuJf0HpPfPaYlsl86310&callback=initMap"
    async defer></script>

@endsection