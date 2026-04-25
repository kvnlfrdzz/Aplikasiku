<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
public function index()
{
    $posts = Post::with('categories')->latest()->get();

    return response()->json([
        'success' => true,
        'data' => $posts
    ]);
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'required|image'
    ]);

    // upload gambar
    $image = $request->file('image');
    $image->storeAs('public/posts', $image->hashName());

    $post = Post::create([
        'title' => $request->title,
        'content' => $request->content,
        'image' => $image->hashName()
    ]);

    return response()->json([
        'success' => true,
        'data' => $post
    ]);
}

    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post tidak ditemukan'
            ], 404);
        }

        $post->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $post
        ]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post tidak ditemukan'
            ], 404);
        }

        $post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post berhasil dihapus'
        ]);
    }

    public function search($q)
    {
    $posts = Post::with('categories')
        ->where('title', 'like', "%$q%")
        ->orWhereHas('categories', function($query) use ($q){
            $query->where('name', 'like', "%$q%");
        })
        ->get();

    return response()->json([
        'success' => true,
        'data' => $posts
    ]);
    }
}