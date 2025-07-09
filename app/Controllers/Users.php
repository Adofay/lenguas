<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Users extends BaseController
{

    protected $helpers = ['form'];

    public function index()
    {
        return view('register');
    }

    public function create()
    {
        

        $rules = [
            'usuario' => 'required|max_length[30]|is_unique[users.usuario]',
            'password' => 'required|max_length[50]|min_length[5]',
            'repassword' => 'matches[password]',
            'name' => 'required|max_length[100]',
            'email' => 'required|max_length[80]|valid_email|is_unique[users.email]'
        ];
        
        if(!$this->validate($rules)){
            //return redirect()->back()->withInput()->with('errors',$this->Validator->listErrors());
            return redirect()->back()->withInput()->with('errors','Error en las entradas');            
        }

        $userModel = new UsersModel();
        $post = $this->request->getPost(['usuario','password','name','email']);

        //Cadena aleatorio seguro
        $token = bin2hex(random_bytes(20));

        $data = array(
            'usuario' => $post['usuario'], 
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
            'name' => $post['name'], 
            'email' => $post['email'], 
            'active' => 0,
            'activation_token' => $token,
            'create_at' => '2025-01-29 18:00:00',
        );

        $userModel->insert($data);  

        /*
        //Enviar correo: Configurar Email 
        $email = \Config\Services::email();
        $email->setTo($post['email']);
        $email->setSubject('Activa tu cuenta');

        $url = base_url('activate-user/' . $token); 
        $body = '<p>'.$post['name'].'</p>';
        $body .= "<p> Continuar registro desde: <a href='$url'>Aqui</p>";
        $body .= 'Gracias';

        $email->setMessage($body);
        $email->send();
        */

        $title = 'Registro exitoso';
        $message = 'Revisa tu correo';

        return $this->ShowMessage($title,$message);

    }


    public function activateUser($token)
    {
        $userModel = new UsersModel();
        $user = $userModel->where(['activation_token'=>$token, 'active'=>0])->first();

        if($user){

            //Puede regresar como array o como objet
            //print_r($user);

            $data = array(
                'active' => 1,
                'activation_token' => null,
            );

            $userModel->update($user->id_user, $data);  
            
            return $this->ShowMessage('Cuenta activada','Bienvendo a Pipes');

        }

        return $this->ShowMessage('Errors','Intente nuevamente');
        
    }

    public function linkRequestForm()
    {
        return view('register/link_request');
    }

    public function SentResetLinkEmail()
    {

        $rules = [
            'email' => 'required|max_length[80]|valid_email'
        ];
        
        if(!$this->validate($rules)){
            //return redirect()->back()->withInput()->with('errors',$this->Validator->listErrors());
            return redirect()->back()->withInput()->with('errors','Error en la entrada');            
        }

        $userModel = new UsersModel();
        $post = $this->request->getPost(['email']);
        $user = $userModel->where(['email'=>$post['email'], 'active' => 1])->first();

        if($user){
            
            $token = bin2hex(random_bytes(20));
            $expiresAt = new \DateTime();
            $expiresAt->modify('+1 hour');

            $data = array(
                'reset_token' => $token,
                'reset_token_expires_at' => $expiresAt->format('Y-m-d H:i:s'),
            );

            $userModel->update($user->id_user, $data); 

            return $this->ShowMessage('Token','Se ha generado liga, para actualizar password');
        }

        return $this->ShowMessage('Errors','Intente nuevamente');

    }

    private function ShowMessage($title,$message)
    {

        $data = array(
            'title' => $title,
            'message' => $message,
        );

        return view('register/message',$data);
    }


}
