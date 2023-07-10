<?php
namespace App\Services;
use App\Models\Comment;
use App\Services\CommentServiceInterface;


class CommentService implements CommentServiceInterface
{

    public function getAllCommentsByCommentId($commentIds) {
        $comments = Comment::whereIn('id', $commentIds)->get();
        return $comments;
    }

    public function findById(int $commentId): Comment
    {
        return Comment::find($commentId);
    }

    public function findByIdOrFail(int $commentId): ?Comment {
       return Comment::findOrFail($commentId);
    }

    public function Create(array $formFields): Comment
    {
       return  Comment::create($formFields);
    }
}
