<?php
namespace App\Services;
use App\Models\Category;


class CategoryService{

   public function getAllCategory(){
    return Category::All();
   }
   public function getAllCategoryByPostCategoryIds(array $postCategoryIds)
   {
   $postCategories = Category::whereIn('id', $postCategoryIds)->get();
   return $postCategories;
   }
}
