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
        
        // Recupera os dados enviado pelo formulário através do POST e armazena em uma variavel
        $nameExercise = $request->input('name_exercise');
        $nameGM = $request->input('id_gmuscle_fk');

        if (empty($nameExercise) || empty($nameGM)) {
            
            return redirect()->back()->with('msg-error', 'Não foi possível cadastrar o exercício, verifique se algum campo não está vazio');
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

    public function edit($id) {
        
        $exercises = exercise::findOrFail($id);

        $muscleGroups = muscleGroup::all();

        return view('admin.editions.exercise', ['exercises' => $exercises, 'muscleGroups' => $muscleGroups]);
    }

    public function update(Request $request) {
        
        // Recupera os dados enviados pelo formulário através do POST e armazena em variáveis
        $nameExercise = $request->input('name_exercise');
        $nameGM = $request->input('id_gmuscle_fk');

        if (empty($nameExercise) || empty($nameGM)) {
            return redirect()->back()->with('msg-error', 'Não foi possível cadastrar o Exercício, verifique se o campo não está vazio');
        } 
        
        else {
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
