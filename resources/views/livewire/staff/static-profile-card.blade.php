<div wire:poll class="col-span-1 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
    <div>
        {{-- <img class="h-64 mb-4 w-64 rounded shadow-lg" src="{{ $staff->user->profile_photo_url }}" alt="{{ $staff->user->name }}"> --}}

        <div>
           
            <div class="max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg hover:shadow-blue-400">
                <div class="relative">
                  <img class="w-full h-48 object-cover" src="{{ $staff->user->profile_photo_url }}" alt="Profile Image">
                </div>
                <div class="px-6 py-4">
                  <div class="text-xl font-semibold text-gray-800">{{ $staff->user->name }}</div>
                  <p class="text-gray-600">{{ $staff->user->email }}</p>
                </div>
                <div class="px-6 ">
                  <p class=" px-2 py-1 font-medium text-teal-900 ">{{ $staff->user->gender == 'm' ? 'Male' : 'Female' }}</p>
                  <p class=" px-2  font-medium text-indigo-900  ">{{ $staff->user->date_of_birth ?? 'Na' }}</p>
                  <p class=" px-2  font-medium text-purple-900  ">{{ $staff->user->phone_number ?? 'Na' }}</p>
                  <p class=" px-2  font-medium text-purple-900  ">{{ $staff->user->phone_number_two ?? '' }}</p>
                </div>
                <div class="px-6 py-4">
                    @livewire('staff.edit-profile-model', ['staff_id' => $staff->id], key('edit-profile-modal'))
                </div>
              </div>

        </div>
        {{-- <div class="px-2 py-2"> --}}
            {{-- @livewire('staff.edit-profile-model', ['staff_id' => $staff->id], key('edit-profile-modal')) --}}
        {{-- </div> --}}
    </div>
</div>
