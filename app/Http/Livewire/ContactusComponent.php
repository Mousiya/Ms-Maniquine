<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactusComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $Address;
   

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=> 'required',
            'email'=>'required|email',
            'phone'=>'required',
            'Address'=>'required'
        ]);
    }

    public function sendMessage()
    {
        $this->validate([
            'name'=> 'required',
            'email'=>'required|email',
            'phone'=>'required',
            'Address'=>'required'
        ]);
        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->phone = $this->phone;  
        $contact->Address = $this->Address;
        $contact->save();
        session()->flash('message','Thanks,Your message has been sent successfully!');
    }

    public function render()
    {
        return view('livewire.contactus-component')->layout('layouts.base');
    }
}