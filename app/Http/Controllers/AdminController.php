<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home() {
        return view('admin.home');
    }

    public function users() {
        return view('admin.users');
    }

    public function statistic() {
        return view('admin.statistics');
    }

    public function called() {
        return view('admin.called');
    }
    
}
