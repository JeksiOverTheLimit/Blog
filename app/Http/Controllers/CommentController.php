<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostComment;
use App\Services\CommentService;
use App\Services\PostCommentService;

class CommentController extends Controller
{
    private PostCommentService $postCommentService;
    private CommentService $commentService;

    public function __construct()
    {
        $this->postCommentService = new PostCommentService();
        $this->commentService = new CommentService();
    }
    public function create(Request $request)
    {

        $formFields = $request->validate([
            'description' => 'required',
        ]);

        $formFields['user_id'] = auth()->user()->id;

        $comment = $this->commentService->create($formFields);


        $postComment = new PostComment();
        $postComment->post_id = $request->post_id;
        $postComment->comment_id = $comment->id;
        $this->postCommentService->saveToBase($postComment);

        return back();
    }

    public function showUpdatePage($commentId)
    {
        $comment = $this->commentService->findById($commentId);

        return View('updateComment', ['comment' => $comment]);
    }

    public function update(Request $request, $commentId)
    {
        $field = $request->validate([
            'description' => 'required'
        ]);

        $comment = $this->commentService->findByIdOrFail($commentId);

        $comment->update($field);

        return back();
    }

    public function delete($commentId)
    {
        $this->postCommentService->deleteByCommentId($commentId);


        $comment = $this->commentService->findById($commentId);
        $comment->delete();

        return back();
    }
}
