<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment;
use App\Models\user;
use App\Models\monthlyType;
use Carbon\Carbon;

class paymentsController extends Controller
{
    public function index() {
        
        $payments = payment::orderBy('id_payment', 'DESC')->get();
        
        return view('admin.payments', ['payments' => $payments]);
    }

    public function indexUser($id) {

        $payments = payment::with('monthly', 'user', 'userCreator')->where('user_id', $id)->orderBy('id_payment', 'DESC')->get();

        return view('admin.table.paymentUser', ['payments' => $payments]);
    }

    public function create($id) {
        
        $user = user::findOrFail($id);

        $type_payments = monthlyType::orderBy('name_monthly', 'asc')->get();

        $form_payments = ['Dinheiro', 'Pix', 'Cartão de Débito', 'Cartão de Crédito', 'Boleto', 'Vale'];

        return view('admin.register.payments', [
            'user' => $user,
            'type_payments' => $type_payments,
            'form_payments' => $form_payments
        ]);
    }

    public function store(Request $request) {
        
        $request->validate([
            'form_payment' => 'required',
            'monthly_type_id' => 'required',
        ] , [
            'form_payment.required' => 'Defina uma forma de pagamento',
            'monthly_type_id.required' => 'Defina um Tipo de Mensalidade válido'
        ]);


        $date = Carbon::parse($request->date_payment);

        $meses = monthlyType::where('id_monthly_type', $request->monthly_type_id)->first();

        $due_date = $date->copy()->addMonths($meses->months);

        $request->merge(['date_due_payment' => $due_date->toDateString()]); 

        payment::create($request->all());

        return redirect()->back()->with('msg-success', 'Mensalidade cadastrada com sucesso!');
    }

    public function edit($id) {
        
        $payment = payment::findOrFail($id);
        
        $type_payments = monthlyType::orderBy('name_monthly', 'asc')->get();

        $form_payments = ['Dinheiro', 'Pix', 'Débito', 'Crédito', 'Boleto', 'Vale'];

        return view('admin.editions.payments', [
            'payment' => $payment,
            'type_payments' => $type_payments,
            'form_payments' => $form_payments
        ]);
    }

    public function update(Request $request) {

        $date = Carbon::parse($request->date_payment);

        $meses = monthlyType::where('id_monthly_type', $request->monthly_type_id)->first();

        $due_date = $date->copy()->addMonths($meses->months);

        $request->merge(['date_due_payment' => $due_date->toDateString()]); 

        $paymentsData =  $request->all();

        payment::findOrFail($request->id_payment)->update($paymentsData);


        return redirect()->back()->with('msg-success', 'Mensalidade editada com sucesso!');
    }

    public function destroy($id) {
        
        $paymentsData = payment::find($id);

        $paymentsData->delete();

        return redirect()->back()->with('msg-success', 'Mensalidade excluída com sucesso!');
    }

    public function report() {
        
        $periods = ['Mês', 'Intervalo'];

        $form_payments = ['Dinheiro', 'Pix', 'Débito', 'Crédito', 'Boleto', 'Vale'];

        return view('admin.report.payment', [
            'periods' => $periods,
            'form_payments' => $form_payments
        ]);
    }
}
