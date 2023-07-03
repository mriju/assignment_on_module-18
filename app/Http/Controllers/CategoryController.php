<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    function getCategoryById($id)
    {
        $category = Category::find($id);
        $posts = $category->posts;
        return view('categories.post', compact('category', 'posts'));
    }

    function latestPostByCategoryId($id)
    {
        $category = Category::find($id);
        return $category->latestPost;
    }

    function latestPostByCategory()
    {
        $categories = Category::all();
        return view('categories.latestPosts', compact('categories'));
    }
}
