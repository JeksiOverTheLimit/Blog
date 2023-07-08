@extends('layout')

@section('content')
<form class="d-flex">
        <input class="form-control form-control-sm me-2" type="search" name="search" placeholder="Search" aria-label="Search" style="width: 150px;">
        <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>
    <a href="/showCreate" class="btn btn-outline-primary" style="margin-top: 20px;">Create Post</a>
<div class="row">
    <div class="col-md-12 mb-4 text-center">
    </div>
    @if(count($posts) == 0)
    <p>Dont have a post yet</p>
    @endif
    @foreach($posts as $post)
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                @if(auth()->check() && auth()->user()->id !== null)
                <div style="position: absolute; top: 0; right: 0; margin: 10px;">
                    <form method="POST" action="/addToWishlist">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        <button type="submit" class="btn btn-warning">Add To Wishlist</button>
                    </form>
                </div>
                @endif
                @if($post->image == null)
                <img src="{{ asset('storage/image/noImage.jpg')}}" class="card-img-top" alt="Post Image" style="width: 200px; height: 200px;">
                @else
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Post Image" style="width: 200px; height: 200px;">
                @endif
                <p class="card-text">{{ $post->description }}</p>
                <p>Comments: {{ count($postComments[$post->id]) }}</p>
                <p>Categories:</p>
                <ul>
                    @foreach($postCategories[$post->id] as $category)
                    <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
                <a href="/{{ $post->id }}" class="btn btn-primary">Read More</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection