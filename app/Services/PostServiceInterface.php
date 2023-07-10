<?php
namespace App\Services;
use App\Models\Post;

interface PostServiceInterface {
    public function showSinglePage(int $postId): array;
    public function findByPostId(int $postId): Post;
    public function create(array $formFields): Post;
    public function findByPostIdOrFail(int $postId): Post;
    public function getFilteredPostsSortedByDesc();
    public function getAllPostsByPostsId($postIds);
}