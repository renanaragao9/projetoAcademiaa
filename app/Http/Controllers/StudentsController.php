<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ficha;
use App\Models\assessment;
use App\Models\called;
use App\Models\user;


class StudentsController extends Controller
{
    public function index() {
        
        if (auth()->check()) {
            
            // Pega o id do usúario logado
            $userId = auth()->user()->id;

            // envia a relação de fichas do aluno. OBS: Esse codigo terá que ir em todos as views para o leyout funcionar bem
            $fichas = Ficha::where('id_user_fk', $userId)
            ->select('fichas.id_training_fk', 'training_division.name_training')
            ->join('training_division', 'fichas.id_training_fk', '=', 'training_division.id_training')
            ->distinct()
            ->get();

            $fullName = auth()->user()->name;
            $nameParts = explode(' ', $fullName);
            $firstName = $nameParts[0];

            return view('users.index', [
                'fichas' => $fichas,
                'firstName' => $firstName
            ]);           
        }
    }

    public function ficha($id) {

        // Pega o id do usúario logado
        $userId = auth()->user()->id;
        
        // envia a relação de fichas do aluno. OBS: Esse codigo terá que ir em todos as views para o leyout funcionar bem
        $fichas = Ficha::where('id_user_fk', $userId)
            ->select('fichas.id_training_fk', 'training_division.name_training')
            ->join('training_division', 'fichas.id_training_fk', '=', 'training_division.id_training')
            ->distinct()
            ->get();

            $studentFichas = Ficha::select(
                'fichas.*',
                'exercises.name_exercise',
                'exercises.image_exercise',
                'exercises.gif_exercise',
                'training_division.name_training',
                'users.id',
                'users.name'
            )
                ->where('fichas.id_training_fk', $id)
                ->where('fichas.id_user_fk', $userId)
                ->join('exercises', 'fichas.id_exercise_fk', '=', 'exercises.id_exercise')
                ->join('training_division', 'fichas.id_training_fk', '=', 'training_division.id_training')
                ->join('users', 'fichas.id_user_creator_fk', '=', 'users.id')
                ->get();
            

        $fichaNome = $studentFichas->first();

        $fullName = $fichaNome->name;
        $nameParts = explode(' ', $fullName);
        $firstName = $nameParts[0];
        
        $numbers = ['1', '2', '3', '4' , '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'];
 
        return view('users.ficha',[
            'studentFichas' =>  $studentFichas, 
            'fichas' => $fichas,
            'fichaNome' => $fichaNome,
            'firstName' => $firstName,
            'numbers' => $numbers
        ]);
    }

    public function assessment() {
       
        // Pega o id do usúario logado
        $userId = auth()->user()->id;

        // envia a relação de fichas do aluno. OBS: Esse codigo terá que ir em todos as views para o leyout funcionar bem
        $fichas = Ficha::where('id_user_fk', $userId)
        ->select('fichas.id_training_fk', 'training_division.name_training')
        ->join('training_division', 'fichas.id_training_fk', '=', 'training_division.id_training')
        ->distinct()
        ->get();

        $fullName = auth()->user()->name;
        $nameParts = explode(' ', $fullName);
        $firstName = $nameParts[0];

        $studentAssessments = assessment::where('id_user_fk', $userId)->orderby('id_assessment', 'DESC')->get();

        $avaliacao_1 = Assessment::where('id_user_fk', $userId)->orderBy('id_assessment', 'DESC')->first();

        $avaliacao_2 = Assessment::where('id_user_fk', $userId)->orderBy('id_assessment', 'DESC')->skip(1)->first();

        return view('users.assessment', [
            'fichas' => $fichas,
            'firstName' => $firstName,
            'studentAssessments' => $studentAssessments,
            'avaliacao_1' => $avaliacao_1,
            'avaliacao_2' => $avaliacao_2
        ]);           
    }

    public function called($id) {
        
        // Pega o id do usúario logado
        $userId = auth()->user()->id;

        // envia a relação de fichas do aluno. OBS: Esse codigo terá que ir em todos as views para o leyout funcionar bem
        $fichas = Ficha::where('id_user_fk', $userId)
        ->select('fichas.id_training_fk', 'training_division.name_training')
        ->join('training_division', 'fichas.id_training_fk', '=', 'training_division.id_training')
        ->distinct()
        ->get();

        $called = called::where('id_user_fk', $userId);

        $teachers = User::where('profile', 1)->get();

        return view('users.called', [
            'fichas' => $fichas,
            'called' => $called,
            'teachers' => $teachers
        ]);
    }

    public function profile() {
        
        // Pega o id do usúario logado
        $userId = auth()->user()->id;

        // envia a relação de fichas do aluno. OBS: Esse codigo terá que ir em todos as views para o leyout funcionar bem
        $fichas = Ficha::where('id_user_fk', $userId)
        ->select('fichas.id_training_fk', 'training_division.name_training')
        ->join('training_division', 'fichas.id_training_fk', '=', 'training_division.id_training')
        ->distinct()
        ->get();

        $userProfile = User::where('id', $userId)->first();

        return view('users.profile', [
            'fichas' => $fichas,
            'userProfile' => $userProfile
        ]);
    }
}
