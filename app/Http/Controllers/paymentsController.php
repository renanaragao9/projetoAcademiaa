<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payments;

class paymentsController extends Controller
{
    public function show_payments_table() {
        
        $payments = payments::all();
        
        return view('admin.payments', ['payments' => $payments]);
    }

    public function create() {
        
        return view('admin.register.payments');
    }

    public function store(Request $request) {
        $request->validate([
            'name_monthly' => 'required',
            'value' => 'required'
        ] , [
            'name_monthly.required' => 'O campo nome não pode está vazio',
            'value.required' => 'O campo valor não pode está vazio ou quebrado'
        ]);
        
        payments::create($request->all());

        return redirect()->back()->with('msg-success', 'Tipo Mensalidade cadastrado com sucesso!');
    }

    public function edit($id) {
        
        $payments = payments::findOrFail($id);

        return view('admin.editions.payments', ['payments' => $payments]);
    }

    public function update(Request $request) {
        
        $request->validate([
            'name_monthly' => 'required',
            'value' => 'required'
        ] , [
            'name_name_monthly.required' => 'O campo nome não pode está vazio',
            'value.required' => 'O campo valor não pode está vazio ou quebrado'
        ]);

        $paymentsData =  $request->all();

        payments::findOrFail($request->id_monthly_type)->update($paymentsData);


        return redirect()->back()->with('msg-success', 'Tipo Mensalidade editado com sucesso!');
    }

    public function destroy($id) {
        
        $paymentsData = payments::find($id);

        $paymentsData->delete();

        return redirect()->back()->with('msg-success', 'Tipo Mensalidade excluído com sucesso!');
    }
}
