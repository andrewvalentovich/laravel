@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col-sm-12 col-md-10 col-lg-8" style="margin: 0 auto;">
                <h1>Create category</h1>
                <form action="{{ route('tags.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="articleTitle" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="tagName" aria-describedby="tagTitle">
                        <div id="tagName" class="form-text">We'll never share your name with anyone else.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection

