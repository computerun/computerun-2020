<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller{
   /*
        Validate the data entered into the form
   */
    public function formSubmit(Request $request){
        $request->validate([
            // regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/
            'Name' => "required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/",
            'University' => "required|string",
            'Email' => "required|email|",
            // 'Email' => "required|email|unique:users", --> haven't had the database
            'LineID' => "required|string",
            'PhoneNumber' =>"required|min:10|max:13",
            'Event' => "required",
            'Confirm' => "required",
        ],[
        'Name.required' => 'Name cannot be empty',
        'Name.regex' => 'Name must be alphabetical',
        'University.required' => 'University cannot be empty',
        'Email.required' => 'Email cannot be empty',
        'LineID.required' => 'Line ID cannot be empty',
        'PhoneNumber.required' => 'Phone Number cannot be empty',
        'PhoneNumber.min' => 'Phone Number must at least 10 digit',
        'PhoneNumber.max' => 'Phone Number cannot be more than 13 digit',
        'Event.required'=> 'Event cannot be empty',
        'Confirm.required' => 'Please check the box to confirm'
        ]);

        // print_r($message->input());
    }

    // public function store(Request $request){

    //     $validatedData = $request->validate([
    //         'Name' => "required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/",
    //         'University' => "required|string",
    //         'Email' => "required|email",
    //         'LineID' => "required|string",
    //         'PhoneNumber' =>"required|min:10|max:13",
    //         'Event' => "required",
    //         'Confirm' => "required",
    //     ]);
    //    print_r($request->input());
    // }
}
