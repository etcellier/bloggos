<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

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
            "slug" => $request->get("slug"),
            "category_id" => $request->get("category")
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
        $newPost->category_id = $datas["category_id"];
        $newPost->user_id = Auth::id();
        $newPost->save();

        $newPost->tags()->sync($request->get("tags"));

        return redirect()->route('posts.list', [$id])->with('success', "Le post a bien été modifié.");
    }

    public function add(AddPostRequest $request)
    {
        $datas = [
            "title" => $request->get("title"),
            "body" => $request->get("content"),
            "published" => 0,
            "draft" => 1,
            "slug" => $request->get("slug"),
            "category_id" => $request->get("category")
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
        $newPost->category_id = $datas["category_id"];
        $newPost->user_id = Auth::id();
        $newPost->save();

        $newPost->tags()->sync($request->get("tags"));

        return redirect()->route('posts.list')->with('success', "Le post a bien été créé.");
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.list')->with('success', "Le post a bien été supprimé.");
    }

    public function getTags($id)
    {
        $post = Post::find($id);
        $tags = $post->tags()->get();
        dd($tags);
    }
}
