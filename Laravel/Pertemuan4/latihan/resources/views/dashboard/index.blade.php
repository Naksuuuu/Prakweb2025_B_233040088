@extends('layouts.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
    {{-- Success Alert --}}

    <div class="container relative w-full px-4 py-8">

        @if (session('success'))
            <div class="absolute z-30 bottom-10 right-10 flex items-center p-4 mb-4 text-sm text-fg-success-strong rounded-base bg-success-soft border border-success-subtle"
                role="alert">
                {{-- SVG Icon --}}
                <svg class="w-4 h-4 me-2 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" width="24" height="24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 17l5-5-5-5" />
                    {{-- Path as seen in image might be M10 11v6m2-8v0h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z (information icon) --}}
                    {{-- Based on the image's path: M10 11v6m2-8v0h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z is a common info/success path, but the transcribed path looks like a custom icon. --}}
                    {{-- Transcribing the visible path exactly: --}}
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11v6m2-8v0h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>

                {{-- Alert Message --}}
                <p class="flex-1">
                    <span class="font-medium me-1">Success!</span> {{ session('success') }}
                </p>

                {{-- Close Button --}}
                <button type="button" onclick="this.parentElement.remove()"
                    class="ms-auto -mx-1.5 -my-1.5 bg-success-soft text-fg-success-strong rounded-base focus:ring-2 focus:ring-success-subtle p-1.5 hover:bg-success-medium inline-flex items-center justify-center h-8 w-8"
                    aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1l6 6m0 0l6 6M7 7L1 13M7 7L13 1" />
                    </svg>
                </button>
            </div>
        @endif

        <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>
        @include('components.table')
    </div>
@endsection
