@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Edit Post</h3>
                    <form method="POST" action="/update/{{ $post->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Заглавие:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                        </div>
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="description">Описание:</label>
                            <textarea class="form-control" id="description" name="description">{{ $post->description }}</textarea>
                        </div>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="image">Снимка:</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if($post->image == null)
                            <img src="{{ asset('storage/image/noImage.jpg')}}" class="card-img-top" alt="Post Image" style="width: 200px; height: 200px;">
                            @else
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Post Image" style="width: 200px; height: 200px;">
                            @endif
                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="categories">Категории:</label>
                            <select class="form-control" id="categories" name="categories[]" multiple>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ in_array($category->id, $postCategoryIds) ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('categories')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-3">Изпрати</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection