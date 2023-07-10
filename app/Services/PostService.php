<?php

namespace App\Services;

use App\Models\Post;
use App\Services\CommentService;
use App\Services\PostCommentService;
use App\Services\PostServiceInterface ;


class PostService implements PostServiceInterface
{
    private CommentService $commentService;
    private PostCommentService $postCommentService;

    public function __construct(CommentService $commentService, PostCommentService $postCommentService)
    {
        $this->commentService = $commentService;
        $this->postCommentService = $postCommentService;
    }
    
    public function showSinglePage(int $postId): array
    {
        $post = $this->findByPostId($postId);
        $postComments = $this->postCommentService->getAllPostCommentByCommentPostId($postId);
        $commentIds = $postComments->pluck('comment_id');
        $comments = $this->commentService->getAllCommentsByCommentId($commentIds);

        return [
            'post' => $post,
            'comments' => $comments
        ];
    }

    public function findByPostId(int $postId): Post{
        $post = Post::find($postId);
        return $post;
    }

    public function create(array $formFields): Post {
        $post = Post::create($formFields);
        return $post;
    }

    public function findByPostIdOrFail(int $postId): Post{
       $post = Post::findOrFail($postId);
       return $post;
    }

    public function getFilteredPostsSortedByDesc(){
       $posts = Post::latest()->filter(request(['search']))->get();
       return $posts;
    }

    public function getAllPostsByPostsId($postIds){
    return Post::whereIn('id', $postIds)->get();
    }
}
