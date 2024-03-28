<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;


class ExpensesController extends Controller
{
    public function show_expense_table() {
        
        $expenses = Expense::with('user')->orderBy('id_expense', 'DESC')->get();

        return view('admin.table.expense', ['expenses' => $expenses]);
    }

    public function create() {

        return view('admin.register.expense');
    }

    public function store(Request $request) {
        
        $request->validate([
            'tipo_expense' => 'required',
            'value_expense' => 'required'
        ] , [
            'tipo_expense.required' => 'O campo Tipo da Receita não pode está vazio',
            'value_expense.required' => 'O campo valor não pode está vazio ou quebrado'
        ]);

        
        Expense::create($request->all());

        return redirect()->back()->with('msg-success', 'Receita registrada com sucesso!');
    }  

    public function edit($id) {
        
        $expense = Expense::findOrFail($id);

        return view('admin.editions.expense', ['expense' => $expense]);
    }

    public function update(Request $request) {
        
        $request->validate([
            'tipo_expense' => 'required',
            'value_expense' => 'required'
        ] , [
            'tipo_expense.required' => 'O campo Tipo da Receita não pode está vazio',
            'value_expense.required' => 'O campo valor não pode está vazio ou quebrado'
        ]);

        $expenseData =  $request->all();

        Expense::findOrFail($request->id_expense)->update($expenseData);

        return redirect()->back()->with('msg-success', 'Receita editada com sucesso!');
    }

    public function destroy($id) {
        
        $expenseData = Expense::find($id);

        $expenseData->delete();

        return redirect()->back()->with('msg-success', 'Receita excluída com sucesso!');
    }

    public function report() {
        
        $periods = ['Mês', 'Intervalo'];

        $form_payments = ['Todos', 'Saída', 'Entrada'];

        return view('admin.report.expense', [
            'periods' => $periods,
            'form_payments' => $form_payments
        ]);
    }
}
