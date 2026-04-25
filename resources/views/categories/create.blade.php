@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

<a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">
    ← Kembali
</a>

<div class="card">
    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <button class="btn btn-success">Simpan</button>
        </form>

    </div>
</div>

@endsection