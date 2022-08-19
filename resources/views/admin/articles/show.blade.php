@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row flex-column py-5">
            <div class="d-flex">
                <a class="btn btn-primary" href="{{ route('admin.articles.edit', ['article' => $article->id]) }}">Edit article</a>
                <form action="{{ route('admin.articles.delete', ['article' => $article]) }}" method="post" class="mx-1">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete article" class="btn btn-danger">
                </form>
            </div>
            <div class="pt-5">
                <h1>{{ $article->id }} {{ $article->title }}</h1>
                <i>{{ $article->description }}</i>
                <div>
                    <small></small>
                </div>
                <p class="pt-4">{{ $article->content }}</p>
            </div>
        </div>
    </div>
@endsection

