
@if(Auth::check())
            <header class="mdl-layout__header mdl-layout__header--scroll">
                <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title">Dac Gis</span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation -->
                    <nav class="mdl-navigation">
                        <a class="mdl-navigation__link" href="{{ URL::route('map.index') }}">Mapas Disponíveis</a>
                        <a class="mdl-navigation__link" href="#" id="map-upload--button">Adicionar Mapas</a>                        
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                              class="mdl-navigation__link">
                            Logout
                          
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                          {{ csrf_field() }}
                        </form>
                    </nav>
                </div>
            </header>
        @else
            <header class="mdl-layout__header mdl-layout__header--waterfall">
                <!-- Top row -->
                <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">Dac GIS</span>
                <div class="mdl-layout-spacer"></div>
                <nav class="mdl-navigation">
                    <div class="form-login">
                        <label for="email" class="form-login--email">Email</label><br>
                        <input id="email" type="text" name="email" class="form-login--input" form="form-login">
                    </div>
                    <div class="form-login">
                        <label for="password" class="form-login--email">Senha</label><br>
                        <input id="password" type="password" name="password" class="form-login--input" form="form-login">                            
                    </div>
                    <div class="form-login">
                        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent form-login--button" form="form-login">Entrar</button>
                    </div>
                    <form id="form-login" action="{{ route('login') }}" method="POST">
                        {{ csrf_field() }}
                    </form>
                </nav>
            </div>

            <!-- Bottom row -->
            <div class="mdl-layout__header-row">                    
                <div class="mdl-layout-spacer"></div>
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="{{ url('/password/reset') }}">Esqueceu a senha?</a>
                    <a class="mdl-navigation__link" href="{{ url('/register') }}">Registrar-se</a>
                </nav>        
            </div>
            </header>
        @endif
