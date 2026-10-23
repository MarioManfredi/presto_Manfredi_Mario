<x-layout>

    <x-masthead title="Presto"/>

    <div class="container mt-5">
        <div class="row justify-content-center">

            <x-message/>

            <div class="col-12 col-md-6 d-flex justify-content-center">
                @auth
                    <a href="{{route('article.create')}}" class="btn btn-adv">Inserisci Annuncio</a>
                @endauth
            </div>
        </div>

        <div class="row mt-5 justify-content-center align-items-center">
            @foreach ($articles as $article)
                <div class="col-12 col-md-4 py-4">
                    <x-card 
                        :article="$article"
                    />
                </div>
            @endforeach
        </div>
    </div>

</x-layout>