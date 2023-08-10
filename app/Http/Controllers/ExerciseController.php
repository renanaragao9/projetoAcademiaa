<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\exercise;
use App\Models\muscle_group;

class ExerciseController extends Controller
{
    public function show_table_exercises() {

        $exercises = exercise::with('groupMuscle')->get();
        
        return view('admin.table.exercise', ['exercises' => $exercises]);
    }

    public function create() {

        $muscleGroups = muscle_group::all();

        return view('admin.register.exercise', ['muscleGroups' => $muscleGroups]);
    }

    public function show(Request $request) {
        
        // Recupera os dados enviado pelo formulário através do POST e armazena em uma variavel
        $nameExercise = $request->input('name_exercise');
        $nameGM = $request->input('name_gm');

        if (empty($nameExercise) && empty($nameGM)) {
            
            return redirect()->back()->with('msg-error', 'Não foi possível cadastrar o Exercício, verifique se o campo não está vazio');
        }

        else {
            
            $exerciseCreate = new exercise;

            $exerciseCreate->name_exercise = $request->name_exercise;
            $exerciseCreate->id_gmuscle_fk = $request->id_gmuscle_fk;

            // Image Upload
            if($request->hasFile('image_exercise') && $request->file('image_exercise')->isValid()) {
                
                $requestImage = $request->image_exercise;

                $extension = $requestImage->extension();

                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $requestImage->move(public_path('img/exercise'), $imageName);

                $exerciseCreate->image_exercise = $imageName;
            }

            $exerciseCreate->save();

            return redirect()->back()->with('msg-success', 'Exercício cadastrado com sucesso!');
        }
    }
}
