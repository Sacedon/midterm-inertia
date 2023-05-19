<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Inertia\Inertia;

class CompanyController extends Controller
{
    
    public function index() {
        
        return inertia('companies/Index', [
            'companies' => Company::orderBy('name')->get()
        ]);
        
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
    public function destroy(Company $company)
    {
        if($company->members->count() > 0) {
            if($company->members->count() > 1) {
                return redirect('/companies')->with('error', "You can't delete this company because it has ".$company->members->count()." members.");
            } else {
                return redirect('/companies')->with('error', "You can't delete this company because it has ".$company->members->count()." member.");
            }
        }else{
            $company->delete();

            return redirect('/companies')->with('success', 'Company has been deleted successfully!');
        }
    }


}
