<div>
    {{-- Do your work, then step back. --}}
    <div class="bg-white shadow overflow-hidden sm:rounded-lg px-4 py-4">
        <div class="px-4  sm:px-6 px-4 mb-2"></div>
        <div class="flex items-center justify-between">
            <div class="px-4 sm:px-6 ">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Create New Requisition</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Select Products Categories to add to Requisition</p>
            </div>
        </div>
        <div class=" sm:px-6 space-y-6 w-full mt-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4  bg-red-100 ">
                <p class="text-sm text-gray-500 mt-2">Select Category</p>
              <Select class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="1">Select Category</option>
                <option value="2">Category 1</option>
                <option value="3">Category 2</option>
                <option value="4">Category 3</option>
                <option value="5">Category 4</option>
              </Select>
            </div>
        </div>
    </div>
</div>
