<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // ✅ INDEX
public function index()
{
    $categories = Category::latest()->get();
    return view('categories.index', compact('categories'));
}

    // ✅ CREATE
    public function create()
    {
        return view('categories.create');
    }

    // ✅ STORE (FIXED)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('categories.index')
                         ->with('success', 'Kategori berhasil ditambahkan!');
    }

    // ✅ SHOW
    public function show($id)
    {
        $category = Category::with('posts')->findOrFail($id);
        return view('categories.show', compact('category'));
    }

    // ✅ EDIT
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // ✅ UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('categories.index')
                         ->with('success', 'Berhasil update!');
    }

    // ✅ DELETE
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('categories.index')
                         ->with('success', 'Berhasil dihapus!');
    }
}