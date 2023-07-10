<?php

namespace App\Providers;

use App\Models\PostComment;
use App\Services\CategoryService;
use Illuminate\Support\ServiceProvider;
use App\Services\PostService;
use App\Services\CommentService;
use App\Services\PostCategoryService;
use App\Services\PostCommentService;
use App\Services\UserService;
use App\Services\WishlistService;
use App\Services\PostServiceInterface;
use App\Services\CategoryServiceInterface;
use App\Services\PostCategoryServiceInterface;
use App\Services\PostCommentServiceInterface;
use App\Services\UserServiceInterface;
use App\Services\WishlistServiceInterface;
use App\Services\CommentServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(PostServiceInterface::class, PostService::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(PostCategoryServiceInterface::class, PostCategoryService::class);
        $this->app->bind(CommentServiceInterface::class, CommentService::class);
        $this->app->bind(PostCommentServiceInterface::class, PostCommentService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(WishlistServiceInterface::class, WishlistService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
