<?php

namespace App\Services;

use App\Models\PostComment;


class PostCommentService
{

    public function getAllPostCommentByCommentPostId($postId)
    {
        $postComments = PostComment::where('post_id', $postId)->get();
        return $postComments;
    }

    public function deleteByCommentId($commentId): void
    {
        PostComment::where('comment_id', $commentId)->delete();
    }
    public function saveToBase(PostComment $postComment): void
    {
        $postComment->save();
    }
}
