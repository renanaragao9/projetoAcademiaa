<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\assessment;

class AssessmentController extends Controller
{

    public function show_table_assessment($id) {
        
        $userAssessments = assessment::where('id_user_fk', $id)->orderBy('created_at', 'desc')->get();

        $user = $userAssessments->first();

        // Verificar se há resultados na consulta
        if ($userAssessments->isEmpty()) {
            return redirect()->back()->with('msg-warning', 'Aluno sem avaliação.');
        }

        return view('admin.table.assessment', ['userAssessments' => $userAssessments, 'user' => $user]);
    }

    public function create($id) {

        $user = user::findOrFail($id);
        
        return view('admin.register.assessment', ['user' => $user]);
    }

    public function store(Request $request) {
        
        $request->validate([
            'id_user_fk' => 'required',
            'goal' => 'required',
            'term' => 'required',
            'height' => 'required',
            'weight' => 'required',
        ], [ 
            'goal.required' => 'O meta é obrigatorio',
            'term.required' => 'O campo prazo é obrigatorio',
            'height.required' => 'O campo altura é obrigatorio',
            'weight.required' => 'O campo peso é obrigatorio',
        ]);

        $assessment = $request->all();

        Assessment::create($assessment);

        return redirect()->back()->with('msg-success', 'Avaliação do aluno registrada com sucesso!');
        
    }

    public function edit($id) { 
        
        $assessment = assessment::findOrFail($id);

        $user = user::findOrFail($assessment->id_user_fk);

        return view('admin.editions.assessment', ['assessment' => $assessment, 'user' => $user]);
    }

    public function update(Request $request) {
        
        $request->validate([
            'id_user_fk' => 'required',
            'goal' => 'required',
            'term' => 'required',
            'height' => 'required',
            'weight' => 'required',
        ], [ 
            'goal.required' => 'O meta é obrigatorio',
            'term.required' => 'O campo prazo é obrigatorio',
            'height.required' => 'O campo altura é obrigatorio',
            'weight.required' => 'O campo peso é obrigatorio',
        ]);

        $data = $request->all();

        // Recebe o request acima e envia um comando SELECT, Where e UPDATE para atualizar o registro da tabela
        assessment::findOrFail($request->id)->update($data);

        return redirect()->back()->with('msg-success', 'Avaliação editada com sucesso!');
    }

    public function destroy($id) {
        
        $assessmentUser = assessment::findOrFail($id);

        $assessmentUser->delete();

        return redirect()->back()->with('msg-success', 'Avaliação excluída com sucesso!');
    }
}
