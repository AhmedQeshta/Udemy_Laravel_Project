<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Company;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::userCompanies();

        $contacts = auth()->user()->contacts()->latestFirst()->paginate(5);

        return view('contacts.index', compact('contacts', 'companies'));
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact = new Contact();
        // $companies = auth()->user()->companies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '2');
        // $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        $companies = Company::userCompanies();
        return view('contacts.create', compact('companies', 'contact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        // dd($request->except('first_name', 'last_name'));
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone'=>   'required',
            'company_id' => 'bail|required|exists:companies,id',
        ]);
            $request->user()->contacts()->create($request->all());
         
            return redirect()->route('contacts.index')->with('message', "Contact has been added successfully");
    }
             
                
            
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        $companies = Company::userCompanies();

        return view('contacts.edit', compact('companies', 'contact'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, ContactRequest $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone'=>   'required',
            'address' => 'required',
            'company_id' => 'bail|required|exists:companies,id',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message', "Contact has been updated successfully");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return back()->with('message', "Contact has been deleted successfully");
    }
}
