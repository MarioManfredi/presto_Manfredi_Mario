<div class="card card-custom text-center">
    <div class="card-header py-3">
        Creato da {{$article->user->name}}
    </div>
    <div class="card-body">
        <h5 class="card-title">{{$article->title}}</h5>
        <h6 class="lead">{{$article->price}} €</h6>
        <p class="card-text">{{$article->description}}</p>
        <p class="card-text category">#{{$article->category->name}}</p>
        <a href="{{route('article.show', compact('article'))}}" class="btn btn-card">Dettaglio →</a>
    </div>
    <div class="card-footer text-body-secondary">
        {{$article->created_at->format('d/m/Y H:i')}}
    </div>
</div>