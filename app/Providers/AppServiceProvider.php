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

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(PostService::class, function ($app) {
            return new PostService();
        });

        $this->app->singleton(CommentService::class, function ($app) {
            return new CommentService();
        });

        $this->app->singleton(PostCommentService::class, function ($app) {
            return new PostCommentService();
        });

        $this->app->singleton(CategoryService::class, function ($app) {
            return new CategoryService();
        });

        $this->app->singleton(PostCategoryService::class, function ($app) {
            return new PostCategoryService();
        });

        $this->app->singleton(UserService::class, function ($app) {
            return new UserService();
        });

        
        $this->app->singleton(WishlistService::class, function ($app) {
            return new WishlistService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
