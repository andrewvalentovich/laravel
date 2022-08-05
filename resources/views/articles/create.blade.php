@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col-sm-12 col-md-10 col-lg-8" style="margin: 0 auto;">
                <h1>Create article</h1>
                <form action="{{ route('articles.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="articleTitle" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="articleTitle" aria-describedby="articleTitle">
                        <div id="articleTitle" class="form-text">We'll never share your title with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="selectCategory" class="form-label">Select category</label>
                        <select name="category_id" id="selectCategory"  class="form-select">
                            <option selected value>None</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="articleDescription" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="articleDescription" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="articleImage" class="form-label">Image</label>
                        <input type="text" name="image" class="form-control" id="articleImage" aria-describedby="articleImage">
                        <div id="articleTitle" class="form-text">We'll never share your image with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="articleContent" class="form-label">Content</label>
                        <textarea name="content" class="form-control" id="articleContent" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection

