<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
    }
    
    public function dashboard()
    {
        return Inertia::render('Dashboard', [
            'title' => 'Dashboard',
        ]);
    }

    public function admin(Request $request)
    {
        $user = $request->user();
        if (Gate::allows('view-admin-panel', auth()->user())) {
            return Inertia::render('Admin/Dashboard', [
                'pageDescription' => 'Page description',
                'title' => 'Admin Dashboard',
                'user' => $user,
            ]);
        } else {
            return redirect()->route('dashboard');
        }
    }
}
