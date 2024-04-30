<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Clients', [
            'pageDescription' => 'Clients description',
            'title' => 'Clients',
        ]);
    }

    public function new()
    {
        return Inertia::render('Admin/Clients', [
            'title' => 'Add new Client',
        ]);
    }
}
