<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }

    public function profile()
    {
        $user = auth()->user();
        $userDetails = $user->details;
        return view("profile.profile", compact([
            'user',
            'userDetails'
        ]));
    }
    public function viewProfile()
    {
        return view('profile.view');
    }
    public function reviewProfile()
    {
        return view('profile.review');
    }
}
