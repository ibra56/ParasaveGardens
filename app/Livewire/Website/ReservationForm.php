<?php

namespace App\Livewire\Website;

use App\Models\Customer;
use App\Models\Reservation;
use Livewire\Component;

class ReservationForm extends Component
{
    public $reservationModal_isOpen = false;
    public $name;
    public $email;
    public $phone;
    public $number_of_people;
    // public $expected_arrival;
    public $number_of_days;
    public $reservation_date;
    public function render()
    {
        return view('livewire.website.reservation-form');
    }

    public function openReservationModal(){
        $this->reservationModal_isOpen = true;
    }

    public function closeReservationModal(){
        $this->reservationModal_isOpen = false;
    }
    public function submit(){
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'sometimes|nullable|email',
            'phone' => 'sometimes|nullable',
            'number_of_people' => 'required',
            'reservation_date' => 'required|date|after_or_equal:today',
            'number_of_days' => 'required',
        ]);
        if(Customer::where('email', $this->email)->exists()){
            $customer = Customer::where('email', $this->email)->first();
        }else{
            $customer = Customer::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone
            ]);
        }
        Reservation::create([
            'customer_id' => $customer->id,
            'number_of_people' => $this->number_of_people,
            'reservation_date' => $this->reservation_date,
            'number_of_days' => $this->number_of_days,
        ]);
 
        noty()->addSuccess('Reservation submitted successfully');
        $this->reservationModal_isOpen = false;
        $this->reset();
    }
}
