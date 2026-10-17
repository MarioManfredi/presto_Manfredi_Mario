<x-layout>

    <x-masthead title="Presto"/>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                @auth
                    <a href="{{route('article.create')}}" class="btn btn-adv">Inserisci Annuncio</a>
                @endauth
            </div>
        </div>
    </div>

</x-layout>