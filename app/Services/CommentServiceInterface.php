<?php
namespace App\Services;
use App\Models\Comment;

interface CommentServiceInterface {
    public function getAllCommentsByCommentId($commentIds);
    public function findById(int $commentId): Comment;
    public function findByIdOrFail(int $commentId): ?Comment;
    public function Create(array $formFields): Comment;
}