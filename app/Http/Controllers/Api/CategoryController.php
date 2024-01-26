<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        return $categories;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:120'
        ]);

        $category = new Category();

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
    }

    public function show(string $id)
    {
        $category = Category::find($id);

        return $category;
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
        return $category;
    }

    public function destroy(string $id)
    {
        $category = Category::destroy($id);

        return $category;
    }
    public function select(?string $fill = null){
        $categories = Category::getList($fill);

        return $categories;
    }

    public function getAll(Request $request){
        $categories = Category::findBy();

        return $categories;
    }
}
