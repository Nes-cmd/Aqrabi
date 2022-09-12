<?php

namespace App\Helper\Filters;

class CategoryFilter{
    function __invoke($query, $categoryId)
    {
        return $query->whereHas('categories', function($query) use ($categoryId){
            $query->where('category_id', $categoryId);
        });
    }
}