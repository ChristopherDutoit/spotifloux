<html>
    <head>
        <meta charset='UTF-8'>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Titre de la page</title>
        <link href="/css/style.css" rel="stylesheet">
    </head>
    <body>
        <header><h1>Mon application musical</h1>
       
        </header>

        <nav class="mainNav">
            <a href="/">Home</a>
            <a href="/nouvelle/chanson">Nouvelle chanson</a>
            @auth 
            Bonjour {{Auth ::user()->name}}
            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            @else 
            <a href="/login">Login </a>
            <a href="/register">register</a>
            @endauth
            <a href="/about">About Me</a>
        </nav> 

        <main>
        <audio id="lecteur" controls>
        </audio>
        <h2>La musique de ce génie</h2>
        
            @yield("content") 
        </main>     
    </body>   
    <script src="/js/jquery.js"></script>
    <script src="/js/divers.js"></script>
</html>    