@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container w-full px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $title }}</h1>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-blue-500 to-purple-600">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            #
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            Nama Kategori
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($categories as $index => $category)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{ $category->name }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
