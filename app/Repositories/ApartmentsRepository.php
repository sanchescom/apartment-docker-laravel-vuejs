<?php

namespace App\Repositories;

use App\Models\Apartment;
use App\Models\Collections\ApartmentsCollection;

class ApartmentsRepository
{
    /**
     * @return Apartment[]|ApartmentsCollection|\Illuminate\Database\Eloquent\Builder[]
     */
    public static function getAll()
    {
        return Apartment::query()->get();
    }
}