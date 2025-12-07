@props(['category'])

{{-- Form Body --}}
<form action="{{ route('dashboard.categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="grid gap-4 grid-cols-2">
        {{-- Title --}}
        <div class="col-span-2">
            <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="bg-neutral-secondary medium-box-border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                placeholder="Enter category name" required>
            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Form Footer (Buttons) --}}
    <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6 mt-4 md:mt-6">
        <button type="submit"
            class="inline-flex items-center bg-blue-400 border border-blue-600 hover:bg-blue-600 font-medium rounded-base text-sm px-5 py-2.5 focus:outline-none">
            Create Category
        </button>
        <a href="{{ route('dashboard.categories.index') }}"
            class="text-body bg-red-400 medium-box-border border border-default-medium hover:bg-red-500 hover:text-heading rounded-base text-sm px-4 py-2.5 focus:outline-none">
            Cancel
        </a>
    </div>
</form>
