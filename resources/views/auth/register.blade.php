<x-layout>
    
    <x-masthead title="Registrati"/>

    <x-errors/>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form class="rounded-4 shadow p-5" method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-custom">Registrati</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</x-layout>