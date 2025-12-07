<nav class="w-full">
    <div class="flex justify-between items-center h-16 container mx-auto">
        <div>
            Dashboard Logo
        </div>
        <ul class="flex gap-4 items-center">
            <li><a href="{{ route('dashboard.home') }}" class="text-gray-700 hover:text-gray-900">Home</a></li>
            <li><a href="{{ route('dashboard.categories.index') }}"
                    class="text-gray-700 hover:text-gray-900">Categories</a></li>
            <li><a href="{{ route('dashboard.posts.index') }}" class="text-gray-700 hover:text-gray-900">Posts</a></li>
            <li><a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900">Beranda</a></li>

            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-400 py-2 px-4 rounded-lg text-gray-700 hover:text-gray-900">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>
