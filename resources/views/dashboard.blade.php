@php use Illuminate\Support\Facades\Auth; @endphp

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <div>
        <a href="{{ route('posts.index') }}" class="btn btn-primary">Posts</a>
        <a href="{{ route('categories.index') }}" class="btn btn-success">Kategori</a>
    </div>

    <div>
        <div class="d-flex align-items-center">

    @if(Auth::user()->photo)
        <img src="{{ asset('storage/profile/'.Auth::user()->photo) }}"
             width="35"
             height="35"
             style="border-radius:50%; object-fit:cover; margin-right:10px;">
    @else
        <div style="width:35px;height:35px;border-radius:50%;background:#ccc;margin-right:10px;"></div>
    @endif

    <span class="text-black">{{ Auth::user()->name }}</span>

</div>
<br>
        <a href="{{ route('profile.edit') }}" class="btn btn-warning btn-sm">Settings</a>

        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-danger btn-sm">Logout</button>
        </form>
    </div>
</div>

<div class="row mt-4 g-4">
@foreach ($categories as $category)
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm">

            <a href="{{ url('/categories/'.$category->id.'?from=dashboard') }}">

                @if($category->posts->count())
                    <img src="{{ asset('storage/posts/'.$category->posts->first()->image) }}"
                         style="height:200px; object-fit:cover;">
                @else
                    <div style="height:200px; display:flex; align-items:center; justify-content:center;">
                        No Image
                    </div>
                @endif

                <div class="card-body text-center">
                    <h5>{{ $category->name }}</h5>
                </div>

            </a>

        </div>
    </div>
@endforeach
</div>

@endsection