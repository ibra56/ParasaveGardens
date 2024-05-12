<div class="bg-white shadow overflow-hidden sm:rounded-lg px-4 py-4">
    <div class="px-4 sm:px-6 px-4 mb-2"></div>
    <div class="flex items-center justify-between border border-gray-200 p-4">
        <div class="px-4 sm:px-6 mb-2">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Create New Purchase Order</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Select supplier to add to Purchase Order</p>
        </div>
    </div>
    <form wire:submit.prevent="createNewPurchaseOrder" class="p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-2 gap-4">
            <div class="px-4 bg-white rounded-lg ">
                <label for="supplier_reference" class="block text-sm font-medium text-gray-700 mb-2">Supplier Reference</label>
                <input type="text" id="supplier_reference" wire:model="supplier_reference" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @error('supplier_reference')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            
        <div class="px-4 bg-white rounded-lg">
            <label for="supplier" class="block text-sm font-medium text-gray-700 mb-2">Select Supplier</label>
            <select id="supplier_id" wire:model="supplier_id" class="w-3/4 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm py-2 px-3">
                <option value="1">Select Supplier</option>
                @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option> 
                @endforeach
            </select>
            @error('supplier_id')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            @script
            <script>
                $('#supplier').select2({
                    tags: true
                });
                $('#supplier').on("change", function(event) {
                    $wire.$set('supplier', event.target.value)
                });
            </script>
        @endscript
        </div>
        </div>
    <div class=" w-full ">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-2 gap-4">
            <div class="p-4 bg-white rounded-lg ">
                <label for="need_by_date" class="block text-sm font-medium text-gray-700 mb-2">Order Deadline</label>
                <input type="date" id="need_by_date" wire:model="need_by_date" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @error('need_by_date')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="p-4 bg-white rounded-lg ">
                <label for="expected_arrival_date" class="block text-sm font-medium text-gray-700 mb-2">Expected Arrival</label>
                <input type="date" id="expected_arrival" wire:model="expected_arrival" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @error('expected_arrival')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="px-4 sm:px-6 px-4 mb-2 mt-6">
       
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 py-4 border border-gray-200">
                    <thead class="bg-gray-200">
                        <tr class="bg-gray-200 border">
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                            {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th> --}}
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qty</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Price</th>

                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                <button type="button" wire:click="addField" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Add Field
                                </button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border px-4 py-2">
                            <x-validation-errors class="mb-4" />
                        </tr>
                        @foreach($fields as $index => $field)
                            <tr>
                                <td class="border px-4 py-2 whitespace-nowrap">
                                    <select id="product_id" wire:model="fields.{{ $index }}.product_id" class="mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        <option value="">Select</option>
                                        
                                        @foreach ($products as $product)
                                        {{$product}}
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                @script
                                <script>
                                    $(document).ready(function() {
                                        $('#product_id').select2();
                                    });
                                </script>
                                @endscript
                                <td class="border px-4 py-2 whitespace-nowrap">
                                    <input type="text" id="category_id" wire:model="fields.{{ $index }}.category_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm border-none " >
                                    @error('fields.{{ $index }}.category_id')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td class="border px-4 py-2 whitespace-nowrap">
                                    <input type="number" id="quantity" wire:model="fields.{{ $index }}.quantity" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm border-none ">
                                    @error('fields.{{ $index }}.quantity')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td class="border px-4 py-2 whitespace-nowrap">
                                    <input type="number" id="unit_price" wire:model="fields.{{ $index }}.unit_price" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm border-none ">
                                    @error('fields.{{ $index }}.unit_price')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </td>
                                
                                <td class="border px-2 py-2 w-32">
                                    <a href="#" wire:click="removeField({{ $index }})" class="bg-red-500 hover:bg-red-700 text-white font-sm py-2 px-2 rounded">
                                        Remove Field
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Submit</button>
        </form>
    </div>
</div>
