@extends('layouts.dashboard-layout')

@section('title', 'Create Category - Dashboard')

@section('content')
    <div class="min-w-[200px] w-3xl">
        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Create New Category</h1>
        </div>

        {{-- Form Card --}}
        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
            {{-- Form Header --}}
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5 mb-4 md:mb-6">
                <h3 class="text-lg font-medium text-heading">
                    Category Information
                </h3>
            </div>

            {{-- Import Form Component --}}
            <x-categories.form />
        </div>
    </div>
@endsection
