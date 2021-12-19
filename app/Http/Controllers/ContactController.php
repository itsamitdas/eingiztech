<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::get();
        return view('contactList',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view("contact");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $validator = Validator::make($request->all(), [
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'subject'=>'required|max:255',
            'message'=>'required|max:255',
            'date'=>'required|max:255',
            'hh'=>'required|numeric',
            'mm'=>'required|numeric',
            'ampm'=>'required|min:2',
            'file' => 'file|mimes:jpeg,png,jpg,gif,svg,pdf',
        ]);
        if ($validator->fails()) {
            //dd($validator);
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        
        
        $data = $request->input();
        $hh = $data['hh'];
        $mm = $data['mm'];
        $ampm = $data['ampm'];
        $time = $hh.':'.$mm.':'.$ampm;

        unset($data['_token'],$data['hh'],$data['mm'],$data['ampm']);
        $data['time'] = $time;
        
        //return $data ;
        $insertStatus = Contact::create($data);
        $lastInsertId = $insertStatus->id;;
        //return $lastInsertId;

        //FILE UPLOAD SECTION
        if ($request->hasfile('file')) {
            
            $path = public_path().'/uploads/';
            
            //return $path;
            if (! File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $file = $request->file('file');
            $fileName = $lastInsertId.'.'.$file ->extension(); 

            $file->move($path, $fileName);
            $pathForDbInsert = 'uploads/'.$fileName;

            $contact = Contact::find($lastInsertId);
            $contact->filePath = $pathForDbInsert;
            $contact->save();
            
        }



        if($insertStatus){
            return back()->with('success','Details add successfully.');
        }else{
            return back()->with('error','Something went wrong.');
        }
        

        /*
        if($hh == 00 && $mm == 00){
            return back()->with('error','Please enter HH and MM properly.');
        }else{
            $time = $hh.':'.$mm.':'.$ampm;
            return $time ;
        }
        */
        
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
