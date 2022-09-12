<?php

namespace App\Helper\Filters;

class SupplierFilter{
    function __invoke($query, $supplierId){
        return $query->whereHas('supplier', function($query) use ($supplierId){
            $query->where('supplier_id', $supplierId);
        });
    }
}