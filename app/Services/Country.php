<?php

namespace App\Services;

use App\Models\Country as Model;

class Country {

    public function getCountries()
    {
        return Model::select('countries.name', \DB::raw('COUNT(users.country_id) as user_count'))
            ->join('users', 'countries.id', '=', 'users.country_id')
            ->groupBy('countries.name')
            ->orderByDesc('user_count')
            ->limit(5)
            ->get();
    }
}
