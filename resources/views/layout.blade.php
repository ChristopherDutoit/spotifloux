<html>
    <head>
        <meta charset='UTF-8'>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Titre de la page</title>
        <link href="/css/style.css" rel="stylesheet">
    </head>
    <body>
        <header>
        <img src="/img/logo.png">    
        <h1>Ostound</h1>
        <nav class="mainNav">
            <a href="/">Home</a>
            <a href="/nouvelle/chanson">Nouvelle chanson</a>
            @auth 
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
       
        </header>
        <div class="Auth"> 
  
            </div>

         

        <main>
        <audio id="lecteur" controls>
        </audio>
        
        
            @yield("content") 
        
        </main>     
    </body>   
    <script src="/js/jquery.js"></script>
    <script src="/js/divers.js"></script>
</html>    