@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="d-flex">
                <a class="btn btn-primary" href="{{ route('categories.edit', ['category' => $category->id]) }}">Edit category</a>
                <form action="{{ route('categories.delete', ['category' => $category]) }}" method="post" class="ms-1">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete article" class="btn btn-danger">
                </form>
            </div>
            <div class="pt-5">
                <h1>{{ $category->id }} {{ $category->name }}</h1>
            </div>
        </div>
    </div>
@endsection

