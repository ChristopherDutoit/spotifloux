<html>
    <head>
        <meta charset='UTF-8'>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Titre de la page</title>
        <link href="/css/style.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <img style="padding:30px 30px;" src="/images/Fichier 1.png">
        <div class="menu">
        <h1>Accueil</h1>
        <h1>Connexion</h1>
        <h1>Publier</h1>
        <h1>Profil</h1>
        </div>
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
            <h2 style="color:white">Reprendre la lecture</h2>
            <h2 style="color:white">Mes abonnements</h2>
        </main>     
    </body>   
    <script src="/js/jquery.js"></script>
    <script src="/js/divers.js"></script>
</html>    