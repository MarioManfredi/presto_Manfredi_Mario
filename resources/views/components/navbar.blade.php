<nav class="navbar navbar-expand-lg bg-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('welcome')}}">
            <img src="/logo/logo.png" class="img-fluid" width="50px" alt="Logo Presto">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('welcome')}}">Home</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('article.create')}}">Crea Annuncio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('article.index')}}">Tutti gli Articoli</a>
                    </li>

                    @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-link position-relative" aria-current="page" href="{{route('revisor.index')}}">Zona revisione
                                <span class="position-absolute color1" style="left: 91%; top:-7%;"> {{ \App\Models\Article::revisedCount() }}</span>
                            </a>
                        </li>
                    @endif

                    @if (!Auth::user()->is_revisor)
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('revisor.form')}}">Lavora con Noi</a>
                    </li>
                    @endif
                    
                @endauth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorie
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="{{route('byCategory', ['category'=>$category])}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item me-custom">
                        <form action="{{route('article.search')}}" method="GET">
                            <div class="input-group">
                                <input type="search" name="query" class="form-control" placeholder="Search" aria-label="Search">
                                <input type="hidden" name="field" id="field" value="all">

                                <div class="dropdown">
                                    <button class="btn btn-search dropdown-toggle" type="button" data-bs-toggle="dropdown"><span id="selectedField">Ricerca in</span></button>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="document.getElementById('field').value='all'; document.getElementById('selectedField').innerText='Tutto'; return false;">All</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="document.getElementById('field').value='title'; document.getElementById('selectedField').innerText='Titolo'; return false;">Titolo</a>
                                        </li>
                                        <li>
                                           <a class="dropdown-item" href="#" onclick="document.getElementById('field').value='description'; document.getElementById('selectedField').innerText='Descrizione'; return false;">Descrizione</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" onclick="document.getElementById('field').value='category'; document.getElementById('selectedField').innerText='Categoria'; return false;">Categoria</a>
                                        </li>
                                    </ul>
                                </div>

                                <button type="submit" class="input-group-text btn btn-custom-search" id="basic-addon2">Search</button>
                            </div>
                        </form>
                </li>
                @guest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
                        <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                    </ul>
                </li>
                @endguest
                
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ciao, {{Auth::user()->name}}!
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <button class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>