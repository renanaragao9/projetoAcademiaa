<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TrainingDivision;
use App\Models\ficha;
use Illuminate\Http\Request;

class TrainingDivisionController extends Controller
{
    public function index() {

        // Chama os registro do banco de dados e envia para a tabela por ordem de nome crescente (A-Z)
        $trainings = TrainingDivision::orderBy('name', 'asc')->get();

        // Verificar se há resultados na consulta
        if ($trainings->isEmpty()) {
            return redirect()->back()->with('msg-warning', 'Atenção. Não há divisão de treino cadastrado.');
        }

        return view('admin.table.trainingDivision', ['trainings' => $trainings]);
    }

    public function create() {

        return view('admin.register.trainingDivision');
    }
    
    public function store(Request $request) {
        
        // Verifica se os dados não está vazio
        $request->validate([
            'name' => 'required'
        ] , [
            'name.required' => 'O campo nome não pode está vazio'
        ]);
            
        TrainingDivision::create($request->all());

        return redirect()->back()->with('msg-success', 'Divisão de treino cadastrada com sucesso!');
        
    }

    public function edit($id) {

        // Recebe o ID passado pela rota e utiliza o comando Select e Where do SQL
        $training = TrainingDivision::findOrFail($id);

        return view('admin.editions.trainingDivision', ['training' => $training]);
    }

    public function update(Request $request) {

         // Verifica se os dados não está vazio
         $request->validate([
            'name' => 'required'
        ] , [
            'name.required' => 'O campo nome não pode está vazio'
        ]);
        
        $dataTraining = $request->all();

        // Recebe o request acima e envia um comando SELECT, Where e UPDATE para atualizar o registro da tabela
        TrainingDivision::findOrFail($request->id_training)->update($dataTraining);

        return redirect()->back()->with('msg-success', 'Divisão de treino editado com sucesso!');
    }

    public function destroy($id) {

        // Verifica se a divisão de treino está sendo usada em fichas
        $isUsedInFicha = ficha::where('id_training_fk', $id)->exists();
        
        if ($isUsedInFicha) {
            return redirect()->back()->with('msg-warning', 'Esta divisão de treino está associado a fichas e não pode ser excluído. Entre em contato com o administrador do sistema!');
        }

        $training = TrainingDivision::find($id);

        // Excluir a divisão de teinor no banco de dados
        $training->delete();

        return redirect()->back()->with('msg-success', 'Divisão de Treino excluído com sucesso!');
    }
}
