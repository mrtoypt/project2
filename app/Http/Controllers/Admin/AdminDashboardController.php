<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $data = [];
        return view('admin/dashboard', $data);
    }
    public function blank()
    {
        $data = [];
        return view('admin/blank', $data);
    }
}
