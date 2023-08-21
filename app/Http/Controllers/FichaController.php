<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ficha;
use App\Models\User;
use App\Models\training_division;
use App\Models\muscleGroup;
use App\Models\exercise;


class FichaController extends Controller
{
    public function create($id) {

        $user = user::findOrFail($id);

        $trainings = training_division::all();

        $numbers = ['1', '2', '3', '4' , '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'];

        $muscleGroups = muscleGroup::all();

        $exercises = exercise::all();

        return view('admin.register.ficha', [
            'user' => $user,
            'trainings' => $trainings,
            'numbers' => $numbers,
            'muscleGroups' => $muscleGroups,
            'exercises' => $exercises
        ]);
    }

    public function getSelect($muscleGroupId) {
        
        $selectExercises = exercise::where('id_gmuscle_fk', $muscleGroupId)->get();

        return response()->json($selectExercises);
    }


    public function store(Request $request) {

        $name = $request->input('name');

        

        $ficha = $request->all();
        
        ficha::create($ficha);

        return redirect()->back()->with('msg-success', 'Exercício do aluno '.$name.' cadastrado com sucesso!');
    }
}
