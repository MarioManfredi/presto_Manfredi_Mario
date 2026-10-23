<?php

namespace App\Http\Controllers;

use App\Mail\ContactRevisor;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    
    public function index() {

        $article = Article::where('is_accepted', null)->first();

        return view('revisor.index', compact('article'));

    }

    public function accept(Article $article) {

        $article->setAccepted(true);
        session(['last_article_id' => $article->id]);
        return redirect()->back()->with('message', "Accettato l'articolo $article->title");

    }

    public function reject(Article $article) {

        $article->setAccepted(false);
        session(['last_article_id' => $article->id]);
        return redirect()->back()->with('message', "Rifiutato l'articolo $article->title");

    }

    public function requestRevisor() {

        Mail::to('admin@presto.it')->send(new ContactRevisor(Auth::user()));
        return redirect()->route('welcome')->with('message', 'Richiesta di diventare revisor inviata!');

    }

    public function makeRevisor(User $user) {

        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }

    public function form() {

        return view('revisor.form');

    }

    public function cancel() {

        $articleId = session('last_article_id');

        if (!$articleId) {
            return redirect()->back()->with('message', 'Nessuna operazione da annullare');
        }

        $article = Article::find($articleId);

        if (!$article) {
            return redirect()->back()->with('message', 'Articolo non trovato');
        }

        $article->is_accepted = null;
        $article->save();
        $article->refresh();

        session()->forget('last_article_id');

        return redirect()->back()->with('message', "Ultima operazione annullata");

    }

}
