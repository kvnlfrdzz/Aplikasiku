@extends('layouts.app')

@section('title', $post->title)

@section('content')

@if(request('category_id'))
    <a href="{{ route('categories.show', request('category_id')) }}?from={{ request('from') }}" 
       class="btn btn-secondary mb-3">
        ← Kembali
    </a>
@else
    <a href="{{ route('posts.index') }}" class="btn btn-secondary mb-3">
        ← Kembali
    </a>
@endif

<div class="card">
    <div class="card-body">

        <img src="{{ asset('storage/posts/'.$post->image) }}" class="w-100 mb-3">

        <h3>{{ $post->title }}</h3>

        <div>
            {!! $post->content !!}
        </div>

    </div>
</div>

@endsection