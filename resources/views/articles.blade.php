@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row pt-5">
            @foreach($articles as $article)
                <div>{{ $article->title }}</div>
                <div>{{ $article->article_content }}</div>
                <div>{{ $article->likes }}</div>
            @endforeach
        </div>
    </div>
@endsection


