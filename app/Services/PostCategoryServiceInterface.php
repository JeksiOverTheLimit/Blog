<?php
namespace App\Services;
use App\Models\PostCategory;

interface PostCategoryServiceInterface {
    public function saveToBase(PostCategory $postCategory): void;
    public function getAllPostCategoryIdByPostId($postId): array;
    public function getAllCategoryIdsByPostId($postId);
    public function deleteByPostId($postId);
}
