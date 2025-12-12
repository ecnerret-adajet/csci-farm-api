<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index(){
        $company = Company::all();

        return response()->json($company);
    }

    public function show($id){
        $company = Company::find($id);

        return response()->json($company);
    }

    public function store(Request $request){
        $company = Company::create($request->all());

        return response()->json($company);
    }

    public function edit($id){
        $company = Company::findOrFail($id);

        if(!$company){
            return response()->json(['message' => 'Company not found'], 404);
        }

        return response()->json($company);
    }

    public function update(Request $request, $id){
        $company = Company::findOrFail($id);
    
        if(!$company){
            return response()->json(['message' => 'Company not found'], 404);
        }

        $company->update($request->all());

        return response()->json([
            'message' => 'Company updated successfully',
            'company' => $company
        ]);
    }

    public function destroy($id){
        $company = Company::findOrFail($id);
        $company->delete();

        return response()->json([
            'message' => 'Company deleted successfully'
        ]);
    }
}
