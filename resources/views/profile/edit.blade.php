@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<a href="/dashboard" class="btn btn-secondary mb-3">← Kembali</a>

<div class="card mb-3">
    <div class="card-body">
        @include('profile.partials.update-profile-information-form')
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        @include('profile.partials.update-password-form')
    </div>
</div>

@endsection