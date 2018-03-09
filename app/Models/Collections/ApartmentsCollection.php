<?php

namespace App\Models\Collections;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Collection;

class ApartmentsCollection extends Collection
{
    public function getResponseData() : array
    {
        return $this->map(function (Apartment $apartment) {
           return $apartment->getResponseData();
        })->all();
    }
}