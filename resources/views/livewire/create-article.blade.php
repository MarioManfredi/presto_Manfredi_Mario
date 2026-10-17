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
        <div class="mb-3">
            <label for="categories" class="form-label">Seleziona una Categoria</label>
            <select wire:model.blur="category" id="category" class="form-control @error('category') is-invalid @enderror">
                <option value="" disabled selected>-- Seleziona una categoria --</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-custom">Crea</button>
        </div>
    </form>
    
</div>
