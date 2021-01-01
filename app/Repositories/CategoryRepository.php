<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getAllCategories()
    {
        $categries = Category::orderBy('id')->get();
        return $categries;
    }

    public function saveCategory($categoryName)
    {
        $category = new Category;

        $category->name = $categoryName;
        try {
            return $category->save();
        } catch (\Exception $e) {
            dd('Error : ' . $e->getMessage);
        }
    }
}
