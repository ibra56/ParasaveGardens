<!-- resources/views/livewire/finances/suppliers-list-table.blade.php -->

<div class="w-full p-4" wire:poll>
    <div>
        <div class="flex items-center">
            <h2 class="text-lg font-bold">Products</h2>
            <div class="ml-auto">
                @livewire('products.new-product-modal', key('new-product-category-modal'))
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
                                            Options
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                            In Stock
                                        </th>
                                        {{-- <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                            Price
                                        </th> --}}
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-200 dark:divide-slate-700">
                                    @forelse ($products as $productCategory)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900 dark:text-slate-100">
                                                {{ $productCategory->name }}
                                                <br>
                                                <span class="text-sm text-slate-500 dark:text-slate-400">
                                                    {{ $productCategory->productCategory->name }}
                                                </span>
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">
                                                {{ $productCategory->description }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <span
                                                    class="inline-block px-2 py-1 text-xs font-semibold rounded-full {{ $productCategory->is_sellable ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                                    {{ $productCategory->is_sellable ? 'Sellable' : 'Not Sellable' }}
                                                </span>
                                                <span
                                                    class="inline-block px-2 py-1 text-xs font-semibold rounded-full {{ $productCategory->is_buyable ? 'bg-blue-500 text-white' : 'bg-red-500 text-white' }}">
                                                    {{ $productCategory->is_buyable ? 'Buyable' : 'Not Buyable' }}
                                                </span>
                                                <span
                                                    class="inline-block px-2 py-1 text-xs font-semibold rounded-full {{ $productCategory->is_manufacturable ? 'bg-purple-500 text-white' : 'bg-red-500 text-white' }}">
                                                    {{ $productCategory->is_manufacturable ? 'Manufacturable' : 'Not Manufacturable' }}
                                                </span>
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">
                                                {{ $productCategory->inventory ? $productCategory->inventory->quantity : 0 }}
                                                <br> @ UGX
                                                {{ App\Models\ProductPrice::where('product_id', $productCategory->id)->first() ? number_format(round(App\Models\ProductPrice::where('product_id', $productCategory->id)->first()->price, 2), 2) : 'Na' }}
                                            </td>
                                            {{-- <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">
                                                {{ $productCategory->inventory ? $productCategory->inventory->quantity : 0 }} @ 
                                                {{ App\Models\ProductPrice::where('product_id', $productCategory->id)->first() ? App\Models\ProductPrice::where('product_id', $productCategory->id)->first()->price : 'Na' }}
                                            </td> --}}
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">
                                                @livewire('products.product-details', ['product' => $productCategory], key($productCategory->id))
                                                @livewire('products.set-product-price', ['product' => $productCategory], key('set-product-price-' . $productCategory->id))
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center">No
                                                products
                                                found
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
