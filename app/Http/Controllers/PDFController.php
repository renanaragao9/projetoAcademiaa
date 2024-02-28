<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Options;
use Dompdf\Dompdf;
use App\Models\ficha;
use App\Models\assessment;
use App\Models\called;
use App\Models\statistics;
use App\Models\user;
use App\Models\payment;
use Carbon\Carbon;

use function Psy\debug;

// Controllers e Views Bagunçadas para se adpatar ao formato do PDF PRESTAR BEM ATENÇÃO
class PDFController extends Controller
{
    public function generatePDF($id)
    {

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        
        $dompdf = new Dompdf($options);

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
        
        $html = View('users.pdf.fichaAluno')
        ->with('studentFichas', $studentFichas)
        ->with('assessment', $assessment)
        ->with('fichaNome', $fichaNome)
        ->render();
        
        $dompdf->loadHtml($html,);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
       
        return $dompdf->stream('Ficha_'.$fichaNome->name.'.pdf');
    }

    public function generateAssessmentPDF($id)
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        
        $dompdf = new Dompdf($options);

        $student = auth()->user();
        $userId = auth()->user()->id;

        $studentAssessment = assessment::where('id_user_fk', $userId)->orderby('id_assessment', 'DESC')->first();

        $heightInMeters = $studentAssessment->height / 100;
        $weightInKg = $studentAssessment->weight;

        // Calculando o IMC
        $imc = $weightInKg / ($heightInMeters * $heightInMeters);
        $imc = round($imc, 2);
        
        $html = View('users.pdf.assessmentAluno')
        ->with('student', $student)
        ->with('studentAssessment', $studentAssessment)
        ->with('imc', $imc)
        ->render();
        
        $dompdf->loadHtml($html,);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
       
        return $dompdf->stream('Avaliacao_'.$student->name.'.pdf');
    }

    public function generateReportPayment(Request $request)
    {

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        
        $dompdf = new Dompdf($options);

        $dataReport = $request->all();
        
        if ($dataReport['period'] === 'Mês' ) {
            
            $dateMonthly = $dataReport['date_monthly'];

            list($year, $month) = explode('-', $dateMonthly);

            $startDate = Carbon::createFromDate($year, $month, 1);
            $endDate = $startDate->copy()->endOfMonth();

            $dataPayments = Payment::whereBetween('date_payment', [$startDate, $endDate])->get();
            
        } else {
            
            $dateInterval1 = $dataReport['date_interval1'];
            $dateInterval2 = $dataReport['date_interval2'];

            $startDate = Carbon::parse($dateInterval1);
            $endDate = Carbon::parse($dateInterval2);

            if ($startDate > $endDate) {
            $temp = $startDate;
            $startDate = $endDate;
            $endDate = $temp;
            }

            $dataPayments = Payment::whereBetween('date_payment', [$startDate, $endDate])->get();
        }
        
        $html = View('users.pdf.fichaAluno')
        ->with('dataPayments', $dataPayments)
        ->render();
        
        $dompdf->loadHtml($html,);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
       
        return $dompdf->stream('Relatorio_Mensalidade.pdf');
    }
}