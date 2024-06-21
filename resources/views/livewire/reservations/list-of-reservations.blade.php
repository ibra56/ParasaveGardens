<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div wire:poll>
        {{-- Close your eyes. Count to one. That is how long forever feels. --}}
        <div class="overflow-x-auto p-4">


            <div class="py-4 px-4 flex justify-between  border-b border-slate-200 dark:border-slate-700">
                <h1 class="text-2xl font-semibold text-slate-800 dark:text-slate-200">Reservations</h1>
                <div class="flex justify-end">


                    {{-- <div class="relative mr-4">
                        <input type="text" wire:model.live="search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search name or email..." />
                    </div> --}}



                    <div class="mr-4">
                        {{-- per page selection --}}
                        <select wire:model.live="perPage"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="250">250</option>
                            <option value="500">500</option>
                        </select>
                    </div>


                </div>
            </div>
        </div>
        <div class="overflow-x-auto p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            ID</th>
                        <th
                            class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Customer</th>
                        <th
                            class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Facts</th>
                        <th
                            class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Dates</th>
                        {{-- <th
                            class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Room</th> --}}
                        <th
                            class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                    @forelse ($reservations as $reservation)
                        <tr id="{{ $reservation->id }}" key({{ $reservation->uuid }})>

                            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->uuid }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $reservation->customer->name }} <br>
                                {{ $reservation->customer->email ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Days: {{ $reservation->number_of_days }} <br>
                                People: {{ $reservation->number_of_people ?? 'N/A' }}</td>
                            {{-- <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->staff->user->name }}</td> --}}
                            <td class="px-6 py-4 whitespace-nowrap ">
                                <span
                                    class="bg-yellow-400 text-gray-900 py-0.5 px-1 rounded text-xs">{{ $reservation->reservation_date ?? 'N/A' }}</span>
                                <br>
                                <span
                                    class="bg-green-400 text-gray-900 py-0.5 px-1 rounded text-xs">{{ $reservation->checkin_date ?? 'N/A' }}</span>
                                <br>
                                <span
                                    class="bg-blue-400 text-gray-900 py-0.5 px-1 rounded text-xs">{{ $reservation->checkout_date ?? 'N/A' }}</span>
                            </td>

                            {{-- <td class="px-6 py-4 whitespace-nowrap">
                                {{ $reservation->roomPrice ? $reservation->roomPrice->room->name : 'N/A' }} <br>
                                @if ($reservation->custom_price == null)
                                    {{ $reservation->currency ? $reservation->currency->code : 'N/A' }}
                                    {{ $reservation->roomPrice ? $reservation->roomPrice->price : 'N/A' }}
                                @else
                                    {{ $reservation->currency ? $reservation->currency->code : 'N/A' }}
                                    {{ $reservation->custom_price ? $reservation->custom_price : 'N/A' }}
                                @endif
                            </td> --}}
                            <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                @if ($reservation->checkin_date == null)
                                    @livewire('reservations.checkin-modal', ['reservation' => $reservation], key('checkin-modal' . $reservation->id))
                                @elseif ($reservation->checkout_date == null)
                                    <x-button wire:click="checkout({{ $reservation->id }})"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Check Out
                                    </x-button>
                                @endif
                                {{-- <x-button wire:click="generatePDF({{ $reservation->id }})">Print</x-button> --}}

                                @livewire('transactions.new-transaction-modal', ['reservation' => $reservation], key('new-transaction-modal' . $reservation->id))
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-6 py-4 whitespace-nowrap text-center">No reservations found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
