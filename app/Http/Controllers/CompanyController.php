<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('home', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new-company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'companyName' => 'string|required',
            'companyAddress' =>'string|nullable',
            'companyEmail' =>'email|nullable',
            'companyWeb' =>'string|nullable',
            'companyLogo' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100',
        ]);

        if($request->hasFile('companyLogo')){
            $logo = $request->file('companyLogo')->store(".");
        }

        $company = new Company();
        $company->name = $request->companyName;
        $company->email = $request->companyEmail;
        $company->logo = $logo ?? null;
        $company->address = $request->companyAddress;
        $company->web = $request->companyWeb;
        $company->save();

        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('edit-company', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'companyName' => 'required',
            'companyAddress' =>'string|nullable',
            'companyEmail' =>'email|nullable',
            'companyWeb' =>'string|nullable',
            'companyLogo' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100',
        ]);

        if($request->hasFile('companyLogo')){
            $logo = $request->file('companyLogo')->store(".");
        }

        $company->name = $request->companyName;
        $company->email = $request->companyEmail;
        $company->logo = $logo ?? null;
        $company->address = $request->companyAddress;
        $company->web = $request->companyWeb;
        $company->save();

        return redirect('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->employees()->delete();
        $company->delete();
        return redirect('/companies');
    }
}
