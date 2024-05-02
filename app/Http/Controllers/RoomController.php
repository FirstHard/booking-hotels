<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class RoomController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Rooms', [
            'pageDescription' => 'Rooms description',
            'title' => 'Rooms',
        ]);
    }

    public function new()
    {
        return Inertia::render('Admin/Rooms', [
            'pageDescription' => 'Rooms description',
            'title' => 'Add new Room',
        ]);
    }
}
