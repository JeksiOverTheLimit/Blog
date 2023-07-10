<?php
namespace App\Services;
use App\Models\Category;
use App\Services\CategoryServiceInterface ;


class CategoryService implements CategoryServiceInterface 
{

   public function getAllCategory(){
    return Category::All();
   }
   public function getAllCategoryByPostCategoryIds(array $postCategoryIds)
   {
   $postCategories = Category::whereIn('id', $postCategoryIds)->get();
   return $postCategories;
   }
}
