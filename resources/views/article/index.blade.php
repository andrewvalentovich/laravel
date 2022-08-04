@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row pt-5">
            <div>
                @foreach($articles as $article)
                    <div>{{ $article->id }} {{ $article->title }}</div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

