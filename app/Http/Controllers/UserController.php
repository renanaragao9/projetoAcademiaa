<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class UserController extends Controller
{

    public function users() {

         // Chama os registro do banco de dados e envia para a tabela por ordem de nome crescente (A-Z)
        $users = User::orderBy('name', 'asc')->get();

        return view('admin.users', ['users' => $users]);
    }

    public function create() {
        return view('admin.register.user');
    }

    public function store(Request $request) 
    {

        // Verifica se os dados não está vazio
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ] , [
            'name.required' => 'O campo nome não pode está vazio',
            'email.required' => 'O campo email não pode está vazio',
        ]);

        // Validação do Email
        $email = $request->input('email');
        $existingEmail = User::where('email', $email)->first();
        if ($existingEmail) {

            // O email existe no banco de dados
            return redirect()->back()->with('msg-warning', 'Error: E-mail já cadastrado!');
        
        } else {
            // O email não existe no banco de dados
            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'sexo' => $request->sexo,
                'date' => $request->date,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            return redirect()->back()->with('msg-success', 'Aluno(a) cadastrado com sucesso!');
        }  
    }

    public function edit($id) {
        
        $user = User::findOrFail($id);

        return view('admin.editions.user', ['user' => $user]);
    }

    public function update(Request $request) {

         // Verifica se os dados não está vazio
         $request->validate([
            'name' => 'required',
            'email' => 'required',
        ] , [
            'name.required' => 'O campo nome não pode está vazio',
            'email.required' => 'O campo email não pode está vazio',
        ]);

        // Validação do Email
        $email = $request->input('email');
        $existingEmail = User::where('email', $email)->first();
        
        if ($existingEmail) {

            // O email existe no banco de dados
            return redirect()->back()->with('msg-warning', 'Error: E-mail já cadastrado!');
        
        } else {

            $user = $request->all();

            // Recebe o ID passado pela rota e utiliza o comando Select e Where do SQL
            User::findOrFail($request->id)->update($user);

            return redirect()->back()->with('msg-success', 'Aluno(a) editado com sucesso!');
        }
    }

    public function destroy($id) {

        $user = User::findOrFail($id);

        // Exclui o aluno no banco de dados
        $user->delete();

        return redirect()->back()->with('msg-success', 'Aluno excluído com sucesso!');
    }

}
