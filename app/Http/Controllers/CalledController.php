<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\called;

class CalledController extends Controller
{
    public function called() {

        $calleds = called::join('users as users_user', 'calleds.id_user_fk', '=', 'users_user.id')
        ->join('users as users_instrutor', 'calleds.id_instructor_fk', '=', 'users_instrutor.id')
        ->select('calleds.*', 'users_user.profile_photo_path as user_photo', 'users_instrutor.name as instrutor_name')
        ->orderBy('created_at', 'DESC')
        ->get();

        return view('admin.called', ['calleds' => $calleds]);
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

        return redirect()->back()->with('msg-success', 'Chamado registrado com sucesso!');
    }

    public function createCount(Request $request) {
       
        $called = new Called();
    
        $called->user_name = $request->input('nome');
        $called->urgency = 'Urgente';
        $called->title = 'Novo Acesso';
        $called->subject = 'Solicitante '.$request->input('nome').' com email '.$request->input('email').' solicita acesso ao aplicativo';
        $saved = $called->save();
    
        if ($saved) {
            
            return redirect()->back()->with('msg-success', 'Solicitação criada com sucesso.');
        
        } else {
            
            return redirect()->back()->with('msg-error', 'Erro ao a solicitação. Tente novamente mais tarde');
        }
    }
   
    public function destroy($id) {
        
        $called = called::findOrFail($id);

        $called->delete();

        return redirect()->back()->with('msg-success', 'Chamado resolvido com sucesso!');
    }

}
