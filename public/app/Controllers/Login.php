<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
    
    public function Login()
    {
        // Add your code here.
        if(!$this->session->get('Logged_in')){
            return redirect()->to(base_url());
        }
    }
    public function index()
    {
        return view('register/login');
    }

    public function auth()
    {

        $rules = [
            'usuario' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            //return redirect()->back()->withInput()->with('errors',$this->Validator->listErrors());
            return redirect()->back()->withInput()->with('errors', 'Usr o Pwd incorrecto');
        }

        $userModel = new UsersModel();
        $post = $this->request->getPost(['usuario', 'password']);

        $user = $userModel->ValidateUser($post['usuario'], $post['password']);

        if ($user !== null) {
            $this->setSession($user);
            return redirect()->to(base_url('prestador-list'));
        } else {
            return redirect()->back()->withInput()->with('errors', 'Usr o Pwd incorrecto');
        }
    }

    private function setSession($user)
    {
        $data = array(
            'Logged_in' => true,
            'iduser' => $user->id_user,
            'usuario' => $user->name,
        );

        $this->session->set($data);
    }

    public function logout()
    {
        if ($this->session->get('Logged_in')) {
            $this->session->destroy();
        }

        return redirect()->to(base_url('login'));
    }
}
