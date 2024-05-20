<div class="p-5">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg px-4 py-4">
        <div class="px-4  sm:px-6 px-4 mb-2"></div>
        <div class="flex items-center justify-between">
            <div class="px-4 sm:px-6 ">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Customer Orders</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">List of all Customer Orders</p>
            </div>
            <div class="px-4 sm:px-6 ">

                {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
                {{-- <div class="grid grid-cols-2 gap-4"> --}}
                    {{-- <div class="col-span-1"></div> --}}
                    <div class="col-span-1 flex justify-end">
                        @livewire('pos.new-customer-order-modal')
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>

    @livewire('pos.customer-orders-list-cards', [], key('pos-c-orders-cards'))
</div>
