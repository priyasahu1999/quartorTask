<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppendModel;
use App\Models\TestingProject;

class AppendController extends Controller
{
    public function index(){

        return view('append.index');
    }

//  *********Append data store data***************//
    public function store(Request $request)
    {
        $data = [
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
            // Add other data as needed
        ];
        dd($data);

        return response()->json(['data' => $data]);
    }



    
    public function form_get(){
        return view('testing.index');
    } 
    /** 
     * Form SUbmit using jqury ajax
     */
    public function submit_data(Request $request)
    {
        // Validate the request data as needed
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $save = new TestingProject;
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->save();


        // $data = $request->all();
        // Example: save to a model
        // YourModel::create($data);

        return response()->json(['message' => 'Data submitted successfully']);
    }
}
