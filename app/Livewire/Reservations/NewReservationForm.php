<?php

namespace App\Livewire\Reservations;

use App\Models\Customer;
use App\Models\Reservation;
use App\Models\RoomPrice;
use App\Models\Staff;
use Livewire\Component;

class NewReservationForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $gender;
    public $reservation_date;
    public $nin;
    public $address;
    public $phone2;
    public $room_price_id;
    public $checkout_date;

    public function mount(){
        $this->reservation_date = now()->addHours(3)->format('Y-m-d\TH:i');
        $this->checkout_date = now()->addHours(3)->addDay()->format('Y-m-d\TH:i');

    }

    public function render()
    {
        return view('livewire.reservations.new-reservation-form', [
            'guests' => Customer::all(),
            'rooms' => RoomPrice::all()
        ]);
    }

    public function updatedName()
    {
        $customer = Customer::where('name', $this->name)->first();
        if ($customer) {
            $this->email = $customer->email;
            $this->phone = $customer->phone;
            $this->phone2 = $customer->phone2;
            $this->address = $customer->address;
            $this->nin = $customer->nin;
            $this->gender = $customer->gender;
        }
    }


    public function saveReservation()
    {
        $customer =  Customer::updateOrCreate([
            'name' => $this->name,
            'nin' => $this->nin
        ], [
            'name' => $this->name,
            'email' => $this->email ?? null,
            'phone' => $this->phone ?? null,
            'phone2' => $this->phone2 ?? null,
            'address' => $this->address ?? null,
            'nin' => $this->nin ?? null,
            // 'gender' => $this->gender
        ]);

        Reservation::create([
            'customer_id' => $customer->id,
            'staff_id' => Staff::where('user_id', auth()->user()->id)->first()->id,
            'reservation_date' => $this->reservation_date,
            'room_price_id' => $this->room_price_id,
            'checkout_date' => $this->checkout_date,
        ]);

        noty()->addSuccess('Reservation created successfully');
        $this->reset();
    }
}
