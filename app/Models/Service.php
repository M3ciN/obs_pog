<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;

class Service extends Model
{
    protected $table = 'services';

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
