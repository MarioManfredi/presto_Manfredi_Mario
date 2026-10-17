<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateArticle extends Component
{

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

        $this->reset();

        session()->flash('message', 'Articolo inserito correttamente');

    }

    public function render()
    {

        return view('livewire.create-article');

    }
}
