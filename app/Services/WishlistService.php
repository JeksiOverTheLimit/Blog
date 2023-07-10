<?php

namespace App\Services;

use App\Models\Wishlist;
use App\Services\WishlistServiceInterface;

class WishlistService implements WishlistServiceInterface
{

    public function getAllWhishListByUserId(int $userId)
    {
        $wishlists = Wishlist::where('user_id', $userId)->get();
        $postIds = $wishlists->pluck('post_id');

        return $postIds;
    }

    public function checkForExistingWhishlist(int $postId, int $userId)
    {
        $existingWishlist = Wishlist::where('post_id', $postId)
            ->where('user_id', $userId)
            ->first();
        return $existingWishlist;
    }

    public function create(array $fields): Wishlist
    {
        return Wishlist::create($fields);
    }

    public function delete($postId, $userId): void
    {
        Wishlist::where('post_id', $postId)->where('user_id', $userId)->delete();
    }

    public function getAllWishlistByUserId(int $userId): Wishlist
    {
        return Wishlist::where('user_id', $userId)->get();
    }
}
