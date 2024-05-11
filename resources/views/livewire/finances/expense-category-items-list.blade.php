<div wire:poll class="p-5">
    {{-- Care about people's approval and you will be their prisoner. --}}
    @can('view-expense-category')

        <div class="bg-white overflow-x-auto shadow-xl p-4">

            <div class="overflow-x-auto">
                <div class="flex justify-between">
                    <div>
                        <h2 class="text-lg font-bold capitalize">{{ $category->name }}</h2>
                        <p class="text-sm text-gray-500 capitalize">{{ $category->type . ' Category Items' }}</p>
                    </div>
                    {{-- <div>
                    <input wire:model.live.debounce.300ms="search" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                        placeholder="Search" required="">
                </div> --}}

                    <div class="flex justify-end space-x-2">
                        <div>
                            {{-- filter by per page --}}
                            <select wire:model.live.debounce="perPage"
                                class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="500">500</option>
                            </select>
                        </div>
                        @can('create-expense-category')
                            @livewire('finances.new-expense-category-item', ['category' => $category], key('new-fin-category-item'))
                        @endcan

                    </div>

                </div>
                <x-section-border />

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description</th>
                            {{-- <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                Code</th> --}}
                            @canany(['edit-expense-category', 'delete-expense-category'])
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            @endcanany
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">

                        @forelse ($categoryItems as $category)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $category->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $words = explode(' ', $category->description);
                                        $shortDescription = implode(' ', array_slice($words, 0, 3));
                                        echo strlen($category->description) > strlen($shortDescription)
                                            ? $shortDescription . '...'
                                            : $shortDescription;
                                    @endphp
                                </td>

                                {{-- <td class="px-6 py-4 whitespace-nowrap">{{ $category->sr_code }}</td> --}}
                                @canany(['edit-expense-category', 'delete-expense-category'])
                                    <td class="px-6 py-4 whitespace-nowrap flex space-x-2">

                                        @can('edit-expense-category')
                                            <div class="col-span-1">
                                                @livewire('finances.edit-expense-category-item', ['categoryItem' => $category], key("edit-category-item-{$category->id}"))
                                            </div>
                                        @endcan
                                        @can('delete-expense-category')
                                            <div class="col-span-1">
                                                <x-button wire:confirm="Are you sure you want to delete this item?"
                                                    wire:click="deleteCategoryItem({{ $category->id }})"
                                                    class="bg-red-500 hover:bg-red-700">
                                                    Delete
                                                </x-button>
                                            </div>
                                        @endcan

                                    </td>
                                @endcanany
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-500 mt-4">
                                    No category items found.
                                </td>

                            </tr>
                        @endforelse


                    </tbody>
                </table>
                {{ $categoryItems->links() }}
            </div>

        </div>

    @endcan
</div>
