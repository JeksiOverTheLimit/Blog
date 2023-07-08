<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Authenticatable;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function showRegisterPage()
    {
        return view('register');
    }

    public function create(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required'
        ]);

        $user = $this->userService->create($formFields);

        auth()->login($user);

        return redirect('/');
    }

    public function showLoginPage(){
        return View('login');
    }

    public function login(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            

            return redirect('/');
        }

        return back();
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    
}
