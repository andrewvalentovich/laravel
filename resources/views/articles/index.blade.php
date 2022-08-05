@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row pt-5">
            <h1>Index page</h1>
            <div class="list-group pt-5">
                @foreach($articles as $article)
                    <a href="{{ route('articles.show', ['article' => $article->id]) }}"
                       class="list-group-item list-group-item-action"
                       aria-current="true"
                    >
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $article->title }}</h5>
                            <small>{{ $article->created_at }}</small>
                        </div>
                        <small>{{ $article->id }} {{ $article->description }}</small>
                        <p class="mb-1">{{ $article->content }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection

