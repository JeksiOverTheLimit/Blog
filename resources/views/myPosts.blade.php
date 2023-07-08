@extends('layout')

@section('content')

<div class="row">
    @if(count($user->posts) === 0)
        <p>Dont have a post yet</p>
        <div class="col-md-12 mb-4 text-right">
        <a href="/showCreate" class="btn btn-outline-primary">Create Post</a>
    </div>
    @else
    <div class="row">
    <div class="col-md-12 mb-4 text-center">
        <a href="/showCreate" class="btn btn-outline-primary">Create Post</a>
    </div>
        @foreach($user->posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                @if($post->image == null)
                <img src="{{ asset('storage/image/noImage.jpg')}}" class="card-img-top mt-3" alt="Post Image" style="width: 200px; height: 200px;">
                @else
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-3" alt="Post Image" style="width: 200px; height: 200px;">
                @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->description }}</p>
                        <a href="/{{ $post->id }}" class="btn btn-primary">Read More</a>
                        <a href="/edit/{{ $post->id }}" class="btn btn-secondary">Edit Post</a>
                        <a href="/delete/{{ $post->id }}" class="btn btn-danger">Delete post</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

@endsection
