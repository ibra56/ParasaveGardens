<div class="bg-white p-5  dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg px-4 py-4">
        <div class="px-4  sm:px-6 px-4 mb-2"></div>
        <div class="flex items-center justify-between">
            <div class="px-4 sm:px-6 ">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Suppliers</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">List of all Suppliers</p>
            </div>
            <div class="px-4 sm:px-6 ">

            @livewire('finances.new-supplier-modal', key('finances-suppliers-new-supplier-modal-' . uniqid()))
        </div>
        </div>
    </div>
    <div>
        @livewire('finances.suppliers-list-table', key('finances-suppliers-list-table-'))
    </div>
</div>
