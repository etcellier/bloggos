<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function list()
    {
        $tags = Tag::all();
        return view('tag.list', ['tags' => $tags]);
    }

    public function update($id, Request $request)
    {
        $datas = [
            "name" => $request->get("name"),
            "slug" => $request->get("slug"),
            "color" => $request->get("color"),
        ];

        $newTag = Tag::find($id);
        $newTag->name = $datas["name"];
        $newTag->slug = $datas["slug"];
        $newTag->color = $datas["color"];

        $newTag->save();

        return redirect()->route('tag.list', [$id])->with('success', "Le tag a bien été modifié.");
    }

    public function add(Request $request)
    {
        $datas = [
            "name" => $request->get("name"),
            "slug" => $request->get("slug"),
            "color" => $request->get("color"),
        ];

        $newTag = new Tag();
        $newTag->name = $datas["name"];
        $newTag->slug = $datas["slug"];
        $newTag->color = $datas["color"];
        $newTag->save();

        return redirect()->route('tag.list', [$newTag->id])->with('success', "Le tag a bien été créé.");
    }

    public function delete($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        return redirect()->route('tag.list')->with('success', "Le tag a bien été supprimé.");
    }
}
