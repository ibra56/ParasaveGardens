<div class="bg-white p-5  dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-1 text-xl font-semibold text-slate-800 dark:text-slate-100">
            Suppliers
        </div>
        <div class="col-span-1 flex justify-end">
            @livewire('finances.new-supplier-modal', key('finances-suppliers-new-supplier-modal-' . uniqid()))
        </div>
    </div>
    <div>
        @livewire('finances.suppliers-list-table', key('finances-suppliers-list-table-'))
    </div>
</div>
