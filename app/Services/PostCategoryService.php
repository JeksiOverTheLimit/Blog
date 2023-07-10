<?php

namespace App\Services;

use App\Models\PostCategory;
use App\Services\PostCategoryServiceInterface;
;

class PostCategoryService implements PostCategoryServiceInterface
{

    public function saveToBase(PostCategory $postCategory): void
    {
        $postCategory->save();
    }

    public function getAllPostCategoryIdByPostId($postId): array
    {
        $postCategoryIds = PostCategory::where('post_id', $postId)->pluck('category_id')->toArray();
        return $postCategoryIds;
    }

    public function getAllCategoryIdsByPostId($postId)
    {
        $categoryIds = PostCategory::where('post_id', $postId)->pluck('category_id');
        return $categoryIds;
    }
    public function deleteByPostId($postId)
    {
      $category = PostCategory::where('post_id', $postId)->delete();
      return $category;
    }
}
