<x-layout>
    
    <x-masthead title="Tutti gli Articoli"/>



    <div class="container mt-5">
        <div class="row mt-5 justify-content-center align-items-center">
            @foreach ($articles as $article)
                <div class="col-12 col-md-4 py-4">
                    <x-card 
                        :article="$article"
                    />
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            <div class="ms-4">{{$articles->links()}}</div>
        </div>
    </div>
    
</x-layout>