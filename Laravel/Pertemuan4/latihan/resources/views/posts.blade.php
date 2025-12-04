@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="container w-full px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Posts</h1>
        @foreach ($posts as $post)
            <div class="mb-4 p-4 border rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                <h2 class="text-xl font-semibold text-gray-900">{{ $post->title }}</h2>
                <p class="text-gray-700 mt-2">{{ $post->body }}</p>
                <div class="mt-4 text-sm text-gray-500">
                    <span>By {{ $post->author->name }}</span> |
                    <span>Category: {{ $post->category->name }}</span>
                </div>
            </div>
        @endforeach
        <!-- Add your posts page content here -->
    </div>
@endsection
