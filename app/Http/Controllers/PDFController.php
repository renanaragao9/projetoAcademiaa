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
use App\Models\expense;
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
        //dd($fichaNome);
        
        $html = View('users.pdf.fichaAluno')
        ->with('studentFichas', $studentFichas)
        ->with('assessment', $assessment)
        ->with('fichaNome', $fichaNome)
        ->render();
        
        $dompdf->loadHtml($html,);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
       
        return $dompdf->stream('Ficha_'.$fichaNome->name. '_' . $fichaNome->name_training.'.pdf');
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

            if(empty($dataReport['date_monthly'])) {
                return redirect()->back()->with('msg-error', 'Selecione uma data válida.');
            }
            
            $dateMonthly = $dataReport['date_monthly'];

            list($year, $month) = explode('-', $dateMonthly);

            $startDate = Carbon::createFromDate($year, $month, 1);
            $endDate = $startDate->copy()->endOfMonth();

            if($dataReport['form_payment'] == 'all') {
               
                $dataPayments = Payment::whereBetween('date_payment', [$startDate, $endDate])->get();
            }
            else {
                
                $dataPayments = Payment::whereBetween('date_payment', [$startDate, $endDate])->where('form_payment', $dataReport['form_payment'])->get();
            }
            
        } else {

            if(empty($dataReport['date_interval1']) || empty($dataReport['date_interval2'])) {
                return redirect()->back()->with('msg-error', 'Selecione uma data válida.');
            }
            
            $dateInterval1 = $dataReport['date_interval1'];
            $dateInterval2 = $dataReport['date_interval2'];

            $startDate = Carbon::parse($dateInterval1);
            $endDate = Carbon::parse($dateInterval2);

            if ($startDate > $endDate) {
            $temp = $startDate;
            $startDate = $endDate;
            $endDate = $temp;
            }

            if($dataReport['form_payment'] == 'all') {
               
                $dataPayments = Payment::whereBetween('date_payment', [$startDate, $endDate])->get();
            }
            else {
                
                $dataPayments = Payment::whereBetween('date_payment', [$startDate, $endDate])->where('form_payment', $dataReport['form_payment'])->get();
            }
        }

        $html = View('admin.pdf.report_payment')
        ->with('dataPayments', $dataPayments)
        ->with('dataReport', $dataReport)
        ->render();
        
        $dompdf->loadHtml($html,);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="arquivo.pdf"');
        echo $dompdf->output();
       
        return $dompdf->stream('Relatorio_Mensalidade.pdf');
    }

    public function generateReportUser(Request $request)
    {

        $options = new Options();
        
        $options->set('isHtml5ParserEnabled', true);
        
        $dompdf = new Dompdf($options);

        $dataReport = $request->all();

        //dd($dataReport);
        
        if ($dataReport['period'] === 'Mês' ) {

            if(empty($dataReport['date_monthly'])) {
                return redirect()->back()->with('msg-error', 'Selecione uma data válida.');
            }
            
            $dateMonthly = $dataReport['date_monthly'];

            list($year, $month) = explode('-', $dateMonthly);

            $startDate = Carbon::createFromDate($year, $month, 1);
            $endDate = $startDate->copy()->endOfMonth();
            
            if($dataReport['situacao'] == 'Em Aberto') {
                $dataUsers = user::whereBetween('created_at', [$startDate, $endDate])->where('due_date', '>=', Carbon::now()->endOfMonth())->get();
            }
            elseif($dataReport['situacao'] == 'Atrasado') {
                $dataUsers = user::whereBetween('created_at', [$startDate, $endDate])->where('due_date', '<', Carbon::now())->get();
            }
            elseif($dataReport['situacao'] == 'semPgto') {
                $dataUsers = user::whereBetween('created_at', [$startDate, $endDate])->whereNull('due_date')->get();
            } else {
                $dataUsers = user::whereBetween('created_at', [$startDate, $endDate])->get();
            }

        } else {
            
            if(empty($dataReport['date_interval1']) || empty($dataReport['date_interval2'])) {
                return redirect()->back()->with('msg-error', 'Selecione uma data válida.');
            }

            $dateInterval1 = $dataReport['date_interval1'];
            $dateInterval2 = $dataReport['date_interval2'];

            $startDate = Carbon::parse($dateInterval1);
            $endDate = Carbon::parse($dateInterval2);

            if ($startDate > $endDate) {
            $temp = $startDate;
            $startDate = $endDate;
            $endDate = $temp;
            }
  
            $dataUsers = user::whereBetween('created_at', [$startDate, $endDate])->get();

            if($dataReport['situacao'] == 'Em Aberto') {
                $dataUsers = user::whereBetween('created_at', [$startDate, $endDate])->where('due_date', '>=', Carbon::now()->endOfMonth())->get();
            }
            elseif($dataReport['situacao'] == 'Atrasado') {
                $dataUsers = user::whereBetween('created_at', [$startDate, $endDate])->where('due_date', '<', Carbon::now())->get();
            }
            elseif($dataReport['situacao'] == 'semPgto') {
                $dataUsers = user::whereBetween('created_at', [$startDate, $endDate])->whereNull('due_date')->get();
            } else {
                $dataUsers = user::whereBetween('created_at', [$startDate, $endDate])->get();
            }
        }

        $html = View('admin.pdf.report_user ')
        ->with('dataUsers', $dataUsers)
        ->with('dataReport', $dataReport)
        ->render();
        
        $dompdf->loadHtml($html,);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="arquivo.pdf"');
        echo $dompdf->output();
       
        return $dompdf->stream('Relatorio_Mensalidade.pdf');
    }

    public function generateReceiptPDF($id) {
        
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        
        $dompdf = new Dompdf($options);

        $studentPayment = payment::with('monthly', 'user', 'userCreator')->where('id_payment', $id)->first();
        
        $html = View('users.pdf.receiptAluno')
        ->with('studentPayment', $studentPayment)
        ->render();
        
        $dompdf->loadHtml($html,);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
       
        return $dompdf->stream('Recibo_'.$studentPayment->user->name.'.pdf');
    }

    public function generateReportExpense(Request $request)
    {

        $options = new Options();
        
        $options->set('isHtml5ParserEnabled', true);
        
        $dompdf = new Dompdf($options);

        $dataReport = $request->all();
        
        if ($dataReport['period'] === 'Mês' ) {
            
            if(empty($dataReport['date_monthly'])) {
                return redirect()->back()->with('msg-error', 'Selecione uma data válida.');
            }

            $dateMonthly = $dataReport['date_monthly'];

            list($year, $month) = explode('-', $dateMonthly);

            $startDate = Carbon::createFromDate($year, $month, 1);
            $endDate = $startDate->copy()->endOfMonth();

            if($dataReport['form_expense'] == 'all' || $dataReport['form_expense'] == 'Todos') {
               
                $dataExpenses = expense::whereBetween('data_expense', [$startDate, $endDate])->get();
                $dataPayments = Payment::whereBetween('date_payment', [$startDate, $endDate])->get();
            }
            elseif($dataReport['form_expense'] == 'Entrada') {
                
                $dataExpenses = expense::whereBetween('data_expense', [$startDate, $endDate])->where('tipo_expense', 1)->get();
                $dataPayments = Payment::whereBetween('date_payment', [$startDate, $endDate])->get();
            }
            else {
                $dataExpenses = expense::whereBetween('data_expense', [$startDate, $endDate])->where('tipo_expense', 2)->get();
                $dataPayments = Payment::whereBetween('date_payment', [$startDate, $endDate])->get();
            }
            
        } else {

            if(empty($dataReport['date_interval1']) || empty($dataReport['date_interval2'])) {
                return redirect()->back()->with('msg-error', 'Selecione uma data válida.');
            }
            
            $dateInterval1 = $dataReport['date_interval1'];
            $dateInterval2 = $dataReport['date_interval2'];

            $startDate = Carbon::parse($dateInterval1);
            $endDate = Carbon::parse($dateInterval2);

            if ($startDate > $endDate) {
            $temp = $startDate;
            $startDate = $endDate;
            $endDate = $temp;
            }

            if($dataReport['form_expense'] == 'all' || $dataReport['form_expense'] == 'Todos') {

                $dataExpenses = expense::whereBetween('data_expense', [$startDate, $endDate])->get();
                $dataPayments = Payment::whereBetween('date_payment', [$startDate, $endDate])->get();     
            }
            
            elseif($dataReport['form_expense'] == 'Entrada') {
                
                $dataExpenses = expense::whereBetween('data_expense', [$startDate, $endDate])->where('tipo_expense', 1)->get();
                $dataPayments = Payment::whereBetween('date_payment', [$startDate, $endDate])->get();
            }
            else {
                $dataExpenses = expense::whereBetween('data_expense', [$startDate, $endDate])->where('tipo_expense', 2)->get();
                $dataPayments = Payment::whereBetween('date_payment', [$startDate, $endDate])->get();
            }
        }

        $totalMensalidades = 0;
        $totalEntrada = 0;
        $totalSaida = 0;
        $totalGeral = 0;

        foreach ($dataPayments as $payment) {
            $totalMensalidades += $payment->value_payment; 
        }

        foreach ($dataExpenses as $expense) {
            
            if ($expense->tipo_expense == 1) {
               
                $totalEntrada += $expense->value_expense;
            
            } elseif ($expense->tipo_expense == 2) {
                
                $totalSaida += $expense->value_expense;
            }
        }

        $totalGeral = $totalEntrada - $totalSaida;

        if($dataReport['payments'] != 'Nao') {
            $totalGeral += $totalMensalidades;
        }

        $dadoArray = array(
            'totalMensalidades' => $totalMensalidades,
            'totalEntrada' => $totalEntrada,
            'totalSaida' => $totalSaida,
            'totalGeral' => $totalGeral
        );
        
        $html = View('admin.pdf.report_expense')
        ->with('dadoArray', $dadoArray)
        ->with('dataReport', $dataReport)
        ->with('dataExpenses', $dataExpenses)
        ->with('dataPayments', $dataPayments)
        ->render();
        
        $dompdf->loadHtml($html,);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="arquivo.pdf"');
        echo $dompdf->output();
       
        return $dompdf->stream('Relatorio_Mensalidade.pdf');
    }
}