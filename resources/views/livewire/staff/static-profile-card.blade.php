<div wire:poll
    class="col-span-1 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
    <div>
        <img class="h-64 mb-4 w-64 rounded shadow-lg" src="{{ $staff->user->profile_photo_url }}" alt="{{ $staff->user->name }}">

        <div>
            <h2 class="text-2xl px-2 font-semibold">{{ $staff->user->name }}</h2>
            <p class="text-md px-2 text-gray-600 pb-2">{{ $staff->user->email }}</p>
            <table class="">
                <tbody class="text-sm font-medium">
                    <tr>
                        <td class="px-2 whitespace-nowrap text-md text-gray-600">Gender:</td>
                        <td class="whitespace-nowrap text-md text-gray-600">
                            {{ $staff->user->gender == 'm' ? 'Male' : 'Female' }}</td>
                    </tr>
                    <tr>
                        <td class="px-2 whitespace-nowrap text-md text-gray-600">DoB:</td>
                        <td class="whitespace-nowrap text-md text-gray-600">
                            {{ $staff->user->date_of_birth ?? 'Na' }}</td>
                    </tr>
                    <tr>
                        <td class="px-2 whitespace-nowrap text-md text-gray-600">Phone:</td>
                        <td class="whitespace-nowrap text-md text-gray-600">
                            {{ $staff->user->phone_number ?? 'Na' }}</td>
                    </tr>
                    <tr>
                        <td class="px-2 whitespace-nowrap text-md text-gray-600"></td>
                        <td class="whitespace-nowrap text-md text-gray-600">
                            {{ $staff->user->phone_number_two ?? '' }}</td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="px-2 py-2">
            @livewire('staff.edit-profile-model', ['staff_id' => $staff->id], key('edit-profile-modal'))
        </div>
    </div>
</div>
