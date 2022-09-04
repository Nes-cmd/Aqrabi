<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Slider;

class ShopController extends Controller
{
    public function categories()
    {
        return ['categories' => Category::where('visibility', 'public')->get()];
    }
    public function products()
    {
        $products = Product::all();
        return ['products' => $products];
    }
    public function productByCategoryId($id)
    {
        $products =  Product::where('category_id', $id)->get();
        return ['products' => $products];
    }
    public function productBySupplierId($id)
    {
        $products = Product::where('supplier_id', $id)->get();
        return ['products' => $products];
    }
    public function productGroupByCategory()
    {
        $products = Category::with('products')->get();
        return ['products' => $products];
    }
    public function productGroupBySupplier()
    {
        $products = User::with('products')->get();
        return ['products' => $products];
    }
    public function singleProduct($id)
    {
        $product = Product::find($id);
        return ['product' => $product];
    }
    public function getSliders()
    {
        $sliders = Slider::all();
        return ['sliders' => $sliders];
    }
}
