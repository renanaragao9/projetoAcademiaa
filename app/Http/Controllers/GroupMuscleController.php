<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MuscleGroup;
use App\Models\exercise;

class GroupMuscleController extends Controller
{

    public function index() {

        // Chama os registro do banco de dados e envia para a tabela por ordem de nome crescente (A-Z)
        $muscleGroups = MuscleGroup::orderBy('name', 'asc')->get();

        // Verificar se há resultados na consulta
        if ($muscleGroups->isEmpty()) {
            return redirect()->back()->with('msg-warning', 'Atenção, Não há grupo muscular cadastrado.');
        }

        return view('admin.table.muscleGroup', ['muscleGroups' => $muscleGroups]);
    }

    public function create() {

        return view('admin.register.muscleGroup');
    }
    
    public function store(Request $request) {

        // Verifica se os dados não está vazio
        $request->validate([
            'name' => 'required'
        ] , [
            'name' => 'Atenção. O campo nome não pode está vazio'
        ]);
        
        MuscleGroup::create($request->all());

        return redirect()->back()->with('msg-success', 'Grupo muscular cadastrado com sucesso!');
    }

    public function edit($id) {

        // Recebe o ID passado pela rota e utiliza o comando Select e Where do SQL
        $muscleGroup = MuscleGroup::findOrFail($id);

        return view('admin.editions.muscleGroup', ['muscleGroup' => $muscleGroup]);
    }

    public function update(Request $request) {

        // Verifica se os dados não está vazio
        $request->validate([
            'name' => 'required'
        ] , [
            'name.required' => 'Atenção. O campo nome não pode está vazio'
        ]);
        
        $dataGMuslce = $request->all();

        // Recebe o request acima e envia um comando SELECT, Where e UPDATE para atualizar o registro da tabela
        MuscleGroup::findOrFail($request->id_gmuscle)->update($dataGMuslce);

        return redirect()->back()->with('msg-success', 'Grupo muscular editado com sucesso!');
    }

    public function destroy($id) {

        $muscle_group = MuscleGroup::find($id);

        // Verificar se o grupo muscular está sendo usado em exercises
        $isUsedInExercises = exercise::where('id_gmuscle_fk', $id)->exists();
        
        if ($isUsedInExercises) {
            return redirect()->back()->with('msg-warning', 'Atenção. Este grupo muscular está associado a exercícios e não pode ser excluído. Entre em contato com o administrador do sistema!');
        }

        // Excluir exercício do banco de dados
        $muscle_group->delete();

        return redirect()->back()->with('msg-success', 'Grupo muscular excluído com sucesso!');
    }
}
