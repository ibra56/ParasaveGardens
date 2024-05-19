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
                <a href="{{ route('purchases.purchase-orders.create') }}"
                    class="btn bg-indigo-500 hover:bg-indigo-600 text-white">New Purchase Order</a>
                {{-- @endif --}}
            </div>
        </div>
        <div wire:poll class="mt-2">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Reference
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Supplier
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Staff
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($purchaseOrders as $purchaseOrder)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $purchaseOrder->supplier_reference }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $purchaseOrder->supplier->name }}
                                <br>
                                {{ $purchaseOrder->supplier->phone }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $purchaseOrder->responsibleStaff->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ number_format(round($purchaseOrder->purchaseOrderItems->sum('ammount'), 2), 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <x-button wire:click="sendPerchaseOrder({{ $purchaseOrder->id }})">Send</x-button>
                                <x-button wire:click="recieveOrder({{ $purchaseOrder->id }})">Recieve</x-button>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
