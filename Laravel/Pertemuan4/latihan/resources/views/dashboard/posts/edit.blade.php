@extends('layouts.dashboard-layout')

@section('title', $post->title . ' - Dashboard')

@section('content')
    <div class="max-w-5xl">
        <h1 class="text-2xl font-semibold mb-6">Edit Post</h1>
        <form action="{{ route('dashboard.posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid gap-4 grid-cols-2">
                {{-- Title --}}
                <div class="col-span-2">
                    <label for="title" class="block mb-2.5 text-sm font-medium text-heading">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') ?? $post->title }}"
                        class="bg-neutral-secondary medium-box-border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                        placeholder="Enter post title" required>
                    @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Category --}}
                <div class="col-span-2">
                    <label for="category_id" class="block mb-2.5 text-sm font-medium text-heading">Category</label>
                    <select name="category_id" id="category_id"
                        class="block w-full px-3 py-2.5 bg-neutral-secondary medium-box-border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                        required>
                        <option value="{{ $post->category->id }}">{{ $post->category->name }}</option>
                        @foreach ($categories as $category)
                            @if ($post->category->id != $category->id)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Excerpt --}}
                <div class="col-span-2">
                    <label for="excerpt" class="block mb-2.5 text-sm font-medium text-heading">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" rows="3" value="{{ old('excerpt') ?? $post->excerpt }}"
                        class="block w-full p-3.5 text-sm text-gray-900 bg-neutral-secondary medium-box-border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                        placeholder="Write a short excerpt or summary...">{{ old('excerpt') ?? $post->excerpt }}</textarea>
                    @error('excerpt')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Body --}}
                <div class="col-span-2">
                    <label for="body" class="block mb-2.5 text-sm font-medium text-heading">Content</label>
                    <textarea name="body" id="body" rows="8" value="{{ old('body') ?? $post->body }}"
                        class="block w-full p-3.5 text-sm text-gray-900 bg-neutral-secondary medium-box-border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                        placeholder="Write your post content here">{{ old('body') ?? $post->body }}</textarea>
                    @error('body')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-2">
                    <label for="image" class="block mb-2.5 text-sm font-medium text-heading">Image</label>
                    <input type="file" name="image" id="image" accept="image/png, image/jpg, image/jpeg"
                        class="bg-neutral-secondary medium-box-border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3  shadow-xs placeholder:text-body">
                    @error('image')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Form Footer (Buttons) --}}
            <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6 mt-4 md:mt-6">
                <button type="submit"
                    class="inline-flex items-center bg-blue-400 border border-blue-600 hover:bg-blue-600 font-medium rounded-base text-sm px-5 py-2.5 focus:outline-none">
                    Create Post
                </button>
                <a href="{{ route('dashboard.posts.index') }}"
                    class="text-body bg-red-400 medium-box-border border border-default-medium hover:bg-red-500 hover:text-heading rounded-base text-sm px-4 py-2.5 focus:outline-none">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
