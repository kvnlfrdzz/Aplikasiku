@extends('layouts.app')

@section('title', 'Tambah Post')

@section('content')

<a href="{{ route('posts.index') }}" class="btn btn-secondary mb-3">
    ← Kembali
</a>

<div class="card">
    <div class="card-body">

@if ($errors->has('categories'))
    <div class="alert alert-danger">
        ⚠️ Pilih minimal 1 kategori!
    </div>
@endif

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="file" name="image" class="form-control mb-2">

    <input type="text" id="titleInput" name="title" class="form-control mb-2" placeholder="Judul Post">

<!-- STYLE CONTROL -->
<div class="mb-3">
    <label>Ukuran Judul:</label>
    <select id="titleSize" class="form-control">
        <option value="24">Kecil</option>
        <option value="32" selected>Sedang</option>
        <option value="40">Besar</option>
    </select>

    <label class="mt-2">
        <input type="checkbox" id="titleBold"> Bold
    </label>
</div>

<!-- PREVIEW -->
<div id="titlePreview" style="border:1px solid #ccc; padding:10px;">
    Preview Judul
</div>

    <textarea id="editor" name="content" class="form-control">
        {{ old('content') }}
    </textarea>

    @foreach ($categories as $category)
        <div>
            <input type="checkbox" name="categories[]" value="{{ $category->id }}"
            {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
            {{ $category->name }}
        </div>
    @endforeach

    <button class="btn btn-primary mt-3">Simpan</button>
</form>

    </div>
</div>

<!-- ✅ SCRIPT HARUS DI DALAM CONTENT -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
});
</script>

<script>
const input = document.getElementById('titleInput');
const preview = document.getElementById('titlePreview');
const size = document.getElementById('titleSize');
const bold = document.getElementById('titleBold');

function updatePreview() {
    preview.innerText = input.value || "Preview Judul";
    preview.style.fontSize = size.value + "px";
    preview.style.fontWeight = bold.checked ? "bold" : "normal";
}

input.addEventListener('input', updatePreview);
size.addEventListener('change', updatePreview);
bold.addEventListener('change', updatePreview);
</script>

@endsection