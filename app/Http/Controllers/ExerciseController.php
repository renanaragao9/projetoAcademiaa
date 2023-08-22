<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\exercise;
use App\Models\muscleGroup;

class ExerciseController extends Controller
{
    public function show_table_exercises() {

        $exercises = exercise::with('groupMuscle')->get();
        
        return view('admin.table.exercise', ['exercises' => $exercises]);
    }

    public function create() {

        $muscleGroups = muscleGroup::all();

        return view('admin.register.exercise', ['muscleGroups' => $muscleGroups]);
    }

    public function store(Request $request) {
        
        // Verifica se o dado está vazio
        $request->validate([
            'name_exercise' => 'required',
            'id_gmuscle_fk' => 'required'
        ] , [
            'name_exercise.required' => 'O campo nome não pode está vazio',
            'id_gmuscle_fk.required' => 'O campo grupo muscular não pode está vazio'
        ]);

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

    public function edit($id) {
        
        $exercises = exercise::findOrFail($id);

        $muscleGroups = muscleGroup::all();

        return view('admin.editions.exercise', ['exercises' => $exercises, 'muscleGroups' => $muscleGroups]);
    }

    public function update(Request $request) {
        
        // Verifica se o dado está vazio
        $request->validate([
            'name_exercise' => 'required',
            'id_gmuscle_fk' => 'required'
        ] , [
            'name_exercise.required' => 'O campo nome não pode está vazio',
            'id_gmuscle_fk.required' => 'O campo grupo muscular não pode está vazio'
        ]);
        
        $exerciseUpdate = [
            'name_exercise' => $request->name_exercise,
            'id_gmuscle_fk' => $request->id_gmuscle_fk,
        ];

        // Upload e edição de imagem
        if ($request->hasFile('image_exercise') && $request->file('image_exercise')->isValid()) {
            
            $requestImage = $request->image_exercise;
            
            $extension = $requestImage->extension();
            
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            
            $requestImage->move(public_path('img/exercise'), $imageName);
            
            $exerciseUpdate['image_exercise'] = $imageName;
        }

        Exercise::findOrFail($request->id_exercise)->update($exerciseUpdate);

        return redirect()->back()->with('msg-success', 'Exercício editado com sucesso!');
    }

    public function destroy($id) {
        
        $exercise = Exercise::findOrFail($id);
        $imageName = $exercise->image_exercise;

        // Excluir imagem da pasta pública, se existir
        if (!empty($imageName)) {
            $imagePath = public_path('img/exercise/') . $imageName;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

    // Excluir exercício do banco de dados
    $exercise->delete();

        return redirect()->back()->with('msg-success', 'Exercício excluído com sucesso!');
    }
}
