<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function getForm()
    {
        return view('register');
    }

    public function postForm(Request $request)
    {
    // Form validation
    $validations = Validator::make($request->all(), [
        'username' => 'required|max:50',
        'mail' => 'required|max:100',
        'password' => 'required|min:5|max:20'
    ]);

    // Validation Error Messages
    if ($validations->fails()) {
        return response()->json(['errors' => $validations->errors()->all()])
        ;
    }

    // Instanciate a new model
    $user = new User;

    // Set the attributes
    $user->username = $request->username;
    $user->mail = $request->mail;
    $user->password = $request->password;

    // Save the model
    $user->save();

    return response()->json(['success' => 'User has been added']);
    }


    // Login view show

    public function getLogin()
    {
        return view('login');
    }

    // Login post submit
    public function postLogin(Request $request)
    {
    // Form validation
    $validations = Validator::make($request->all(), [
        'username' => 'required|max:50',
        'password' => 'required|min:5|max:20'
    ]);
    // Validation Error Messages
    if ($validations->fails()) {
        return response()->json(['errors' => $validations->errors()->all()])
        ;
    }
    
    $user = User::where('username', $request->username)->first();

    if (isset($user)) {
        $request->session()->put('username', $request->username);
        return response()->json(['success' => 'Username found']);
    }

    return response()->json(['error' => 'Username doesnt exist']);
    }
}