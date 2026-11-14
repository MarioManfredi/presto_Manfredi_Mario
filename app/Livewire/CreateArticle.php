<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\ResizeImage;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticle extends Component
{

    use WithFileUploads;

    #[Validate('required', message: 'Il titolo è obbligatorio')]
    #[Validate('min:3', message: 'Il titolo deve avere almeno 3 caratteri')]
    public $title;

    #[Validate('required', message: 'Il prezzo è obbligatorio')]
    #[Validate('numeric', message: 'Il prezzo deve essere un numero valido')]
    public $price;

    #[Validate('required', message: 'La descrizione è obbligatoria')]
    #[Validate('min:15', message: 'La descrizione deve contenere almeno 15 caratteri')] 
    public $description;

    #[Validate('required', message: 'La categoria è obbligatoria')]
    public $category = '';

    public $images = [];
    public $temporary_images;

    public $article;


    public function store() {

        $this->validate();

        $this->article = Article::create([

            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'category_id' => $this->category,
            'user_id' => Auth::id()

        ]);

        if(count($this->images) > 0) {

            foreach($this->images as $image) {

                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);
                dispatch(new ResizeImage($newImage->path, 400, 400));
                dispatch(new GoogleVisionSafeSearch($newImage->id));
                dispatch(new GoogleVisionLabelImage($newImage->id));

            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
            
            session()->flash('message', 'Articolo inserito correttamente');

        }else {

            session()->flash('message', 'Articolo inserito correttamente con immagini casuali');

        }

        $this->reset();
        $this->cleanForm();

    }

    public function updatedTemporaryImages() {

        if($this->validate([

            'temporary_images.*' => 'image|max:1024',
            'temporary_images' => 'max:6'

        ])) {

            foreach ($this->temporary_images as $image) {

                $this->images[] = $image;

            }
        }
    }

    public function removeImage($key) {

        if(in_array($key, array_keys($this->images))) {

            unset($this->images[$key]);

        }

    }

    protected function cleanForm() {

        $this->title = '';
        $this->description = '';
        $this->category = '';
        $this->price = '';
        $this->images = [];

    }

    public function render()
    {

        return view('livewire.create-article');

    }
}
