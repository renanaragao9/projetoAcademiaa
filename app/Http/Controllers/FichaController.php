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

    public function show_table_exercise_user($id) {
        

        $fichaUsers = ficha::join('training_division', 'fichas.id_training_fk', '=', 'training_division.id_training')
            ->with(['muscleGroup', 'user', 'creator'])
            ->select('fichas.*', 'training_division.name_training as name_training')
            ->where('fichas.id_user_fk', $id)
            ->orderBy('name_training', 'asc')
            ->orderBy('order', 'asc')
        ->get();

         // Verificar se há resultados na consulta
        if ($fichaUsers->isEmpty()) {
            return redirect()->back()->with('msg-warning', 'Aluno sem ficha.');
        }

        $userName = $fichaUsers->first();

        $numbers = ['1', '2', '3', '4' , '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'];

        return view('admin.table.tableUser', [
            'fichaUsers' => $fichaUsers, 
            'userName' => $userName,
            'numbers' => $numbers
        ]);
    }

    public function create($id) {

        $user = user::findOrFail($id);

        $trainings = training_division::orderBy('name_training', 'asc')->get();

        $numbers = ['1', '2', '3', '4' , '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'];

        $muscleGroups = muscleGroup::orderBy('name_gmuscle', 'asc')->get();

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
        
        $selectExercises = exercise::where('id_gmuscle_fk', $muscleGroupId)->orderBy('name_exercise', 'asc')->get();

        return response()->json($selectExercises);
    }


    public function store(Request $request) {

        // Array vindo do JS da view com todos os dados da ficha
        $dadosArray = $request->input('dados');

        print_r($dadosArray);

        // Integem sobre o array e salva os dados no banco de dados
        foreach ($dadosArray as $dado) {
            Ficha::create([
                'id_training_fk' => $dado['id_training_fk'],
                'order' => $dado['order'],
                'id_gmuscle_fk_to_ficha' => $dado['id_gmuscle_fk_to_ficha'],
                'id_exercise_fk' => $dado['id_exercise_fk'],
                'serie' => $dado['serie'],
                'repetition' => $dado['repetition'],
                'weight' => $dado['weight'],
                'rest' => $dado['rest'],
                'description' => $dado['description'],
                'id_user_fk' => $dado['id_user_fk'],
                'id_user_creator_fk' => $dado['id_user_creator_fk'],
            ]);
        }
        
        return redirect()->route('admin.users')->with('msg-success', 'Ficha criada com sucesso!');
    }
    
    // Redireciona as mensages de sucesso ou erro na criação da ficha.
    public function redirect_success() {
        return redirect()->back()->with('msg-success', 'Ficha criada com sucesso');
    }
    
    public function redirect_error() {
        return redirect()->back()->with('msg-error', 'Não foi possível cadastrar a ficha, verifique se não há algum campo vazio');
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
            'id_user_creator_fk' => 'required',
        ], [ 
            'id_training_fk.required' => 'O campo treino é obrigatorio',
            'id_gmuscle_fk_to_ficha.required' => 'O campo grupo muscular é obrigatorio',
            'id_exercise_fk.required' => 'O campo exercício é obrigatorio',
            'serie.required' => 'O campo serie é obrigatorio',
            'repetition.required' => 'O campo repetição é obrigatorio',
        ]);

        $fichaUpdate = $request->all();
        
        ficha::findOrFail($request->id_ficha)->update($fichaUpdate);

        return redirect()->back()->with('msg-success', 'Ficha atualizada com sucesso!');

    }

    public function destroy($id) {
        
        $fichaUser = Ficha::findOrFail($id);

        $fichaUser->delete();

        return redirect()->back()->with('msg-success', 'Exercício da ficha excluída com sucesso!');
    }

    public function destroy_all($id) {
        
        $user = User::findOrFail($id);

        // Exclui todas as fichas relacionadas ao usuário
        $user->fichas()->delete();
    
        return redirect()->back()->with('msg-success', 'Todas as fichas do aluno foram excluídas com sucesso.');
    }

    
}
