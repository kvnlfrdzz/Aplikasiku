@extends('layouts.app')

@section('title', $category->name)

@section('content')

@if(request('from') == 'dashboard')
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">
        ← Kembali
    </a>
@else
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">
        ← Kembali
    </a>
@endif

<div class="row">
@foreach ($category->posts as $post)
    <div class="col-md-4">
        <div class="card mb-3 shadow-sm">

    <a href="{{ route('posts.show', $post->id) }}?category_id={{ $category->id }}&from={{ request('from') }}">

        <img src="{{ asset('storage/posts/'.$post->image) }}"
             style="height:200px; object-fit:cover; width:100%;">

        <div class="card-body text-center">
            <h6>{{ $post->title }}</h6>
        </div>

    </a>

</div>
    </div>
@endforeach
</div>

@endsection