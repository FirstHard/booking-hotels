<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Dashboard');
    }

    public function admin(Request $request)
    {
        $user = $request->user();
        if (Gate::allows('view-admin-panel', auth()->user())) {
            return Inertia::render('Admin/Dashboard', [
                'user' => $user, // Передаем пользователя в шаблон
                // Другие данные, которые необходимы для отображения на странице
            ]);
        } else {
            return redirect()->route('dashboard');
        }
    }
}
