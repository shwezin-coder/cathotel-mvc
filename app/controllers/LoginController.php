<?php 
namespace App\Controllers;

use App\Models\User;
use Core\SweetAlert;

class LoginController{
    private $dbc;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
    public function view(){
        return view('login');
    }

    public function authentication()
    {
        $User = new User($this->dbc);
        $User = $User->findBy('email',$_POST['email']);
        if(empty($User))
        {
            SweetAlert::showMessage('Oops','User not found','error');
            return view('login');
        }
        else
        {
            if(!password_verify($_POST['password'],$User->password))
            {
                SweetAlert::showMessage('Oops','Password is incorrect','error');
                return view('login');
            }
            $_SESSION['user']['user_id'] = $User->id;
            $_SESSION['user']['role'] = $User->role;

            if($User->role == 3)
            {
                return redirect('admin');
            }
            return redirect('user-profile');
        }


    }
}