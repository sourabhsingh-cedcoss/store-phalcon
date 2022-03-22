<?php

use Phalcon\Mvc\Controller;

class UserController extends Controller
{
    public function indexAction()
    {
    }
    public function checkuserAction()
    {
        $user = new Users();
        $email = $this->request->getPost()['email'];
        $password = $this->request->getPost()['password'];
        return $user->checkUser($email, $password);
    }
    public function signupAction()
    {
        // return "Signup";
    }
    public function registerAction()
    {
        // return '<h1>registered</h1>';
        $user = new Users();

        $user->name = $this->request->getPost()['name'];

        $user->password = $this->request->getPost()['password'];
        $user->email = $this->request->getPost()['email'];
        $user->role = 'user';
        $user->status = 'restricted';

        $success = $user->save();
        $email = $this->request->getPost()['email'];
        $data = Users::find(["email = '$email'"]);
        return json_encode($data);
    }

    public function checkemailAction()
    {
        $email = $this->request->getPost()['email'];
        $data = Users::find(["email = '$email'"]);
        return json_encode($data);
    }
}