<?php

namespace App\Livewire\Reservations;

use App\Models\Currency;
use App\Models\Room;
use App\Models\RoomPrice;
use App\Models\Staff;
use Livewire\Component;

class CheckinModal extends Component
{
    public $reservation;
    public $checkInModal_isOpen = false;

    public $room_id;
    public $custom_price;
    public $room_price_id;
    public $checkin_date;
    public $staff_id;
    public $currency_id;

    protected $rules = [
        'room_id' => 'required|exists:rooms,id',
        'custom_price' => 'required|numeric',
        // 'room_price_id' => 'required|exists:room_prices,id',
        'checkin_date' => 'required|date',
        'currency_id' => 'required|exists:currencies,id',
    ];

    public function openModal()
    {
        $this->checkInModal_isOpen = true;
    }

    public function closeModal()
    {
        $this->checkInModal_isOpen = false;
    }

    public function mount($reservation)
    {
        $this->reservation = $reservation;
        $this->checkin_date = now()->addHours(3)->format('Y-m-d H:i');
    }

    public function render()
    {
        return view('livewire.reservations.checkin-modal', [
            'rooms' => Room::all(),
            'currencies' => Currency::all(),
        ]);
    }

    public function checkIn()
    {
        $this->validate();

        $this->reservation->update([
            'room_id' => $this->room_id,
            'custom_price' => $this->custom_price,
            'currency_id' => $this->currency_id,
            'checkin_date' => $this->checkin_date,
            'staff_id' => Staff::where('user_id', auth()->user()->id)->first()->id,
        ]);

        Room::find($this->room_id)->delete();
        noty()->addSuccess('Check-in successful!');
        $this->reset(['room_id', 'custom_price', 'room_price_id', 'checkin_date', 'currency_id']);
        $this->closeModal();
    }
}
