<form class="book_now" wire:submit.prevent="submit" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12">
        <x-validation-errors />
        </div>
        <div class="col-md-6">
            <span>Name</span>
            <input class="online_book" placeholder="Full name here" wire:model="name" type="text">
        </div>
        <div class="col-md-6">
            <span>Email</span>
            <input class="online_book" placeholder="Email" wire:model="email" type="email" >
        </div>
        <div class="col-md-6">
            <span>Phone</span>

            <input class="online_book" placeholder="Phone" wire:model="phone" type="text">
        </div>
        <div class="col-md-6">
            <span>Number of people</span>
            <input class="online_book" placeholder="Number of people" type="number" wire:model="number_of_people" >
        </div>
        <div class="col-md-6">
            <span>Expected Arrival</span>
            <input class="online_book" placeholder="dd/mm/yyyy" type="date" wire:model="reservation_date">
        </div>
        <div class="col-md-6">
            <span>Number of Days</span>
            <input class="online_book" placeholder="Number of days" type="number" wire:model="number_of_days">
        </div>
        {{-- add room price --}}

        <!-- Button trigger modal -->
        <button  type="submit" class="btn btn-tertiary">
            Book
        </button>

        {{-- <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

</form>
