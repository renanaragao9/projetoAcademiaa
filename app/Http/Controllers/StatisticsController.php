<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\statistics;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\assessment;
use App\Models\ficha;
use App\Models\user;
use App\Models\called;
use App\Models\payment;
use App\Models\monthlyType;
use App\Models\expense;

use function Psy\debug;

class StatisticsController extends Controller
{
    public function store(Request $request) {
        
        // Verifica se os dados não está vazio
        $request->validate([
            'id_user_fk' => 'required',
            'id_ficha_fk' => 'required'
        ] , [
            'id_user_fk.required' => 'O campo id usuario não pode está vazio',
            'id_ficha_fk.required' => 'O campo id ficha não pode está vazio'
        ]);

       // Verifique se o usuário já finalizou o treino no mesmo dia
        $user_id = $request->input('id_user_fk');
        $ficha_id = $request->input('id_ficha_fk');
        $today = Carbon::now(); // Obtenha a data atual

        $existingStatistics = statistics::where('id_user_fk', $user_id)
            ->where('id_ficha_fk', $ficha_id)
            ->whereDate('created_at', $today->toDateString()) // Filtra pelo dia atual
            ->first();

        if ($existingStatistics) {
            return redirect()->back()->with('msg-error', 'Treino já finalizado.');
        }

        statistics::create($request->all());

        return redirect()->route('students.start')->with('msg-success', 'Treino finalizado com sucesso!');
    }

    public function statistic() {

        $statistics = statistics::join('users', 'statistics.id_user_fk', '=', 'users.id')
        ->join('fichas', 'statistics.id_ficha_fk', '=', 'fichas.id_ficha')
        ->join('training_division', 'fichas.id_training_fk', '=', 'training_division.id_training')
        ->select('statistics.*', 'users.name', 'training_division.name_training')
        ->take(15)
        ->orderBy('id_statistic', 'DESC')
        ->get();
        
        $monthlyStats = [];
        
        foreach ($statistics as $statistic) {
            $date = $statistic->created_at; 
            $month = date('Y-m', strtotime($date));
            
            if (!isset($monthlyStats[$month][$statistic->id_user_fk])) {
                $monthlyStats[$month][$statistic->id_user_fk] = [
                    'user_name' => $statistic->name,
                    'total_fichas' => 0 
                ];
            }
            
            $monthlyStats[$month][$statistic->id_user_fk]['total_fichas']++;
        }

        $studentsTotals = [];
       
        foreach ($monthlyStats as $month => $users) {
            foreach ($users as $userId => $userData) {
                $studentsTotals[$userData['user_name']] = $userData['total_fichas'];
            }
        }
       
        arsort($studentsTotals);

        $topStudentsTotals = array_slice($studentsTotals, 0, 15, true);


        // Grafico Alunos
        $users = user::all();
        $total_alunos = count($users);
        $total_masculino = 0;
        $total_feminino = 0;
        $total_outros = 0;
        $idade_10_17 = 0;
        $idade_18_28 = 0;
        $idade_29_40 = 0;
        $idade_41_mais = 0;

        foreach ($users as $user) {
            switch ($user->sexo) {
                case 'Masculino':
                    $total_masculino++;
                    break;
                case 'Feminino':
                    $total_feminino++;
                    break;
                case 'Outros':
                    $total_outros++;
                    break;
            }
        }

        foreach ($users as $user) {
            $data_nascimento = $user->date;
            $idade = date_diff(date_create($data_nascimento), date_create('now'))->y;

            // Atualiza o total de idade para a faixa etária correspondente
            if ($idade >= 10 && $idade <= 17) {
                $idade_10_17++;
            } elseif ($idade >= 18 && $idade <= 28) {
                $idade_18_28++;
            } elseif ($idade >= 29 && $idade <= 40) {
                $idade_29_40++;
            } else {
                $idade_41_mais++;
            }
        }
        
        $user_dados = [
            ['total_alunos' => $total_alunos],
            ['sexo' => 'Masculino', 'total' => $total_masculino],
            ['sexo' => 'Feminino', 'total' => $total_feminino],
            ['sexo' => 'Outros', 'total' => $total_outros],
            ['faixa_etaria' => '10-17', 'total' => $idade_10_17],
            ['faixa_etaria' => '18-28', 'total' => $idade_18_28],
            ['faixa_etaria' => '29-40', 'total' => $idade_29_40],
            ['faixa_etaria' => '41+', 'total' => $idade_41_mais],
        ];

        // Mensalidades
        $contagemPayments = payment::select('monthly_type_id', \DB::raw('count(*) as total'))
        ->with('monthly')
        ->groupBy('monthly_type_id')
        ->orderBy('monthly_type_id', 'ASC')
        ->get();

        // Fichas criadas
        $contagemUsuarios = ficha::select('id_user_creator_fk', \DB::raw('count(*) as total'))
        ->with('fichasCreator')
        ->groupBy('id_user_creator_fk')
        ->get();

        $contagemTreinamentos = Ficha::select('id_training_fk', \DB::raw('count(*) as total'))
        ->with('trainingDivision')
        ->groupBy('id_training_fk')
        ->get();

        // Avaliações criadas
        $contagemAvaliacoes = assessment::select('goal', \DB::raw('count(*) as total'))
        ->groupBy('goal')
        ->get();

        $expenses = expense::all();
        
        $entrada = 0;
        $saida = 0;
        $total = 0;

        foreach($expenses as $expense) {
            
            if($expense->tipo_expense == 1) {
                $entrada += $expense->value_expense;
            }
            
            elseif($expense->tipo_expense == 2) {
                $saida += $expense->value_expense;
            }

            $total = $entrada - $saida;
        }
        
        return view('admin.statistics', [
            'statistics' => $statistics,
            'topStudentsTotals' => $topStudentsTotals,
            'user_dados' => $user_dados,
            'contagemPayments' => $contagemPayments,
            'contagemUsuarios' => $contagemUsuarios,
            'contagemTreinamentos' => $contagemTreinamentos,
            'contagemAvaliacoes' => $contagemAvaliacoes,
            'entrada' => $entrada,
            'saida' => $saida,
            'total' => $total
        ]);
    }

