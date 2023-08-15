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

        $users = User::all();

        return view('admin.users', ['users' => $users]);
    }

    public function create() {
        return view('admin.register.user');
    }

    public function store(Request $request) 
    {
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

        $user = $request->all();

        User::findOrFail($request->id)->update($user);

        return redirect()->back()->with('msg-success', 'Aluno(a) editado com sucesso!');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back()->with('msg-success', 'Aluno excluído com sucesso!');
    }

}
