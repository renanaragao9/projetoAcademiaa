<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ficha;
use App\Models\payment;
use App\Models\statistics;
use App\Models\assessment;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Carbon\Carbon;

class UserController extends Controller
{

    public function view($id) {

        $user = $user = User::findOrFail($id);

        $payments = payment::where('user_id', $id)->orderBy('id_payment', 'DESC')->get();

        $fichas = Ficha::where('id_user_fk', $id)
            ->select('fichas.id_training_fk', 'training_division.name_training')
            ->join('training_division', 'fichas.id_training_fk', '=', 'training_division.id_training')
            ->distinct()
            ->get();
        
        $statistics = statistics::join('users', 'statistics.id_user_fk', '=', 'users.id')
            ->join('fichas', 'statistics.id_ficha_fk', '=', 'fichas.id_ficha')
            ->join('training_division', 'fichas.id_training_fk', '=', 'training_division.id_training')
            ->select('statistics.*', 'users.name', 'training_division.name_training')
            ->orderBy('id_statistic', 'DESC')
            ->where('statistics.id_user_fk', $id)
            ->get();

        $assessments = assessment::where('id_user_fk', $id)->get();

        return view('admin.view.user', [
            'user' => $user,
            'payments' => $payments,
            'fichas' => $fichas,
            'statistics' => $statistics,
            'assessments' => $assessments
        ]);
    }

    public function users() {

         // Chama os registro do banco de dados e envia para a tabela por ordem de nome crescente (A-Z)
        $users = User::paginate(10);

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
            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'sexo' => $request->sexo,
                'date' => $request->date,
                'profile' => $request->profile,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            return redirect()->back()->with('msg-success', 'Aluno(a) cadastrado com sucesso!');
        }  
    }

    public function edit($id) {
        
        $user = User::findOrFail($id);

        // Formate a data do formato 'Y/m/d' para 'd/m/Y'
        $user->date = date('d/m/Y', strtotime($user->date));

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

        $userId = $request->id;
        $newEmail = $request->input('email');
        $user = User::findOrFail($userId);
    
        // Verifica se o novo email é diferente do email atual do usuário
        if ($newEmail !== $user->email) {
    
            // Verifica se o novo email já existe no banco de dados
            $existingEmail = User::where('email', $newEmail)->first();
            
            if ($existingEmail) {
                // O email já existe no banco de dados
                return redirect()->back()->with('msg-warning', 'Error: E-mail já cadastrado!');
            }
        }
        
        // Se chegou aqui, o email pode ser editado
        $user->update($request->all());
    
        return redirect()->back()->with('msg-success', 'Aluno(a) editado com sucesso!');
    }

    public function updateProfileImage(Request $request) {

        $user = auth()->user();
    
        if ($request->hasFile('profile_photo_path')) {
            $image = $request->file('profile_photo_path');
            
            // Gere um nome de arquivo aleatório usando a função uniqid() e adicione a extensão original
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            
            $image->move(public_path('img/profile_photo_path'), $imageName);
    
            // Atualize o caminho da imagem no banco de dados (você deve ter um campo 'profile_image' na tabela de usuários)
            $user->profile_photo_path = $imageName;
            $user->save();
        }
    
        return redirect()->back()->with('msg-success', 'Imagem de perfil atualizada com sucesso.');
    }

    public function destroy($id) {

        $user = User::findOrFail($id);

         // Verificar se o aluno está relacionado a fichas
        if ($user->fichas()->count() > 0) {
            return redirect()->back()->with('msg-warning', 'Não foi possível excluir o aluno, pois há uma ficha em seu nome.');
        }

        if ($user->assessments()->count() > 0) {
            return redirect()->back()->with('msg-warning', 'Não foi possível excluir o aluno, pois há uma avaliação em seu nome.');
        }

        // Exclui o aluno no banco de dados
        $user->delete();

        return redirect()->back()->with('msg-success', 'Aluno excluído com sucesso!');
    }
}
