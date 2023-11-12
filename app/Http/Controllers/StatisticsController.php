<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\statistics;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        ->orderBy('id_statistic', 'DESC')
        ->get();

        return view('admin.statistics', ['statistics' => $statistics]);
    }
}
