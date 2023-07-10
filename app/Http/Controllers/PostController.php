<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use App\Services\CategoryService;
use App\Services\PostCategoryService;
use App\Services\PostCommentService;
use App\Services\PostService;
use App\Services\UserService;
use App\Services\CategoryServiceInterface;
use Illuminate\Http\Request;
use App\Services\PostCategoryServiceInterface;
use App\Services\PostCommentServiceInterface;
use App\Services\PostServiceInterface;
use App\Services\UserServiceInterface;

class PostController extends Controller
{

    private $postService;
    private $categoryService;
    private $postCategoryService;
    private $postCommentService;
    private $userService;

    public function __construct(
        PostServiceInterface $postService,
        CategoryServiceInterface $categoryService,
        PostCategoryServiceInterface $postCategoryService,
        PostCommentServiceInterface $postCommentService,
        UserServiceInterface $userService
    ) {
        $this->postService = $postService;
        $this->categoryService = $categoryService;
        $this->postCategoryService = $postCategoryService;
        $this->postCommentService = $postCommentService;
        $this->userService = $userService;
    }

  public function showPost()
  {
    $latestPosts = $this->postService->getFilteredPostsSortedByDesc();
    $postComments = [];
    $postCategories = [];

    foreach ($latestPosts as $post) {
      $comments = $this->postCommentService->getAllPostCommentByCommentPostId($post->id);
      $postComments[$post->id] = $comments;
      $postCategoryIds = $this->postCategoryService->getAllPostCategoryIdByPostId($post->id);
      $categories = $this->categoryService->getAllCategoryByPostCategoryIds($postCategoryIds);
      $postCategories[$post->id] = $categories;
    }

    return view('home', [
      'posts' => $latestPosts,
      'postComments' => $postComments,
      'postCategories' => $postCategories,
      'categories' => $categories
    ]);
  }

  public function showSinglePage($postId)
  {
    $result = $this->postService->showSinglePage($postId);

    return view('singlePage', $result);
  }


  public function showCreate()
  {
    $category = $this->categoryService->getAllCategory();

    return View('create', ['category' => $category]);
  }

  public function create(Request $request)
  {
    $formFields = $request->validate([
      'title' => 'required',
      'description' => 'required',
      'categories' => 'required'
    ]);

    if ($request->hasFile('image')) {
      $formFields['image'] = $request->file('image')->store('image', 'public');
    }
    $formFields['user_id'] = auth()->user()->id;

    $post = $this->postService->create($formFields);

    $selectedCategories = $request->input('categories');

    foreach ($selectedCategories as $categoryId) {
      $postCategory = new PostCategory();
      $postCategory->post_id = $post->id;
      $postCategory->category_id = $categoryId;
      $this->postCategoryService->saveToBase($postCategory);
    }

    return redirect('/');
  }


  public function showMyPostPage($userId)
  {
    $user = $this->userService->findByUserId($userId);

    return view('myPosts', ['user' => $user]);
  }

  public function showUpdatePage($postId)
  {
    $post = $this->postService->findByPostId($postId);
    $categories = $this->categoryService->getAllCategory();
    $postCategoryIds = $this->postCategoryService->getAllPostCategoryIdByPostId($postId);

    return view('edit', ['post' => $post, 'categories' => $categories, 'postCategoryIds' => $postCategoryIds]);
  }


  public function update(Request $request, $postId)
  {
    $formFields = $request->validate([
      'title' => 'required',
      'description' => 'required',
      'categories' => 'required'
    ]);

    $post = $this->postService->findByPostIdOrFail($postId);

    if ($request->hasFile('image')) {
      $formFields['image'] = $request->file('image')->store('image', 'public');
    }

    $post->update($formFields);

    $this->postCategoryService->deleteByPostId($postId);

    $selectedCategories = $request->input('categories');

    foreach ($selectedCategories as $categoryId) {
      $postCategory = new PostCategory();
      $postCategory->post_id = $post->id;
      $postCategory->category_id = $categoryId;
      $this->postCategoryService->saveToBase($postCategory);
    }

    return redirect('/');
  }


  public function delete($postId)
  {
    $post = $this->postService->findByPostId($postId);

    $post->delete();

    return redirect('/');
  }
}
