@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <h1>Index page</h1>
                <div class="list-group pt-5">
                    @foreach($categories as $category)
                        <a href="{{ route('categories.show', ['category' => $category->id]) }}"
                           class="list-group-item list-group-item-action"
                           aria-current="true"
                        >
                            <small>{{ $category->t }}</small>
                            <p>{{ $category->id }} {{ $category->name }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

