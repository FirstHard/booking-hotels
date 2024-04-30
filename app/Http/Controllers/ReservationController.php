<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ReservationController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Reservations', [
            'pageDescription' => 'Reservations description',
            'title' => 'Reservations',
        ]);
    }

    public function new()
    {
        return Inertia::render('Admin/Reservations', [
            'title' => 'Add new Reservation',
        ]);
    }
}
