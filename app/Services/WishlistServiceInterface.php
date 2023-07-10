<?php
namespace App\Services;
use App\Models\Wishlist;

interface WishlistServiceInterface {
    public function getAllWhishListByUserId(int $userId);
    public function checkForExistingWhishlist(int $postId, int $userId);
    public function create(array $fields): Wishlist;
    public function delete($postId, $userId): void;
    public function getAllWishlistByUserId(int $userId): Wishlist;

}