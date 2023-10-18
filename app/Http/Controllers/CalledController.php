<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalledController extends Controller
{
    public function called() {
       
        return view('admin.called');
    }

    public function store(Request $request) {
        
    }

}
