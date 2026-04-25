@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')

<a href="{{ back_url('/categories') }}" class="btn btn-secondary mb-3">
    ← Kembali
</a>

<div class="card">
    <div class="card-body">

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="name" value="{{ $category->name }}" class="form-control mb-2">

            <button class="btn btn-primary">Update</button>
        </form>

    </div>
</div>

@endsection