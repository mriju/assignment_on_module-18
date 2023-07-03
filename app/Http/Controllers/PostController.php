<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        $posts = Post::with('category')->get();
        $softDeletedPosts = Post::getSoftDeletedPosts();
        return view('posts.index', compact('posts', 'softDeletedPosts'));
    }

    function countCategoryById($id)
    {
        $countCategoryId = Post::getPostsCountByCategory($id);
        return $countCategoryId;
    }

    function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function trashed()
    {
        $posts = Post::getSoftDeletedPosts();
        return view('posts.trashed', compact( 'posts'));
    }

}
