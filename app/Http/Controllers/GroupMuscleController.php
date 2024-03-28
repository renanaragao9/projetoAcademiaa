<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\muscleGroup;
use App\Models\exercise;

class GroupMuscleController extends Controller
{

    public function show_table_groupMuscles() {

        // Chama os registro do banco de dados e envia para a tabela por ordem de nome crescente (A-Z)
        $muscleGroups = muscleGroup::orderBy('name_gmuscle', 'asc')->get();

        // Verificar se há resultados na consulta
        if ($muscleGroups->isEmpty()) {
            return redirect()->back()->with('msg-warning', 'Não há grupo muscular cadastrado.');
        }

        return view('admin.table.muscleGroup', ['muscleGroups' => $muscleGroups]);
    }

    public function create() {

        return view('admin.register.muscleGroup');
    }
    
    public function store(Request $request) {

        // Verifica se os dados não está vazio
        $request->validate([
            'name_gmuscle' => 'required'
        ] , [
            'name_gmuscle.required' => 'O campo nome não pode está vazio'
        ]);
        
        muscleGroup::create($request->all());

        return redirect()->back()->with('msg-success', 'Grupo muscular cadastrado com sucesso!');
    }

    public function edit($id) {

        // Recebe o ID passado pela rota e utiliza o comando Select e Where do SQL
        $muscleGroup = muscleGroup::findOrFail($id);

        return view('admin.editions.muscleGroup', ['muscleGroup' => $muscleGroup]);
    }

    public function update(Request $request) {

        // Verifica se os dados não está vazio
        $request->validate([
            'name_gmuscle' => 'required'
        ] , [
            'name_gmuscle.required' => 'O campo nome não pode está vazio'
        ]);
        
        $data = $request->all();

        // Recebe o request acima e envia um comando SELECT, Where e UPDATE para atualizar o registro da tabela
        muscleGroup::findOrFail($request->id_gmuscle)->update($data);

        return redirect()->back()->with('msg-success', 'Grupo muscular editado com sucesso!');
    }

    public function destroy($id) {

        $muscle_group = muscleGroup::find($id);

        // Verificar se o grupo muscular está sendo usado em exercises
        $isUsedInExercises = exercise::where('id_gmuscle_fk', $id)->exists();
        
        if ($isUsedInExercises) {
            return redirect()->back()->with('msg-warning', 'Este grupo muscular está associado a exercícios e não pode ser excluído.');
        }

        // Excluir exercício do banco de dados
        $muscle_group->delete();

        return redirect()->back()->with('msg-success', 'Grupo muscular excluído com sucesso!');
    }
}
