<nav class="w-full">
    <div class="flex justify-between items-center h-16 container mx-auto">
        <div>
            logo
        </div>
        <ul class="flex gap-4">
            <li><a href="{{ url('/') }}" class="text-gray-700 hover:text-gray-900">Home</a></li>
            <li><a href="{{ route('categories.index') }}" class="text-gray-700 hover:text-gray-900">Categories</a></li>
            <li><a href="{{ route('posts.index') }}" class="text-gray-700 hover:text-gray-900">Posts</a></li>
            <li><a href="{{ route('showLogin') }}"
                    class="bg-blue-400 py-2 px-4 rounded-lg text-gray-700 hover:text-gray-900">Login</a>
            </li>
        </ul>
    </div>
</nav>
