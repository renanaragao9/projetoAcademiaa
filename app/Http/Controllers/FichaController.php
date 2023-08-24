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
        
        $request->validate([
            'id_training_fk' => 'required',
            'id_gmuscle_fk_to_ficha' => 'required',
            'id_exercise_fk' => 'required',
            'serie' => 'required',
            'repetition' => 'required',
            'id_user_fk' => 'required',
            'name' => 'required',
            'id_user_creator_fk' => 'required',
        ], [ 
            'id_training_fk.required' => 'O campo treino é obrigatorio',
            'id_gmuscle_fk_to_ficha.required' => 'O campo grupo muscular é obrigatorio',
            'id_exercise_fk.required' => 'O campo exercício é obrigatorio',
            'serie.required' => 'O campo serie é obrigatorio',
            'repetition.required' => 'O campo repetição é obrigatorio',
        ]);


        
        $ficha = $request->all();
        
        ficha::create($ficha);

        return redirect()->back()->with('msg-success', 'Exercício do aluno '.$name.' cadastrado com sucesso!');
    }

    public function show_table_exercise_user($id) {
        
        $fichaUsers = ficha::with(['exercise', 'muscleGroup', 'user', 'creator', 'training'])
        ->where('id_user_fk', $id)
        ->get();

        $userName = $fichaUsers->first();

        $numbers = ['1', '2', '3', '4' , '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'];

        return view('admin.table.tableUser', [
            'fichaUsers' => $fichaUsers, 
            'userName' => $userName,
            'numbers' => $numbers
        ]);
    }

    public function edit($id) {
        
        $ficha = ficha::findOrFail($id);

        $numbers = ['1', '2', '3', '4' , '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'];

        $trainings = training_division::all();

        $muscleGroups = muscleGroup::all();

        $exercises = exercise::all();

        return view('admin.editions.ficha', [
            'ficha' => $ficha, 
            'numbers' => $numbers,
            'trainings' => $trainings,
            'muscleGroups' => $muscleGroups,
            'exercises' => $exercises,
            
        ]);
    }

    public function update(Request $request) {

        $request->validate([
            'id_training_fk' => 'required',
            'id_gmuscle_fk_to_ficha' => 'required',
            'id_exercise_fk' => 'required',
            'serie' => 'required',
            'repetition' => 'required',
            'id_user_fk' => 'required',
            'name' => 'required',
            'id_user_creator_fk' => 'required',
        ], [ 
            'id_training_fk.required' => 'O campo treino é obrigatorio',
            'id_gmuscle_fk_to_ficha.required' => 'O campo grupo muscular é obrigatorio',
            'id_exercise_fk.required' => 'O campo exercício é obrigatorio',
            'serie.required' => 'O campo serie é obrigatorio',
            'repetition.required' => 'O campo repetição é obrigatorio',
        ]);

        

        $exerciseVerify = 

    }
    
}
