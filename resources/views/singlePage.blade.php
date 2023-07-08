@extends('layout')

@section('content')

<div class="row">
    <div class="col-md-12 mb-4 text-center">
        <h2>{{ $post->title }}</h2>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-6 mb-4 text-center">
        @if($post->image == null)
            <img src="{{ asset('storage/image/noImage.jpg')}}" class="card-img-top mt-3" alt="Post Image" style="width: 100%; height: auto;">
        @else
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-3" alt="Post Image" style="width: 100%; height: auto;">
        @endif
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-6 mb-4 text-center">
        <p>{{ $post->description }}</p>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-6 mb-4 text-center">
        <h3>Коментари</h3>
        @foreach($comments as $comment)
            <div class="card mt-3">
                <div class="card-body">
                    <p>{{ $comment->description }}</p>
                    <p>Автор: {{ $comment->user->name }}</p>
                    @if(isset(auth()->user()->id) && auth()->user()->id == $comment->user_id)
                        <a class="btn btn-sm btn-secondary" href="/editComment/{{$comment->id}}">Edit Comment</a>
                        <a class="btn btn-sm btn-danger" href="/deleteComment/{{$comment->id}}">Delete Comment</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-6 mb-4 text-center">
        <form action="/comment" method="POST">
            @csrf
            @if(isset(auth()->user()->id))
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            @endif
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="form-group">
                <textarea class="form-control" name="description" placeholder="Напишете коментар"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 6px;">Коментирай</button>
        </form>
    </div>
</div>

@endsection
