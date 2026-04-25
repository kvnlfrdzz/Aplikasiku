@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')

<a href="{{ route('posts.index') }}" class="btn btn-secondary mb-3">
    ← Kembali
</a>

<div class="card">
    <div class="card-body">

        @if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- IMAGE --}}
            <div class="form-group mb-3">
                <label>Gambar</label>
                <input type="file" name="image" class="form-control">
            </div>

            {{-- TITLE --}}
            <div class="form-group mb-3">
                <label>Judul</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control">
            </div>

            {{-- CONTENT --}}
            <div class="form-group mb-3">
                <label>Konten</label>
                <textarea name="content" class="form-control">{{ $post->content }}</textarea>
            </div>

            {{-- KATEGORI (🔥 PINDAH KE DALAM FORM) --}}
            <div class="form-group mb-3">
                <label>Kategori</label>

                @foreach ($categories as $category)
                    <div>
                        <input 
                            type="checkbox" 
                            name="categories[]" 
                            value="{{ $category->id }}"
                            {{ optional($post->categories)->contains($category->id) ? 'checked' : '' }}
                        >
                        {{ $category->name }}
                    </div>
                @endforeach
            </div>

            {{-- BUTTON --}}
            <button class="btn btn-primary">
                Update
            </button>

        </form>

    </div>
</div>

@endsection