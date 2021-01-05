<!Doctype html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Todo-list') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body style="background-color:rgb(245, 240, 240);">
    <div id="app" class="position-relative">

                <!-- popup for message -->
        @if(session('message'))
            <div class="toast position-absolute right-0 mr-3" style="z-index:20;" data-autohide="false">
                <div class="toast-body bg-success text-white d-flex justify-content-between">
                    <div>
                        <strong>
                            {{session('message')}}
                        </strong>
                    </div>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">
                        &times;
                    </button>
                </div>
            </div>
        @endif
        <!-- end -->


        <div class="py-3 px-5  d-flex justify-content-between align-items-center bg-white shadow-sm">

            <a class="block font-weight-bold text-dark text-md" href="{{ url('/') }}">
                {{ config('app.name', 'Todo-list') }}
            </a>
        
            <div>
                @guest
                    <div class="flex items-center">
                        <a class="block tracking-wide text-dark" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                        @if (Route::has('register'))
                            <a class="block ml-2 tracking-wide text-dark" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        @endif
                    </div>
                @else
                    
                <div class="dropdown">
                    <a id="Dropdown" class="dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Dropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

                @endguest
               
            </div>
            
        </div>

        <main class="py-4">
           {{ $slot }}
        </main>
        


        
    </div>
    @livewireScripts
    
</body>
    <script src="http://unpkg.com/turbolinks"></script>
</html>
