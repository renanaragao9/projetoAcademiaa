<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\training_division;
use Illuminate\Http\Request;

class TrainingDivisionController extends Controller
{
    public function show_table_training() {

        $trainings = training_division::all();

        return view('admin.table.trainingDivision', ['trainings' => $trainings]);
    }

    public function create() {

        return view('admin.register.trainingDivision');
    }
    
    public function store(Request $request) {
        
        // Recupera os dados enviado pelo formulário através do POST e armazena em uma variavel
        $dados_tg = $request->input('name_training');

        // Verifica se o dado está vazio
        if (empty($dados_tg)) {
            
            return redirect()->back()->with('msg-error', 'Não foi possível cadastrar a Divisão de Treino. Verifique se algum campo não está vazio e tente novamente!');
        }

        else {
            
            training_division::create($request->all());

            return redirect()->back()->with('msg-success', 'Divisão de treino cadastrado com sucesso!');
        }
    }

    public function edit($id) {
        
        $training = training_division::findOrFail($id);

        return view('admin.editions.trainingDivision', ['training' => $training]);
    }

    public function update(Request $request) {
        
        $data = $request->all();

        training_division::findOrFail($request->id_training)->update($data);

        return redirect()->back()->with('msg-success', 'Divisão de treino editado com sucesso!');
    }

    public function destroy($id) {

        $training = training_division::find($id);

        // Excluir exercício do banco de dados
        $training->delete();

        return redirect()->back()->with('msg-success', 'Grupo muscular excluído com sucesso!');
    }
}
