@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <h1>Index page</h1>
                <div class="list-group pt-5">
                    @foreach($tags as $tag)
                        <a href=""
                           class="list-group-item list-group-item-action"
                           aria-current="true"
                        >
                            <p>{{ $tag->id }} {{ $tag->name }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

