<?php 
namespace App\Controllers\Admin;

use App\Controllers\Repository\ManageRepository;
use App\Models\User;
use Core\Auth;
use Core\SweetAlert;

class UserController implements ManageRepository{
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
            $find['role'] = 3;
            $condition['role'] = '!=';
            $find['deleted_at'] = 0;
            $condition['deleted_at'] = '=';
            
            $Users = $this->User->find($find,$condition);
            return view('admin.users',compact('Users'));
        }

    }
    public function update()
    {
        
        $this->User->findBy('id',$_POST['user_id'],'=');
        $this->User->setValues($_POST);
        if($this->User->update() == true)
        {
           return SweetAlert::redirect_Message('Success','Updated Successfully','success','users');
        }
    }
    public function save()
    {
        if($_POST['password'] != $_POST['confirm_password'])
        {
           return SweetAlert::redirect_Message('Oops','Password and Confirm password are not same','error','users');
        }
        else
        {
            $_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
            
            $this->User->setValues($_POST);
            $this->User->save();
            return SweetAlert::redirect_Message('Succcess','Saved Successfully','success','users');
        }
    }
    public function delete()
    {
        
        $this->User->findBy('id',$_POST['duser_id'],'=');
        $updated_data['deleted_at'] = 1; 
        $this->User->setValues($updated_data);
        if($this->User->update() == true)
        {
            return SweetAlert::redirect_Message('Success','Deleted Successfully','success','users');
        }
    }

}