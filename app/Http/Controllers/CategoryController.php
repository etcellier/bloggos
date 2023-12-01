<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::all();
        return view('category.list', ['categories' => $categories]);
    }

    public function update($id, CategoryRequest $request)
    {
        $datas = [
            "name" => $request->get("name"),
            "slug" => $request->get("slug"),
            "color" => $request->get("color"),
        ];

        $newCategory = Category::find($id);
        $newCategory->name = $datas["name"];
        $newCategory->slug = $datas["slug"];
        $newCategory->color = $datas["color"];

        $newCategory->save();

        return redirect()->route('category.update', [$id])->with('success', "La catégorie a bien été modifiée.");
    }

    public function add(CategoryRequest $request)
    {
        $datas = [
            "name" => $request->get("name"),
            "slug" => $request->get("slug"),
            "color" => $request->get("color"),
        ];

        $newCategory = new Category();
        $newCategory->name = $datas["name"];
        $newCategory->slug = $datas["slug"];
        $newCategory->color = $datas["color"];

        $newCategory->save();

        return redirect()->route('category.update', [$newCategory->id])->with('success', "La catégorie a bien été créée.");
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('category.list')->with('success', "La catégorie a bien été supprimée.");
    }
}
