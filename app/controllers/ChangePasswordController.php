<?php 
namespace App\Controllers;

use App\Models\User;
use Core\Auth;
use Core\SweetAlert;
class ChangePasswordController{
    private $dbc;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
    public function index()
    {
        $auth = Auth::auth();
        if($auth == true)
        {
            return view('changepassword');
        }
        
    }
    public function update()
    {
        $User = new User($this->dbc);
        $User = $User->findBy('id',$_SESSION['user']['user_id'],'=');
        if(!password_verify($_POST['password'],$User->password))
        {
           SweetAlert::showMessage('Oops','Password is incorrect','error'); 
           return view('changepassword');
        }
        elseif ($_POST['newpassword'] != $_POST['confirmnewpassword']) {
            SweetAlert::showMessage('Oops','New password and Confirm password are not same.','error');
            return view('changepassword');
        }
        else
        {
            $password_arr['password'] = password_hash($_POST['newpassword'],PASSWORD_DEFAULT);
            $User->setValues($password_arr);
            if($User->update())
            {
                return SweetAlert::redirect_Message('Success','Change Password Successfully','success','login');
            }
        }
       
    }
}