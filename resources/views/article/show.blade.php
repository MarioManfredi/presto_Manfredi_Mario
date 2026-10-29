<x-layout>
    
    <x-masthead title="Dettaglio dell'articolo: {{$article->title}}"/>
        
        
        
        <div class="container mt-5">
            <div class="row mt-5 justify-content-center align-items-center">
                <div class="col-12 col-md-4">
                    <div class="py-3">
                        <span class="fw-bold">Creato da {{$article->user->name}}</span> il {{$article->created_at->format('d/m/Y H:i')}}
                    </div>

                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="https://picsum.photos/400" class="d-block img-custom shadow img-fluid" alt="...">
                            </div>
                            <div class="swiper-slide">
                                <img src="https://picsum.photos/401" class="d-block img-custom shadow img-fluid" alt="...">
                            </div>
                            <div class="swiper-slide">
                                <img src="https://picsum.photos/402" class="d-block img-custom shadow img-fluid" alt="...">
                            </div>
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
                    <p class="card-text category">#{{$article->category->name}}</p>
                
                    <a href="{{route('article.index')}}" class="btn btn-card">Torna indietro</a>
                </div>
            </div>
        </div>
        
        
        
    </x-layout>