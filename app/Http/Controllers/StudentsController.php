<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ficha;
use App\Models\User;
use App\Models\training_division;
use App\Models\muscleGroup;
use App\Models\exercise;


class StudentsController extends Controller
{
    public function index() {
        
        if (auth()->check()) {
            
            $userId = auth()->user()->id;

            
            $fichas = Ficha::where('id_user_fk', $userId)
            ->select('fichas.id_training_fk', 'training_division.name_training')
            ->join('training_division', 'fichas.id_training_fk', '=', 'training_division.id_training')
            ->distinct()
            ->get();

            $fullName = auth()->user()->name;
            $nameParts = explode(' ', $fullName);
            $firstName = $nameParts[0];

            return view('users.index', [
                'fichas' => $fichas,
                'firstName' => $firstName
            ]);           
        }
    }
}
