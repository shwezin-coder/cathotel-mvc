<?php 
namespace App\Controllers;

use App\Models\User;
use Core\SweetAlert;
class SignUpController{
    private $dbc;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
    public function index()
    {
        return view('signup');
        
    }
    public function save()
    {
        if($_POST['password'] != $_POST['confirm_password'])
        {
            SweetAlert::showMessage('Oops','Password and Confirm password are not same','error');
            return view('signup');
        }
        else
        {
            $_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $User = new User($this->dbc);
            $User->setValues($_POST);
            $User->save();
            SweetAlert::redirect_Message('Success','Insert Successfully','success','login');
        }
       

    }
}