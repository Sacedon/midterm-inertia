<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    
    public function index() {
        sleep(3);
        $companies = Company::orderBy('name')->paginate(5);

        return inertia('companies/Index', compact('companies'));
    }

    public function create() {
        return inertia('companies/Create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'address' => 'required',
            'net_worth' => 'required'
        ]);

        Company::create([
            'name' => $request->name,
            'type' => $request->type,
            'address' => $request->address,
            'net_worth' => $request->net_worth
        ]);

        return redirect('/companies')->with('Info','A new company has been created.');
    }

    public function edit(Company $company) {
        return inertia('companies.Edit', [
            'company' => $company
        ]);
    }

    public function update(Request $request, Company $company) {
        $fields = $request->validate([
            'name' => 'required|unique:companies,name',
            'type' => 'required',
            'address' =>  'required',
            'net_worth' => 'required'
        ]);

        $company->update($fields);

        return redirect('/companies');
    }
}
