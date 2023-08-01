<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ficha;

class FichaController extends Controller
{
    public function index() {
        return view('admin.register.ficha');
    }

    public function create(Request $request) {
        
        ficha::create($request->all());
    }
}
