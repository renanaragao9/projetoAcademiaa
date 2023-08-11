<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\muscle_group;
use App\Models\exercise;

class GroupMuscleController extends Controller
{
    public function show_table_groupMuscles() {

        $muscleGroups = muscle_group::all();

        return view('admin.table.group_muscle', ['muscleGroups' => $muscleGroups]);
    }

    public function create() {

        return view('admin.register.group_muscle');
    }
    
    public function store(Request $request) {
        // Recupera os dados enviado pelo formulário através do POST e armazena em uma variavel
        $dados_gm = $request->input('name_gmuscle');

        // Verifica se o dado está vazio
        if (empty($dados_gm)) {
            
            return redirect()->back()->with('msg-error', 'Não foi possível cadastrar o Grupo Muscular. Verifique se algum campo não está vazio e tente novamente!!');
        }

        else {
            
            muscle_group::create($request->all());

            return redirect()->back()->with('msg-success', 'Grupo muscular cadastrado com sucesso!');
        }
    }

    public function edit($id) {
        
        $muscleGroup = muscle_group::findOrFail($id);

        return view('admin.editions.group_muscle', ['muscleGroup' => $muscleGroup]);
    }

    public function update(Request $request) {
        
        $data = $request->all();

        muscle_group::findOrFail($request->id_gmuscle)->update($data);

        return redirect()->back()->with('msg-success', 'Grupo muscular editado com sucesso!');
    }

    public function destroy($id) {

        $muscle_group = muscle_group::find($id);

        // Verificar se o grupo muscular está sendo usado em exercises
        $isUsedInExercises = exercise::where('id_gmuscle_fk', $id)->exists();
        
        if ($isUsedInExercises) {
            return redirect()->back()->with('msg-warning', 'Este grupo muscular está associado a exercícios e não pode ser excluído. Entre em contato com o administrador do sistema!');
        }

        $muscle_group->delete();

        return redirect()->back()->with('msg-success', 'Grupo muscular excluído com sucesso!');
    }
}
