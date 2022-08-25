<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class ProductController extends Controller
{
    public function addProduct()
    {
        $categories = Category::all();
        return view('admin.product.add-product', compact('categories'));
    }
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'main_photo' => 'required',
            'price' => 'required',
            'count' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);
        $main_photo = $request->main_photo->store('public/CategoryPhotos');
        $main_photo = substr($main_photo, 6);
        $x = [];
        if($request->has('photos')){
            foreach ($request->photos as $photo) {
                $photos = $photo->store('public/CategoryPhotos');
                $photos = substr($photos, 6);
                array_push($x, $photos);
            }
        }
        
        $cat = Product::create([
            'productname' => $request->name,
            'category_id' => $request->category,
            'supplier_id' => auth()->user()->id,
            'visiblity' => $request->visiblity,
            'description' => $request->description,
            'status' => $request->publish,
            'tag' => $request->tag,
            'price' => $request->price,
            'count' => $request->count,
            'discount' => $request->discount,
            'main_photo' => $main_photo,
            'photos' => json_encode($x),
        ]);
        return back();
    }
}
