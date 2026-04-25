@extends('layouts.app')

@section('title', 'Manajemen Kategori')

@section('content')

<a href="/dashboard" class="btn btn-secondary mb-3">
    ← Kembali
</a>

<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
    + Tambah Kategori
</a>

<div class="card">
    <div class="card-body">

        @foreach ($categories as $category)
            <div class="d-flex justify-content-between border-bottom py-2">

                <strong>{{ $category->name }}</strong>

                <div>
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-info">Lihat</a>

                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </div>

            </div>
        @endforeach

    </div>
</div>

@endsection