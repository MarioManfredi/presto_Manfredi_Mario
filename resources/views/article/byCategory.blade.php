<x-layout>
    
    <x-masthead title="{{$category->name}}"/>

    <div class="container mt-5">
        <div class="row mt-5 justify-content-center align-items-center">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4 py-4">
                    <x-card
                        :article="$article"
                    />
                </div>
            @empty
               <div class="col-12 col-md-6 d-flex justify-content-center">
                @auth
                    <a href="{{route('article.create')}}" class="btn btn-adv">Inserisci Annuncio</a>
                @endauth
            </div>
            @endforelse
        </div>
    </div>
    
</x-layout>