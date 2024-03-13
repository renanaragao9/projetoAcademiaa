<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Models\Ficha;
use App\Models\MuscleGroup;
use Illuminate\Support\Str;

class ExerciseController extends Controller
{
    public function show_table_exercises() {

        // Chama os registro do banco de dados e envia para a tabela por ordem de nome crescente (A-Z)
        $exercises = Exercise::with('groupMuscle')->orderBy('name_exercise', 'ASC')->orderBy('id_gmuscle_fk', 'asc')->get();

        // Verificar se há resultados na consulta
        if ($exercises->isEmpty()) {
            return redirect()->back()->with('msg-warning', 'Não há exercício cadastrado.');
        }
        
        return view('admin.table.exercise', ['exercises' => $exercises]);
    }

    public function create() {

        $muscleGroups = MuscleGroup::orderBy('name', 'ASC')->get();

        return view('admin.register.exercise', ['muscleGroups' => $muscleGroups]);
    }

    public function store(Request $request) {
        
        // Verifica se os dados não está vazio
        $request->validate([
            'name_exercise' => 'required|unique:exercises,name_exercise',
            'id_gmuscle_fk' => 'required'
        ] , [
            'name_exercise.required' => 'O campo nome não pode está vazio',
            'name_exercise.unique' => 'Já existe um exercício com esse nome',
            'id_gmuscle_fk.required' => 'O campo grupo muscular não pode está vazio'
        ]);

        $exerciseCreate = new exercise;

        $exerciseCreate->name_exercise = $request->name_exercise;
        $exerciseCreate->id_gmuscle_fk = $request->id_gmuscle_fk;
        $exerciseName = Str::slug($request->name_exercise, '-');

        // Image Upload
        if($request->hasFile('image_exercise') && $request->file('image_exercise')->isValid()) {
            
            $requestImage = $request->image_exercise;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . $exerciseName . "." . $extension;

            $requestImage->move(public_path('img/exercise'), $imageName);

            $exerciseCreate->image_exercise = $imageName;
            
        }

        // GIF Upload
        if ($request->hasFile('gif_exercise') && $request->file('gif_exercise')->isValid()) {
            
            $requestGif = $request->gif_exercise;

            $extension = $requestGif->extension();

            // Verificar se a extensão do arquivo é .gif
            if ($extension !== 'gif') {
                return redirect()->back()->with('msg-error', 'Por favor, envie um arquivo GIF válido.');
            }

            $gifName = md5($requestGif->getClientOriginalName() . strtotime("now")) . $exerciseName . "." . $extension;

            $requestGif->move(public_path('img/exercise/gif'), $gifName);

            $exerciseCreate->gif_exercise = $gifName;
        }

        $exerciseCreate->save();

        return redirect()->back()->with('msg-success', 'Exercício cadastrado com sucesso!');
    }

    public function edit($id) {
        
        $exercises = Exercise::findOrFail($id);

        $muscleGroups = MuscleGroup::all();

        return view('admin.editions.exercise', ['exercises' => $exercises, 'muscleGroups' => $muscleGroups]);
    }

    public function update(Request $request) {
        
        // Verifica se os dados não está vazio
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

        // Recebe o ID passado pela rota e utiliza o comando Select e Where do SQL
        Exercise::findOrFail($request->id_exercise)->update($exerciseUpdate);

        return redirect()->back()->with('msg-success', 'Exercício editado com sucesso!');
    }

    public function destroy($id) {
        
         // Verifica se a divisão de treino está sendo usada em fichas
         $isUsedInFicha = ficha::where('id_exercise_fk', $id)->exists();
        
         if ($isUsedInFicha) {
             return redirect()->back()->with('msg-warning', 'Este exercício está associado a fichas e não pode ser excluído. Entre em contato com o administrador do sistema!');
         }

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
