@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Create Post</h3>
                    <form method="POST" action="/create" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="userId" value="{{ auth()->user()->id }}">
                        <div class="form-group">
                            <label for="title">Заглавие:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        </div>
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="description">Описание:</label>
                            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="image">Снимка:</label>
                            <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="categories">Категории:</label>
                            <select class="form-control" id="categories" name="categories[]" multiple>
                                @foreach($category as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        @error('categories')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
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
