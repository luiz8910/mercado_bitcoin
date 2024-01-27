<?php

namespace App\Traits;

trait Country
{
    public function getCountry()
    {
        $countries = [
            30, 173, 224, 225, 74,
        ];

        $number = rand(0, 4);

        return $countries[$number];
    }
}
