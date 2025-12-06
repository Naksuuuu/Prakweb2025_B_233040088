@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container justify-center w-full px-4 py-8">
        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Welcome Back</h2>

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                </div>
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 rounded-lg transition duration-200">
                    Login
                </button>
            </form>

            <p class="text-center text-gray-600 text-sm mt-6">
                Don't have an account?
                <a href="{{ route('showRegister') }}" class="text-blue-600 hover:text-blue-700 font-medium">Register
                    here</a>
            </p>
        </div>
    </div>
@endsection
