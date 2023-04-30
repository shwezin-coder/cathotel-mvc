<?php 
namespace App\Controllers\Admin;

use App\Models\User;
use Core\Auth;
class UserController{
    private $dbc;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
    public function index()
    {
        $auth = Auth::auth();
        $find['role'] = 3;
        $Users = new User($this->dbc);
        $Users = $Users->find($find,"!=");
        if($auth == true)
        {
            return view('admin.users',compact('Users'));
        }

    }

}