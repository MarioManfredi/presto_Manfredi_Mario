<x-layout>
    
    <x-masthead title="Lavora con noi"/>
    
    <x-errors/>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form class="rounded-4 shadow p-5">
                    @csrf
                    <h6 class="text-center">Vuoi diventare revisore? Cliccando il bottone farai richiesta!</h6>
                    <div class="d-flex justify-content-center">
                        <a href="{{route('requestRevisor')}}" class="btn btn-custom">Diventa revisor</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</x-layout>