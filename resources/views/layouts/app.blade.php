<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-light_blue.min.css" />
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style type="text/css">
        html, body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;            
        }

        #map {
            height: 500px;
        }

        .border{
            border: 1px solid black;
        }
    </style>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div class="mdl-layout mdl-js-layout">

        
        @include('layouts.menu')
        

        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Title</span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div class="page-content">
                @yield('content')                
                
            </div>
        </main>
    </div>


    @yield('dialog')
    
    <dialog class="mdl-dialog" id="map-upload">
        <form method="post" action="{{ route('map.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h4 class="mdl-dialog__title">Adicionar um mapa novo</h4>
            <div class="mdl-dialog__content">
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" id="map-name" name="name">
                    <label class="mdl-textfield__label" for="map-name">Nome do mapa</label>
                </div>

                <div class="mdl-textfield mdl-js-textfield">
                    <textarea class="mdl-textfield__input" name="description" type="text" rows= "3" id="map-description" ></textarea>
                    <label class="mdl-textfield__label" for="map-description">Descrição</label>
                </div>

                <span class="upload-json">
                    <label class="mdl-button mdl-js-button mdl-button--icon question__create-image--button" id="map-json-label" for="map-json">
                        <i class="material-icons">file_upload</i>                         
                    </label>
                    <label id="map-json--filename"></label>
                </span>
                <input id="map-json" class="display-none" name="geojson"  type="file" accepted=".json" />

            </div>
                <div class="mdl-dialog__actions">
                <button type="submit" class="mdl-button">Adicionar</button>
                <button type="button" class="mdl-button close">Cancelar</button>
            </div>
        </form>
    </dialog>
    <!-- Scripts -->

    <script>
        var dialog = document.querySelector('#map-upload');
        var showDialogButton = document.querySelector('#map-upload--button');
        if (! dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        showDialogButton.addEventListener('click', function() {
            dialog.showModal();
        });
        dialog.querySelector('.close').addEventListener('click', function() {
            dialog.close();
        });
    </script>
    
    <script type="text/javascript">
        $( document ).ready(function(){
            $('input[type=file]').change(function(){   
                console.log($('#map-json').val());
                $('#map-json--filename').text($('#map-json').val()); 
            });
        });
    </script>
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {'X-CSRF-Token' : $('meta[name=csrf-token').attr('content')}
    });
    </script>
</body>
</html>
