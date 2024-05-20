<!-- resources/views/livewire/create-order.blade.php -->
<div>
    <x-button wire:click="openModal">
        Create Order
    </x-button>

    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            Create New Order
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="">
                <div class="col-span-6 grid grid-cols-6 -mx-2">
                    <div class="col-span-6 px-2 mb-4">
                        <x-validation-errors class="text-red" />
                    </div>
                    <div class="col-span-6 px-2 mb-4">
                        <x-label for="customer_select" value="Customer" />
                        <div>
                            <x-button wire:click.prevent="toggleCreatingCustomer">
                                {{ $isCreatingCustomer ? 'Select Existing Customer' : 'Create New Customer' }}
                            </x-button>
                        </div>
                    </div>

                    @if ($isCreatingCustomer)
                        <div class="col-span-3 px-2 mb-4">
                            <x-label for="new_customer_name" value="Name" />
                            <x-input id="new_customer_name" type="text" class="mt-1 block w-full"
                                wire:model="new_customer_name" />
                            @error('new_customer_name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-3 px-2 mb-4">
                            <x-label for="new_customer_email" value="Email" />
                            <x-input id="new_customer_email" type="email" class="mt-1 block w-full"
                                wire:model="new_customer_email" />
                            @error('new_customer_email')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-3 px-2 mb-4">
                            <x-label for="new_customer_phone" value="Phone" />
                            <x-input id="new_customer_phone" type="text" class="mt-1 block w-full"
                                wire:model="new_customer_phone" />
                            @error('new_customer_phone')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    @else
                        <div class="col-span-3 px-2 mb-4">
                            <x-label for="customer_id" value="Select Customer" />
                            <select wire:model="customer_id" id="customer_id" class="block mt-1 w-full">
                                <option value="">Select Customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            @error('customer_id')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                    {{-- </div>

                <div class="col-span-6 grid grid-cols-6 -mx-2"> --}}
                    <div class="col-span-3 px-2 mb-4">
                        <x-label for="table_number" value="Table Number" />
                        <x-input id="table_number" type="text" class="mt-1 block w-full" wire:model="table_number" />
                        @error('table_number')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- 
                    <div class="col-span-3 px-2 mb-4">
                        <x-label for="payment_method" value="Payment Method" />
                        {{-- <x-input id="payment_method" type="text" class="mt-1 block w-full"
                            wire:model="payment_method" /> --}---}
                        <select id="payment_method"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            wire:model.defer="payment_method">
                            <option value="">Select Payment Method</option>
                            <option value="cash">Cash</option>
                            <option value="card">Card</option>
                            <option value="mobile_money">Mobile Money</option>
                        </select>
                        @error('payment_method')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div> --}}

                    <div class="col-span-3 px-2 mb-4">
                        <x-label for="server_id" value="Server" />
                        <select wire:model="server_id" id="server_id" class="block mt-1 w-full">
                            <option value="">Select Server</option>
                            @foreach ($staff as $member)
                                <option value="{{ $member->user->id }}">{{ $member->user->name }}</option>
                            @endforeach
                        </select>
                        @error('server_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-span-6 grid grid-cols-6 mt-4">
                    <div class="col-span-6">
                        <x-label for="orderItems" value="Order Items" />
                        <x-button wire:click.prevent="addOrderItem">Add Item</x-button>
                    </div>
                    @foreach ($orderItems as $index => $orderItem)
                        <div class="col-span-6 grid grid-cols-6 -mx-2">
                            <div class="col-span-2 px-2">
                                <select wire:model="orderItems.{{ $index }}.product_id"
                                    class="block mt-1 w-full">
                                    <option value="">Select Menu Item</option>
                                    @foreach ($menuItems as $menuItem)
                                        <option value="{{ $menuItem->id }}">{{ $menuItem->name }}</option>
                                    @endforeach
                                </select>
                                @error('orderItems.' . $index . '.product_id')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-span-1 px-2">
                                <x-input type="number" min="1"
                                    max="{{ App\Models\Inventory::where('product_id', $menuItem->id)->first()->quantity }}"
                                    class="mt-1 block w-full" placeholder="Quantity"
                                    wire:model="orderItems.{{ $index }}.quantity" />
                                @error('orderItems.' . $index . '.quantity')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-span-2 px-2">
                                <x-input type="text" class="mt-1 block w-full" placeholder="Special Requests"
                                    wire:model="orderItems.{{ $index }}.special_requests" />
                            </div>
                            <div class="col-span-1 px-2">
                                <x-danger-button wire:click.prevent="removeOrderItem({{ $index }})"
                                    class="ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg>
                                </x-danger-button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal">Cancel</x-secondary-button>
            <x-button wire:click="saveOrder">Save Order</x-button>
        </x-slot>
    </x-dialog-modal>
</div>
