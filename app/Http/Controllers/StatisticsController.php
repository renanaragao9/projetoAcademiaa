<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\statistics;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\assessment;
use App\Models\ficha;
use App\Models\User;
use App\Models\called;

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

        return view('admin.statistics', [
            'statistics' => $statistics,
            'topStudentsTotals' => $topStudentsTotals
        ]);
    }

    public function usersPorMes() {
        
        $usersPorMes = User::selectRaw('COUNT(*) as total_users, MONTH(created_at) as month')
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
}
