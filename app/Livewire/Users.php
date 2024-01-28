<?php

namespace App\Livewire;

use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;

class Users extends Component
{
    public $user;
    public $countries;
    public $id;

    public $name;
    public $email;
    public $skills;
    public $country_id;
    public $jobTitle;
    public $education;
    public $notes;

    public function mount()
    {
        $this->id = Auth::user()->id;

        $this->user = User::find($this->id);

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->skills = $this->user->skills;
        $this->country_id = $this->user->country_id;
        $this->jobTitle = $this->user->jobTitle;
        $this->education = $this->user->education;
        $this->notes = $this->user->notes;

        $this->countries = Country::all();
    }

    public function save()
    {
        User::where('id', $this->id)
            ->update([
                "name" => $this->name,
                "email" => $this->email,
                "skills" => $this->skills,
                "country_id" => $this->country_id,
                "jobTitle" => $this->jobTitle,
                "education" => $this->education,
                "notes" => $this->notes,
            ]);

        return redirect()->to('/profile');
    }

    #[Title('Profile')]
    public function render()
    {
        return view('livewire.users');
    }
}
