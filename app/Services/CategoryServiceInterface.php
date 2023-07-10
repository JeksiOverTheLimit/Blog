<?php
namespace App\Services;
use App\Models\Category;

interface CategoryServiceInterface {
    public function getAllCategory();
    public function getAllCategoryByPostCategoryIds(array $postCategoryIds);
}