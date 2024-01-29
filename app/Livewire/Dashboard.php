<?php

namespace App\Livewire;

use App\Models\Country;
use App\Models\User;
use App\Services\Country as CountryService;
use Livewire\Component;

class Dashboard extends Component
{

    public $users;
    public $countries;
    public $chartData = '';
    public $total_users = 0;

    public function render()
    {
        $this->countries = Country::all();

        $this->total_users = User::all()->count();

        $this->users = User::orderByDesc('created_at')->limit(10)->get();

        $country_services = new CountryService();

        if($this->chartData == ""){
            $this->chartData = $country_services->getCountries();
        }

        $this->dispatch('chart', ['chartData' => $this->chartData]);

        return view('livewire.dashboard');
    }
}
