<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HotelController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Hotels', [
            'pageDescription' => 'Hotels description',
            'title' => 'Hotels',
        ]);
    }

    public function new()
    {
        return Inertia::render('Admin/Hotels', [
            'title' => 'Add new Hotel',
        ]);
    }
}
