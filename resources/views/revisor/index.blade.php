<x-layout>
    
    <x-masthead title="Revisione Articoli"/>
        
        <div class="text-center">
            <form action="{{route('revisor.cancel', ['article' => $article])}}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn btn-custom px-4">Annulla ultima operazione</button>
            </form>
        </div>

        <div class="container mt-5">
            <div class="row mt-5 justify-content-center align-items-center">

               
                <x-message/>

                @if($article)
                    <div class="col-12 col-md-4">
                        <div class="py-3">
                            <span class="fw-bold">Creato da {{$article->user->name}}</span> il {{$article->created_at->format('d/m/Y H:i')}}
                        </div>

                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                
                                @for($i = 0; $i < 3; $i++)
                                    <div class="swiper-slide">
                                        <img src="https://picsum.photos/400?random={{ $i }}" class="d-block img-custom shadow img-fluid" alt="{{$i}}">
                                    </div>
                                @endfor

                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>   
                    </div>
                    <div class="col-12 col-md-8 text-center">
                        <h6>Titolo</h6>
                        <h5 class="card-title mb-4">{{$article->title}}</h5>

                        <h6>Prezzo</h6>
                        <h5 class="lead mb-4">{{$article->price}} €</h5>
                        
                        <h6>Descrizione</h6>
                        <h5 class="card-text mb-4">{{$article->description}}</h5>
                        
                        <h6>Categoria</h6>
                        <p class="card-text category mb-4">#{{$article->category->name}}</p>

                        <div class="d-flex justify-content-center">
                            <form action="{{route('revisor.reject', ['article' => $article])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-custom px-4">Rifiuta</button>
                            </form>
                            <form action="{{route('revisor.accept', ['article' => $article])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-custom px-4">Accetta</button>
                            </form>
                        </div>
                    </div>
                @endif
                
            </div>
        </div>
        
    </x-layout>