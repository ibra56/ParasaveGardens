<div wire:poll class="p-5">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @can('view-expense-category')
        <div class="bg-white overflow-x-auto shadow-xl p-4">

            <div class="overflow-x-auto">
                <div class="flex justify-between">
                    <div>
                        <h2 class="text-lg font-bold">Expense Categories</h2>
                    </div>
                    <div>
                        <input wire:model.live.debounce.300ms="search" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                            placeholder="Search" required="">
                    </div>
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
                    <div class="">
                        @can('create-expense-category')
                            @livewire('finances.new-expense-category-model', ['type' => 'expense'], key('new-fin-exp-category-'))
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
                   
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @if ($categories->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center text-gray-500 mt-4">
                                    No expense categories found.
                                </td>

                            </tr>
                        @else
                            @foreach ($categories as $index => $category)
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
                                    @canany(['edit-expense-category', 'view-expense-category'])
                                        <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                            @can('view-expense-category')
                                                <div class="col-span-1">
                                                    <x-button wire:click="showCategory({{ $category->id }})">
                                                        Details
                                                    </x-button>
                                                </div>
                                            @endcan

                                            @can('edit-expense-category')
                                                <div class="col-span-1">
                                                    @livewire('finances.edit-expense-category-modal', ['category' => $category], key('edit-category-' . $category->id))
                                                </div>
                                            @endcan

                                        </td>
                                    @endcanany
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    @endcan


</div>
