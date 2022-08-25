<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.product.add-category');
    }
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'main_photo' => 'required'
        ]);
        $main_photo = $request->main_photo->store('public/CategoryPhotos');
        $main_photo = substr($main_photo, 6);
        $photos = $request->photos->store('public/CategoryPhotos');
        $photos = substr($photos, 6);
        $cat = Category::create([
            'name' => $request->name,
            'visibility' => $request->visiblity,
            'description' => $request->description,
            'main_photo' => $main_photo,
            'photos' => json_encode($photos),
        ]);
        return back();
    }
}
