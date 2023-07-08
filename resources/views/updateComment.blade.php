@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Edit Comment</h3>
                    <form method="POST" action="/updateComment/{{$comment->id}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ $comment->description }}">
                        </div>
                        </div>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-3">Редактирай</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
