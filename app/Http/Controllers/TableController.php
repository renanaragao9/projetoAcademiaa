<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\muscle_group;


class TableController extends Controller
{

    public function exercise() {

        
        return view('admin.table.exercise');
    }

}
