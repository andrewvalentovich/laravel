@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col-sm-12 col-md-10 col-lg-8" style="margin: 0 auto;">
                <h1>Create article</h1>
                <form action="" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="articleTitle" class="form-label">Title</label>
                        <input type="text" value="{{ $tags->name }}" name="name" class="form-control" id="categoryName" aria-describedby="articleTitle">
                        <div id="articleTitle" class="form-text">We'll never share your name with anyone else.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

