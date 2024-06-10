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
    public $number_of_people;   
    public $number_of_days;
    public $rooms;
    public $room_price;
    public $selectedRoom;
    public $roomPrice;
    public $custom_price;

    public function mount(){
        $this->reservation_date = now()->addHours(3)->format('Y-m-d\TH:i');
        $this->checkout_date = now()->addHours(3)->addDay()->format('Y-m-d\TH:i');
        $this->rooms = RoomPrice::with('room')->get();
        // the room price is the price of the room selected
        // $this->room_price = $this->rooms->first()->price;
        
        
        

    }
    public function updatedRoomPriceId($value)
    {
        $this->roomPrice = RoomPrice::find($value);
        $this->room_price = $this->roomPrice->price;
    }

    public function render()
    {
        return view('livewire.reservations.new-reservation-form', [
            'guests' => Customer::all(),
            'rooms' => RoomPrice::all(),
            
            
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
            'number_of_people' => $this->number_of_people,
            'number_of_days' => $this->number_of_days,
            'custom_price' => $this->custom_price ?? null
        ]);
        // $this->selectedRoom = RoomPrice::find($this->room_price_id);
        // dd($this->selectedRoom);

        RoomPrice::where('id', $this->room_price_id)->delete();
    
        
        noty()->addSuccess('Reservation created successfully');
        $this->reset();
        $this->mount();
    }
}