    public function usersPorMes() {
        
        $usersPorMes = user::selectRaw('COUNT(*) as total_users, MONTH(created_at) as month')
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->orderByRaw('YEAR(created_at), MONTH(created_at)')
            ->get();

        return response()->json($usersPorMes);
    }

    public function fichasPorMes() {
        $fichasPorMes = ficha::selectRaw('COUNT(*) as total_fichas, MONTH(created_at) as month')
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->orderByRaw('YEAR(created_at), MONTH(created_at)')
            ->get();

        return response()->json($fichasPorMes);
    }

    public function assessmentPorMes() {
        $assessmentPorMes = assessment::selectRaw('COUNT(*) as total_assessment, MONTH(created_at) as month')
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->orderByRaw('YEAR(created_at), MONTH(created_at)')
            ->get();

        return response()->json($assessmentPorMes);
    }

    public function calledPorMes() {
        $calledPorMes = called::selectRaw('COUNT(*) as total_called, MONTH(created_at) as month')
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->orderByRaw('YEAR(created_at), MONTH(created_at)')
            ->get();

        return response()->json($calledPorMes);
    }

    public function paymentPorMes() {
        $paymentPorMes = Payment::selectRaw('SUM(value_payment) as total_payment, MONTH(date_payment) as month')
        ->groupByRaw('YEAR(date_payment), MONTH(date_payment)')
        ->orderByRaw('YEAR(date_payment), MONTH(date_payment)')
        ->get();

        return response()->json($paymentPorMes);
    }

    public function expensePorMes() {
        
        $expensePorMes = Expense::selectRaw('MONTH(data_expense) as month, 
        SUM(CASE WHEN tipo_expense = 1 THEN value_expense ELSE 0 END) as total_entradas,
        SUM(CASE WHEN tipo_expense = 2 THEN value_expense ELSE 0 END) as total_saidas')
        ->groupByRaw('YEAR(data_expense), MONTH(data_expense)')
        ->orderByRaw('YEAR(data_expense), MONTH(data_expense)')
        ->get();

        $paymentPorMes = Payment::selectRaw('SUM(value_payment) as total_payment, MONTH(date_payment) as month')
        ->groupByRaw('YEAR(date_payment), MONTH(date_payment)')
        ->orderByRaw('YEAR(date_payment), MONTH(date_payment)')
        ->get();

        foreach ($expensePorMes as $index => $expense) {
        
            $matchingPayment = $paymentPorMes->where('month', $expense->month)->first();

            if ($matchingPayment) {
            
                $expense->total_entradas = $expense->total_entradas + $matchingPayment->total_payment;
            $expensePorMes[$index]->despesa_total = $expense->total_entradas - $expense->total_saidas ;

            } else {

                $expensePorMes[$index]->despesa_total = $expense->total_entradas - $expense->total_saidas;
            }
        }

        return response()->json($expensePorMes);

    }
}
