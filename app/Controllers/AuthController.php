<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends BaseController
{
    public function register()      // register method to show the registration form
    {
        return view('auth/register');  // return the  register which are come from view directory 
    }

    public function handleRegister()
    {
        $userModel = new \App\Models\UserModel();

        $email = $this->request->getPost('email');

        // ✅ Check if email already exists
        $existingUser = $userModel->where('email', $email)->first();

        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Email already registered.');
        }

        // Proceed with registration
        $userModel->save([
            'name' => $this->request->getPost('name'),
            'email' => $email,
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/login')->with('success', 'Registration successful!');
    }


    public function login()
    {
        return view('auth/login');
    }

    public function handleLogin()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set('user', $user);
            // return redirect()->to('/admin/dashboard');
            return redirect()->to('/')->with('success', 'Login successful!');

        }

        return redirect()->to('/login')->with('error', 'Invalid login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
