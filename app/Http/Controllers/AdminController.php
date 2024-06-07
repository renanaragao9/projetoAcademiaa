<?php

namespace App\Http\Controllers;

use App\Models\assessment;
use App\Models\ficha;
use App\Models\User;
use App\Models\called;
use App\Models\statistics;
use App\Models\media;
use App\Models\payment;
use App\Models\expense;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function home() {

        $users = User::all();
        $fichas = ficha::all();
        $assessment = assessment::all();
        $called = called::all();
        $media = media::all();
        $payments = payment::all();
        $expenses = expense::all();

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

        $entryCurrentMonth = 0;
        $entryPayment = 0;
        $exitMonthCurrent = 0;
        $totalCurrentMonth = 0;
        $totalPayment = 0;

        $mesAtual = date('m');
        
        foreach ($expenses as $expense) {
            if (date('m', strtotime($expense->data_expense)) == $mesAtual) {
                if ($expense->tipo_expense == 1) {
                    $entryCurrentMonth += $expense->value_expense;
                } elseif ($expense->tipo_expense == 2) {
                    $exitMonthCurrent += $expense->value_expense;
                }
            }
        }

        foreach ($payments as $payment) {

            $totalPayment += $payment->value_payment;

            if (date('m', strtotime($payment->date_payment)) == $mesAtual) {
                $entryPayment += $payment->value_payment;
            }
        }

        $totalCurrentMonth += $entryPayment +  $entryCurrentMonth - $exitMonthCurrent;

        $expenseCurrent = array(
            'entryCurrentMonth' => $entryCurrentMonth,
            'entryPayment' => $entryPayment,
            'exitMonthCurrent' => $exitMonthCurrent,
            'totalCurrentMonth' => $totalCurrentMonth
        );

        
        $inputTotal = 0;
        $exitTotal = 0;

        foreach ($expenses as $expense) {
            if ($expense->tipo_expense == 1) {
                $inputTotal += $expense->value_expense;
            } elseif ($expense->tipo_expense == 2) {
                $exitTotal += $expense->value_expense;
            }
        }

        $totalGeral = $inputTotal + $totalPayment - $exitTotal;

        $expenseAll = array(
            'inputTotal' => $inputTotal,
            'exitTotal' => $exitTotal,
            'totalPayment' => $totalPayment,
            'totalGeral' => $totalGeral
        );

        $today = Carbon::now()->format('m-d');
        $currentMonth = Carbon::now()->format('m');

        $nivers = User::whereRaw('DATE_FORMAT(date, "%m-%d") = ?', [$today])->get();
        $niverMonths = User::whereRaw('DATE_FORMAT(date, "%m") = ?', [$currentMonth])->get();
        
        return view('admin.home', [
            'users' => $users,
            'fichas' => $fichas,
            'assessment' => $assessment,
            'called' => $called,
            'calleds' => $calleds,
            'statistics' => $statistics,
            'media' => $media,
            'payments' => $payments,
            'expenseCurrent' => $expenseCurrent,
            'expenseAll' => $expenseAll,
            'nivers' => $nivers,
            'niverMonths' => $niverMonths
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
