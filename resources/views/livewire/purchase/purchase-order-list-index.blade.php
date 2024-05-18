<div>
    {{-- Stop trying to control. --}}
    <div class="bg-white shadow overflow-hidden sm:rounded-lg px-4 py-4">
        <div class="px-4  sm:px-6 px-4 mb-2"></div>
        <div class="flex items-center justify-between">
            <div class="px-4 sm:px-6 ">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Purchase Orders</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">List of all purchase orders</p>
            </div> 
            <div class="px-4 sm:px-6 ">
                {{-- @if (auth()->user()->can('create-requisition')) --}}
                    <a href="{{ route('purchases.purchase-orders.create') }}" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">New Purchase Order</a>
                {{-- @endif --}} 
            </div>
        </div>
        <div  wire:poll class="mt-2">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Reference
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Confirmation Date
                        </th>
        
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Supplier
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- @foreach ($suppliers as $supplier)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $supplier->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $supplier->phone }}
                                <br>
                                {{ $supplier->phone2 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $supplier->email }}
                                <br>
                                {{ $supplier->website }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $supplier->company }} 
                                <br>
                                {{ $supplier->address }}
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
