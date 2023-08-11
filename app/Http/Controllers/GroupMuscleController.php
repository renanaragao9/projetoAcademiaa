<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\muscleGroup;
use App\Models\exercise;

class GroupMuscleController extends Controller
{
    public function show_table_groupMuscles() {

        $muscleGroups = muscleGroup::all();

        return view('admin.table.muscleGroup', ['muscleGroups' => $muscleGroups]);
    }

    public function create() {

        return view('admin.register.muscleGroup');
    }
    
    public function store(Request $request) {
        
        // Recupera os dados enviado pelo formulário através do POST e armazena em uma variavel
        $dados_gm = $request->input('name_gmuscle');

        // Verifica se o dado está vazio
        if (empty($dados_gm)) {
            
            return redirect()->back()->with('msg-error', 'Não foi possível cadastrar o Grupo Muscular. Verifique se algum campo não está vazio e tente novamente!');
        }

        else {
            
            muscleGroup::create($request->all());

            return redirect()->back()->with('msg-success', 'Grupo muscular cadastrado com sucesso!');
        }
    }

    public function edit($id) {
        
        $muscleGroup = muscleGroup::findOrFail($id);

        return view('admin.editions.muscleGroup', ['muscleGroup' => $muscleGroup]);
    }

    public function update(Request $request) {
        
        $data = $request->all();

        muscleGroup::findOrFail($request->id_gmuscle)->update($data);

        return redirect()->back()->with('msg-success', 'Grupo muscular editado com sucesso!');
    }

    public function destroy($id) {

        $muscle_group = muscleGroup::find($id);

        // Verificar se o grupo muscular está sendo usado em exercises
        $isUsedInExercises = exercise::where('id_gmuscle_fk', $id)->exists();
        
        if ($isUsedInExercises) {
            return redirect()->back()->with('msg-warning', 'Este grupo muscular está associado a exercícios e não pode ser excluído. Entre em contato com o administrador do sistema!');
        }

        // Excluir exercício do banco de dados
        $muscle_group->delete();

        return redirect()->back()->with('msg-success', 'Grupo muscular excluído com sucesso!');
    }
}
