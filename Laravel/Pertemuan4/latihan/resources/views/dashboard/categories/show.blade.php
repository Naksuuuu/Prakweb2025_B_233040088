@extends('layouts.dashboard-layout')

@section('title', $category->name . ' - Dashboard')

@section('content')
    <article class="max-w-5xl mx-auto bg-neutral-primary p-8 rounded-base shadow-md">
        <header class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $category->name }}</h1>

            <div class="flex items-center text-sm text-gray-600 mb-4">
                <span>{{ $category->created_at->format('d M Y') }}</span>
            </div>

        </header>



        <footer class="mt-8 pt-8 border-t border-gray-200">
            <div class="flex justify-between items-center">
                <a href="{{ route('dashboard.categories.index') }}"
                    class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                    ← Back to Categories
                </a>
            </div>
        </footer>
    </article>
@endsection
