<?php
namespace App\Services;
use App\Models\PostComment;

interface PostCommentServiceInterface {
    public function getAllPostCommentByCommentPostId($postId);
    public function deleteByCommentId($commentId): void;
    public function saveToBase(PostComment $postComment): void;
}