<div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center gap-4 ">

    <form method="GET" action="{{ route('dashboard.categories.index') }}" class="flex flex-1 max-w-md">
        <label for="search" class="sr-only">Search</label>

        <div class="relative flex-1">

            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="M21 21l-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                </svg>
            </div>

            <input type="search" name="search" id="search" value="{{ request('search') }}"
                class="block w-full input py-3 ps-9 bg-neutral-secondary border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                placeholder="Search categories..." />

            <button type="submit"
                class="absolute end-1.5 bottom-1.5 text-white bg-brand hover:bg-brand-strong border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-text px-3 py-1.5 focus:outline-none">
                Search
            </button>

        </div>
    </form>

    <a href="{{ route('dashboard.categories.create') }}"
        class="inline-flex items-center center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 whitespace-nowrap">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Add Category
    </a>

</div>

<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
            <tr>
                <th scope="col" class="px-6 py-3 font-medium">
                    No
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Published At
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr class="bg-neutral-primary border-b border-default">
                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        {{ $categories->firstItem() + $loop->index }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $category->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $category->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('dashboard.categories.show', $category->name) }}"
                            class="text-blue-600 hover:text-blue-800 font-medium me-4">View</a>
                        <a href="{{ route('dashboard.categories.edit', $category->name) }}"
                            class="text-green-600 hover:text-green-800 font-medium me-4">Edit</a>
                        <form action="{{ route('dashboard.categories.destroy', $category->name) }}" method="POST"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium"
                                onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr class="bg-neutral-primary border-b border-default">
                    <td colspan="6" class="px-6 py-4 text-center">
                        <p>No Category Yet</p>
                    </td>
                </tr>
            @endforelse


        </tbody>
    </table>
</div>

<div class="p-4">
    @if ($categories->hasPages())
        <div class="px-4 py-4 border-t border-gray-200">
            <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
                <div class="flex-1 flex justify-between sm:hidden">
                    {{-- Previous Button --}}
                    @if ($categories->onFirstPage())
                        <span
                            class="flex items-center justify-center text-gray-400 bg-gray-100 box-border border border-gray-300 cursor-not-allowed font-medium rounded-s-base text-sm px-3 h-10">Previous</span>
                    @else
                        <a href="{{ $categories->previousPageUrl() }}"
                            class="flex items-center justify-center text-body bg-neutral-secondary medium-box-border border border-default-medium hover:bg-neutral-tertiary hover:text-heading font-medium rounded-s-base text-sm px-3 h-10 focus:outline-none">Previous</a>
                    @endif

                    {{-- Next Button --}}
                    @if ($categories->hasMorePages())
                        <a href="{{ $categories->nextPageUrl() }}"
                            class="flex items-center justify-center text-body bg-neutral-secondary medium-box-border border border-default-medium hover:bg-neutral-tertiary hover:text-heading font-medium rounded-e-base text-sm px-3 h-10 focus:outline-none">Next</a>
                    @else
                        <span
                            class="flex items-center justify-center text-gray-400 bg-gray-100 box-border border border-gray-300 cursor-not-allowed font-medium rounded-e-base text-sm px-3 h-10">Next</span>
                    @endif
                </div>

                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        {{-- Page Numbers --}}
                        <div class="flex text-sm">
                            @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                                @if ($page == $posts->currentPage())
                                    <span aria-current="page"
                                        class="flex items-center justify-center text-fg-brand bg-neutral-tertiary medium-box-border border border-default-medium hover:text-fg-brand font-medium text-sm w-10 h-10 focus:outline-none">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}"
                                        class="flex items-center justify-center text-body bg-neutral-secondary medium-box-border border border-default-medium hover:bg-neutral-tertiary hover:text-heading font-medium text-sm w-10 h-10 focus:outline-none">{{ $page }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    @endif
</div>
