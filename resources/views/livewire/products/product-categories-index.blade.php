<div class="w-full p-4" wire:poll>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg px-4 py-4">
            <div class="px-4  sm:px-6 px-4 mb-2"></div>
            <div class="flex items-center justify-between">
                <div class="px-4 sm:px-6 ">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Product Categories</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">List of all Product Categories</p>
                </div>
                <div class="px-4 sm:px-6 ">

        {{-- <div class="flex items-center">
            <h2 class="text-lg font-bold">Product Categories</h2>
            <div class="ml-auto"> --}}
                @livewire('products.new-product-category-modal' , key('new-product-category-modal'))
            </div>
            </div>
        </div>
        <div class="mt-4">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div
                            class="shadow overflow-hidden border-b border-slate-200 dark:border-slate-700 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                                <thead class="bg-slate-50 dark:bg-slate-800">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                            Description
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                            Created
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                            Updated
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-200 dark:divide-slate-700">
                                    @forelse ($productCategories as $productCategory)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900 dark:text-slate-100">
                                                {{ $productCategory->name }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">
                                                {{ $productCategory->description }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">
                                                {{ $productCategory->created_at->diffForHumans() }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">
                                                {{ $productCategory->updated_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center">No
                                                product
                                                categories found
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
