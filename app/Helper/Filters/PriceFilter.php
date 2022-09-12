<?php
namespace App\Helper\Filters;

class PriceFilter{
    function __invoke($query, $price){
        return $query->where('price', '>=', $price['priceMin'])->where('price', '<=', $price['priceMax']);
    }
}