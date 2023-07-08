<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use App\Services\WishlistService;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    private WishlistService $whishlistService;
    private PostService $postService;

    public function __construct()
    {
        $this->whishlistService = new WishlistService;
        $this->postService = new PostService;
    }
    public function showWishlistPage()
    {
        $userId = auth()->user()->id;

        $postIds = $this->whishlistService->getAllWhishListByUserId($userId);

        $posts = $this->postService->getAllPostsByPostsId($postIds);

        return view('wishlist', ['posts' => $posts]);
    }

    public function create(Request $request)
    {
        $fields = $request->validate([
            'post_id' => 'required',
            'user_id' => 'required'
        ]);
        $postId = $request->post_id;
        $userId = $request->user_id;
    
        $existingWishlist = $this->whishlistService->checkForExistingWhishlist($postId,$userId);
    
        if ($existingWishlist) {
            return redirect()->route('wishlist', ['userId' => auth()->user()->id])->withErrors('This wishlist already exists.');
        }
    
        $this->whishlistService->create($fields);

        return redirect()->route('wishlist', ['userId' => auth()->user()->id]);
    }

    public function delete(Request $request)
    {
        $postId = $request->post_id;
        $userId = $request->user_id;

        $this->whishlistService->delete($postId,$userId);

        return redirect()->route('wishlist', ['userId' => auth()->user()->id]);
    }

    public function getWishListCount() {
    $userId = auth()->user()->id;

    $wishlists = $this->whishlistService->getAllWhishListByUserId($userId);

    $count = count($wishlists);
    return $count;
    }
}
