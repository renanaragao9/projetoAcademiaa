<?php

namespace App\Http\Controllers;

use App\Models\assessment;
use App\Models\ficha;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home() {

        $users = User::all();
        $fichas = ficha::all();
        $assessment = assessment::all();

        return view('admin.home', [
            'users' => $users,
            'fichas' => $fichas,
            'assessment' => $assessment
        ]);
    }
  
    public function statistic() {
        return view('admin.statistics');
    }

    public function called() {
        return view('admin.called');
    }
    
}
