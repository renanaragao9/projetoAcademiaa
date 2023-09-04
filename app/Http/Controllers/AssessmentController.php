<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\assessment;

class AssessmentController extends Controller
{
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

        return redirect()->back()->with('msg-success', 'Avaliação do aluno cadastrada com sucesso!');
        
    }
}
