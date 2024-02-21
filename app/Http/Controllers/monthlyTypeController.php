<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\monthlyType;

class monthlyTypeController extends Controller
{
    public function show_monthlyType_table() {
        
        $monthlyTypes = monthlyType::all();
        
        return view('admin.table.monthlyType', ['monthlyTypes' => $monthlyTypes]);
    }

    public function create() {
        
        return view('admin.register.monthlyType');
    }

    public function store(Request $request) {
        $request->validate([
            'name_monthly' => 'required',
            'value' => 'required'
        ] , [
            'name_monthly.required' => 'O campo nome não pode está vazio',
            'value.required' => 'O campo valor não pode está vazio ou quebrado'
        ]);
        
        monthlyType::create($request->all());

        return redirect()->back()->with('msg-success', 'Tipo Mensalidade cadastrado com sucesso!');
    }

    public function edit($id) {
        
        $monthlyType = monthlyType::findOrFail($id);

        return view('admin.editions.monthlyType', ['monthlyType' => $monthlyType]);
    }

    public function update(Request $request) {
        
        $request->validate([
            'name_monthly' => 'required',
            'value' => 'required'
        ] , [
            'name_name_monthly.required' => 'O campo nome não pode está vazio',
            'value.required' => 'O campo valor não pode está vazio ou quebrado'
        ]);

        $monthlyTypeData =  $request->all();

        monthlyType::findOrFail($request->id_monthly_type)->update($monthlyTypeData);


        return redirect()->back()->with('msg-success', 'Tipo Mensalidade editado com sucesso!');
    }

    public function destroy($id) {
        
        $monthlyTypeData = monthlyType::find($id);

        $monthlyTypeData->delete();

        return redirect()->back()->with('msg-success', 'Tipo Mensalidade excluído com sucesso!');
    }
}