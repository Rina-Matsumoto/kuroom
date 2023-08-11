<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index(Reservation $reservation)
    {
        return $reservation->get();
    }
}
