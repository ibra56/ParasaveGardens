
<div class="overflow-x-auto mt-6" wire:poll>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Phone
                </th>

                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Email & Website
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Company
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($suppliers as $supplier)
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
            @endforeach
        </tbody>
    </table>
</div>
