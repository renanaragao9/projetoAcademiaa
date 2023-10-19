<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\called;

class CalledController extends Controller
{
    public function called() {
       
        return view('admin.called');
    }

    public function store(Request $request) {
        // Verifica se os dados não está vazio
        $request->validate([
            'user_name' => 'required',
            'id_instructor_fk' => 'required',
            'title' => 'required',
            'subject' => 'required'
        ] , [
            'user_name.required' => 'O campo nome não pode está vazio',
            'id_instructor_fk.required' => 'O campo professor não pode está vazio',
            'title.required' => 'O campo titulo não pode esta vazio',
            'subject.required' => 'O campo descrição não pode esta vazio'
        ]);

        called::create($request->all());

        return redirect()->back()->with('msg-success', 'Chamado cadastrado com sucesso!');
    }

}
