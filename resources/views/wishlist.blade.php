@extends('layout')

@section('content')
@if(count($posts) == 0)
    <div style="text-align: center;">
    <p class="text-secondary display-8">Don't have any wishlists</p>
        <a href="/" class="btn btn-outline-primary">Back to blog</a>
    </div>
@else
<div class="row">
    @foreach($posts as $post)
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <div style="position: absolute; top: 0; right: 0; margin: 10px;">
                <form action="/deleteWishList" method="POST">
                @csrf
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
                @if($post->image == null)
                <img src="{{ asset('storage/image/noImage.jpg')}}" class="card-img-top" alt="Post Image" style="width: 200px; height: 200px;">
                @else
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Post Image" style="width: 200px; height: 200px;">
                @endif
                <p class="card-text">{{ $post->description }}</p>
                <a href="/{{ $post->id }}" class="btn btn-primary">Read More</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection