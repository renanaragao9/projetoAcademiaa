<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ficha;
use App\Models\assessment;
use App\Models\called;
use App\Models\statistics;
use App\Models\user;
use App\Models\media;
use App\Models\payment;
use App\Models\monthlyType;
use Illuminate\Support\Facades\Redirect;


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

            $mediaBanners = media::where('type_media', 1)->orderBy('id_media', 'DESC')->get();
            $mediaPost = media::where('type_media', 2)->orderBy('id_media', 'DESC')->first();

            $fullName = auth()->user()->name;
            $nameParts = explode(' ', $fullName);
            $firstName = $nameParts[0];

            $payment = payment::with('monthly', 'userCreator')->where('user_id', $userId)->orderBy('id_payment', 'DESC')->first();
            
            if( $payment != null)  {
                $dataAtual = strtotime(date('Y-m-d'));
                $dataVencimento = strtotime($payment->date_due_payment);
                $diferencaSegundos = $dataVencimento - $dataAtual;
                $diasRestantes = floor($diferencaSegundos / (60 * 60 * 24));

                if ($diasRestantes == 0) {
                    $msg_warning = 'Hoje é o último dia do plano!';
                
                }elseif($diasRestantes == 1) {
                    $msg_warning = 'Falta 1 dia para o vencimento do plano!';
                
                } else {
                    $msg_warning = ''; 
                }
            }

            else {
                $msg_warning = ''; 
            }

            return view('users.index', [
                'fichas' => $fichas,
                'firstName' => $firstName,
                'mediaBanners' => $mediaBanners,
                'mediaPost' => $mediaPost,
                'msg_warning' => $msg_warning
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
                ->orderByRaw('CAST(fichas.order AS SIGNED) ASC')
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

        if (count($studentAssessments) == 0) {
            return Redirect::route('students.start')->with('msg-error', 'Você ainda não possui avaliação');
        }

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

        $calleds = called::where('id_user_fk', $userId)->orderby('id_called', 'DESC')->get();

        $teachers = User::where('profile', 1)->orWhere('profile', 2)->get();

        return view('users.called', [
            'fichas' => $fichas,
            'calleds' => $calleds,
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

        $statistics = statistics::where('id_user_fk', $userId)->get();

        $assessments = assessment::where('id_user_fk', $userId)->get();

        $userProfile = User::where('id', $userId)->first();

        $payments = payment::with('monthly')->where('user_id', $userId)->orderBy('id_payment', 'DESC')->limit(3)->get();  

        return view('users.profile', [
            'fichas' => $fichas,
            'userProfile' => $userProfile,
            'statistics' => $statistics,
            'assessments' => $assessments,
            'payments' => $payments
        ]);
    }

    public function payments() {
        
        $userId = auth()->user()->id;

        // envia a relação de fichas do aluno. OBS: Esse codigo terá que ir em todos as views para o leyout funcionar bem
        $fichas = Ficha::where('id_user_fk', $userId)
        ->select('fichas.id_training_fk', 'training_division.name_training')
        ->join('training_division', 'fichas.id_training_fk', '=', 'training_division.id_training')
        ->distinct()
        ->get();

        $payments = payment::with('monthly', 'userCreator')->where('user_id', $userId)->orderBy('id_payment', 'DESC')->get();

        if (count($payments) == 0) {
            return Redirect::route('students.start')->with('msg-error', 'Pagamentos não registrado');
        }

        return view('users.payment', ['payments' => $payments, 'fichas' => $fichas]);
    }

    public function fichaPDF($id) {

        $userId = auth()->user()->id;

        $studentFichas = Ficha::select(
            'fichas.*',
            'exercises.name_exercise',
            'exercises.image_exercise',
            'exercises.gif_exercise',
            'training_division.name_training',
            'users.id',
            'users.name',
            'users.date'
        )
            ->where('fichas.id_training_fk', $id)
            ->where('fichas.id_user_fk', $userId)
            ->join('exercises', 'fichas.id_exercise_fk', '=', 'exercises.id_exercise')
            ->join('training_division', 'fichas.id_training_fk', '=', 'training_division.id_training')
            ->join('users', 'fichas.id_user_fk', '=', 'users.id')
            ->orderBy('order', 'ASC')
            ->get();

            

        $assessment = assessment::where('id_user_fk', $userId)->orderBy('id_assessment', 'desc')->first(); 

        $fichaNome = $studentFichas->first();

        return view('users.pdf.fichaAluno', [
            'studentFichas' => $studentFichas,
            'assessment' => $assessment,
            'fichaNome' => $fichaNome
        ]);
    }

    public function assessmentPDF($id) {
        
        // Pega o id do usúario logado
        $userId = auth()->user()->id;

        $student = auth()->user();

        $studentAssessment = assessment::where('id_user_fk', $userId)->orderby('id_assessment', 'DESC')->first();

        $heightInMeters = $studentAssessment->height / 100;
        $weightInKg = $studentAssessment->weight;

        // Calculando o IMC
        $imc = $weightInKg / ($heightInMeters * $heightInMeters);
        $imc = round($imc, 2);
        

        return view('users.pdf.assessmentAluno', [
            'student' => $student,
            'studentAssessment' => $studentAssessment,
            'imc' => $imc
        ]);           
    }

    public function posts() {

        $userId = auth()->user()->id;

        // envia a relação de fichas do aluno. OBS: Esse codigo terá que ir em todos as views para o leyout funcionar bem
        $fichas = Ficha::where('id_user_fk', $userId)
        ->select('fichas.id_training_fk', 'training_division.name_training')
        ->join('training_division', 'fichas.id_training_fk', '=', 'training_division.id_training')
        ->distinct()
        ->get();

        $posts = Media::with('users')->where('type_media', 2)->orderBy('id_media', 'DESC')->get();

        return view('users.post', ['posts' => $posts, 'fichas' => $fichas]);
    }
}
