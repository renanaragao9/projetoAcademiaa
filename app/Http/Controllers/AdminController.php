<?php

namespace App\Http\Controllers;

use App\Models\assessment;
use App\Models\ficha;
use App\Models\User;
use App\Models\called;
use App\Models\statistics;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home() {

        $users = User::all();
        $fichas = ficha::all();
        $assessment = assessment::all();
        $called = called::all();

        $calleds = called::join('users as users_user', 'calleds.id_user_fk', '=', 'users_user.id')
        ->join('users as users_instrutor', 'calleds.id_instructor_fk', '=', 'users_instrutor.id')
        ->select('calleds.*', 'users_user.profile_photo_path as user_photo', 'users_instrutor.name as instrutor_name')
        ->orderBy('created_at', 'DESC')
        ->take(4)
        ->get();

        $statistics = statistics::join('users', 'statistics.id_user_fk', '=', 'users.id')
        ->join('fichas', 'statistics.id_ficha_fk', '=', 'fichas.id_ficha')
        ->join('training_division', 'fichas.id_training_fk', '=', 'training_division.id_training')
        ->select('statistics.*', 'users.name', 'training_division.name_training')
        ->orderBy('id_statistic', 'DESC')
        ->take(5)
        ->get();

        return view('admin.home', [
            'users' => $users,
            'fichas' => $fichas,
            'assessment' => $assessment,
            'called' => $called,
            'calleds' => $calleds,
            'statistics' => $statistics
        ]);
    }

    public function usersPorMes() {
        
        $usersPorMes = User::selectRaw('COUNT(*) as total_users, MONTH(created_at) as month')
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->orderByRaw('YEAR(created_at), MONTH(created_at)')
            ->get();

        return response()->json($usersPorMes);
    }
}
