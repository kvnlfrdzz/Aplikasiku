@extends('layouts.app')

@section('title', 'Data Posts')

@section('content')

<a href="/dashboard" class="btn btn-secondary mb-3">
    ← Kembali
</a>

<a href="{{ route('posts.create') }}" class="btn btn-success mb-3">
    + Tambah Post
</a>

<div class="card">
    <div class="card-body">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/posts/'.$post->image) }}" width="120">
                        </td>

                        <td>{{ $post->title }}</td>
                        <td>{!! $post->content !!}</td>

                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-dark btn-sm">Lihat</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>

                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Data kosong</td>
                    </tr>
                @endforelse
            </tbody>

        </table>

        {{ $posts->links('pagination::bootstrap-4') }}

    </div>
</div>

@endsection