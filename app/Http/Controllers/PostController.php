<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        // ambil semua kategori
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // ✅ VALIDASI DULU (WAJIB DI ATAS)
$request->validate([
    'title' => 'required',
    'content' => 'required',
    'image' => 'required|image',
    'categories' => 'required|array|min:1'
], [
    'categories.required' => 'Kategori wajib dipilih!',
]);

        // ✅ AMBIL FILE
        $image = $request->file('image');

        // ✅ UPLOAD GAMBAR
        $image->storeAs('public/posts', $image->hashName());

        // ✅ SIMPAN POST
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image->hashName(),
        ]);

        // ✅ SIMPAN RELASI KATEGORI (many-to-many)
        $post->categories()->attach($request->categories);

        return redirect()->route('posts.index')->with('success', 'Data Berhasil Disimpan!');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

public function edit(Post $post)
{
    $post->load('categories'); // 🔥 WAJIB
    $categories = Category::all();

    return view('posts.edit', compact('post', 'categories'));
}

public function update(Request $request, Post $post)
{
    $request->validate([
        'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'title'      => 'required|min:5',
        'content'    => 'required|min:10',
        'categories' => 'nullable|array'
    ]);

    if ($request->hasFile('image')) {

        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        Storage::delete('public/posts/'.$post->image);

        $post->update([
            'image'   => $image->hashName(),
            'title'   => $request->title,
            'content' => $request->content
        ]);

    } else {

        $post->update([
            'title'   => $request->title,
            'content' => $request->content
        ]);
    }

    // 🔥 FIX RELASI
    $post->categories()->sync($request->categories ?? []);

    return redirect()->route('posts.index')->with('success', 'Data Berhasil Diubah!');
}

    public function destroy(Post $post)
    {
        Storage::delete('public/posts/'.$post->image);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Data Berhasil Dihapus!');
    }

    public function search($q)
{
    $posts = Post::with('category')
        ->where('title', 'like', "%$q%")
        ->orWhereHas('category', function($query) use ($q){
            $query->where('name', 'like', "%$q%");
        })
        ->get();

    return response()->json([
        'data' => $posts
    ]);
}
}   