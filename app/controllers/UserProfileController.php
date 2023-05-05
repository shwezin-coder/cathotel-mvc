<?php 
namespace App\Controllers;

use App\Models\User;
use Core\Auth;
use Core\SweetAlert;
class UserProfileController{
    private $dbc;
    private $User;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
        $this->User = new User($this->dbc);
    }
    public function index()
    {
        $auth = Auth::auth();
        if($auth == true)
        {
            
            $User = $this->User->findBy('id',$_SESSION['user']['user_id'],'=');
            return view('user_profile',compact('User'));
        }
        
    }
    public function update()
    {
        
        $User = $this->User->findBy('id',$_SESSION['user']['user_id'],'=');
        $User->setValues($_POST);
        if($User->update())
        {
             SweetAlert::showMessage('Success','Updated Profile Successfully','success');
             return view('user_profile',compact('User'));
        }
    }
}