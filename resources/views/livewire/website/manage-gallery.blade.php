<div class="container mx-auto p-4">
    <div class="bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-4">Manage Gallery Items</h2>

        <!-- Form to add new gallery items -->
        <form wire:submit.prevent="addGalleryItem" class="mb-6">
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <x-input type="text" id="title" wire:model="title"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" />
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                <select id="type" wire:model="type"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    <option value="">Select Type</option>
                    <option value="image">Image</option>
                    <option value="video">Video</option>
                </select>
                @error('type')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="path" class="block text-sm font-medium text-gray-700">File Path</label>
                <x-input type="file" id="path" wire:model="path"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" />
                @error('path')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <span wire:loading wire:target="path" class="text-red-500 text-sm">loading. please wait...</span>
                @if ($path)
                    <span class="text-green-500 text-sm">File upload ready</span>
                @endif
            </div>

            <x-button wire:loading.attr="disabled" type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded shadow">Add Item</x-button>
        </form>

        <!-- Display existing gallery items -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($galleryItems as $item)
                <div class="bg-gray-100 p-4 rounded shadow-md">
                    <h3 class="text-lg font-bold">{{ $item->title }}</h3>
                    @if ($item->type == 'image')
                        <img src="{{ asset('storage/' . $item->path) }}" alt="{{ $item->title }}"
                            class="w-full h-48 object-cover mt-2 mb-4 rounded">
                    @elseif($item->type == 'video')
                        <video controls class="w-full h-48 mt-2 mb-4 rounded">
                            <source src="{{ asset('storage/' . $item->path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif
                    <button wire:confirm="Are you sure you want to delete this item?" wire:click="deleteGalleryItem({{ $item->id }})"
                        class="bg-red-500 text-white px-4 py-2 rounded shadow">Delete</button>
                </div>
            @endforeach
        </div>
    </div>
</div>
