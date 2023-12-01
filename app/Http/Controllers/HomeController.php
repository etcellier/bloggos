<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $tagCounts = DB::table('post_tag')
            ->select('tag_id', DB::raw('count(*) as total'))
            ->groupBy('tag_id')
            ->orderBy('total', 'desc')
            ->get();

        $writerCounts = DB::table('posts')
            ->select('user_id', DB::raw('count(*) as total'))
            ->groupBy('user_id')
            ->orderBy('total', 'desc')
            ->get();

        $categoriesCounts = DB::table('posts')
            ->select('category_id', DB::raw('count(*) as total'))
            ->groupBy('category_id')
            ->orderBy('total', 'desc')
            ->get();

        return view("front.index", ["posts" => $posts, "tagCounts" => $tagCounts, "writerCounts" => $writerCounts, "categoriesCounts" => $categoriesCounts]);
    }
}
