<div>
    
    <form class="rounded-4 shadow p-5" wire:submit="store">
        
       <x-message/>
        
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" wire:model.blur="title">
            @error('title') <span class="error-custom">{{ $message }}</span> @enderror 
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="text" class="form-control" id="price" wire:model.blur="price">
            @error('price') <span class="error-custom">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" wire:model.blur="description" id="description" cols="30" rows="10"></textarea>
            @error('description') <span class="error-custom">{{ $message }}</span> @enderror
        </div>
        <div class="mb-5">
            <label for="categories" class="form-label">Seleziona una Categoria</label>
            <select wire:model.blur="category" id="category" class="form-control @error('category') is-invalid @enderror">
                <option value="" disabled selected>-- Seleziona una categoria --</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="imgs" class="form-label">Inserisci una o più Immagini (facoltativo)</label>
            <input type="file" wire:model.live="temporary_images" multiple class="form-control  @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
            @error('temporary_images.*')
                <span class="error-custom">{{ $message }}</span>
            @enderror
            @error('temporary_images')
                <span class="error-custom">{{ $message }}</span>
            @enderror
        </div>
        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>Anteprima Foto</p>
                    <div class="row border border-2 rounded shadow py-3">
                        @foreach ($images as $key => $image)
                            <div class="col d-flex flex-column align-items-center my-3">
                                <div class="img-preview mx-auto rounded" style="background-image: url({{$image->temporaryUrl()}});"></div>
                                <button type="button" class="btn mt-1 btn-danger" wire:click="removeImage({{$key}})">X</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-custom">Crea</button>
        </div>
    </form>
    
</div>
