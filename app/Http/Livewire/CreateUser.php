<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{
    public $name;
    public $email;
    public $gender;
    public $age;
    public $hometown;

    public function render()
    {
        return view('livewire.create-user');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required|string',
            'age' => 'required|numeric',
            'hometown' => 'required|string',
        ]);

        try {
            $this->insertUser();

            $this->emit('storeUser');
            $this->reset();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function insertUser()
    {
        $array = [
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'age' => $this->age,
            'hometown' => $this->hometown,
            'password' => Hash::make('password'),
        ];

        User::create($array);
    }
}
