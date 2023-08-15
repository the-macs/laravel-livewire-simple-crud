<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public $user;

    public $userId;

    public $name;
    public $email;
    public $gender;
    public $age;
    public $hometown;

    public $counter;

    public function mount()
    {
        $this->user = User::find($this->userId);

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->gender = $this->user->gender;
        $this->age = $this->user->age;
        $this->hometown = $this->user->hometown;

        $this->counter++;
    }

    public function render()
    {
        return view('livewire.edit-user');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'gender' => 'required|string',
            'age' => 'required|numeric',
            'hometown' => 'required|string',
        ]);

        try {
            $this->updateUser();

            $this->emit('updateUser');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function updateUser()
    {
        $array = [
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'age' => $this->age,
            'hometown' => $this->hometown
        ];

        User::where('id', $this->userId)->update($array);
    }

    public function backToCreate()
    {
        $this->emit('updateUser');
    }
}
