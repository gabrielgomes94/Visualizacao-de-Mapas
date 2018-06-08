@extends('layouts.app')

@section('content')
    @if($maps->isNotEmpty())
        <div class="mdl-grid">
        @foreach($maps as $map)
            <a href="{{ route('map.show', $map->id) }}" class="map-link">
            <div class="mdl-cell mdl-cell--4-col">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">{{ $map->name }}</h2> 
                    </div>
                    <div class="mdl-card__supporting-text">
                        {{ $map->description }}
                    </div>
                </div>
            </div>
            </a>
        @endforeach
        </div>
    @else

    @endif

@endsection
