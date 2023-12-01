<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::all();
        return view('posts.list', ['posts' => $posts]);
    }

    public function update($id, AddPostRequest $request)
    {
        $datas = [
            "title" => $request->get("title"),
            "body" => $request->get("content"),
            "published" => 0,
            "draft" => 1,
            "slug" => $request->get("slug")
        ];

        if ($request->get("comments") !== null && $request->get("comments") === "on") {
            $datas['allow_comments'] = true;
        } else {
            $datas['allow_comments'] = false;
        }

        if ($request->get("likes") !== null && $request->get("likes") === "on") {
            $datas['allow_likes'] = true;
        } else {
            $datas['allow_likes'] = false;
        }

        $newPost = Post::find($id);
        $newPost->title = $datas["title"];
        $newPost->body = $datas["body"];
        $newPost->published = $datas["published"];
        $newPost->draft = $datas["draft"];
        $newPost->slug = $datas["slug"];
        $newPost->allow_comments = $datas["allow_comments"];
        $newPost->allow_likes = $datas["allow_likes"];
        $newPost->save();

        return redirect()->route('posts.update', [$id])->with('success', "Le post a bien été créé.");
    }

    public function add(AddPostRequest $request)
    {
        $datas = [
            "title" => $request->get("title"),
            "body" => $request->get("content"),
            "published" => 0,
            "draft" => 1,
            "slug" => $request->get("slug")
        ];

        if ($request->get("comments") !== null && $request->get("comments") === "on") {
            $datas['allow_comments'] = true;
        } else {
            $datas['allow_comments'] = false;
        }

        if ($request->get("likes") !== null && $request->get("likes") === "on") {
            $datas['allow_likes'] = true;
        } else {
            $datas['allow_likes'] = false;
        }

        $newPost = new Post();
        $newPost->title = $datas["title"];
        $newPost->body = $datas["body"];
        $newPost->published = $datas["published"];
        $newPost->draft = $datas["draft"];
        $newPost->slug = $datas["slug"];
        $newPost->allow_comments = $datas["allow_comments"];
        $newPost->allow_likes = $datas["allow_likes"];
        $newPost->save();

        return redirect()->route('posts.list')->with('success', "Le post a bien été créé.");
    }
}