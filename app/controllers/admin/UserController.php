<?php 
namespace App\Controllers\Admin;

use App\Controllers\Admin\Repository\ManageRepository;
use App\Models\User;
use Core\Auth;
use Core\SweetAlert;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class UserController implements ManageRepository{
    private $dbc;
    private $User;
    private $logger;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
        $this->User = new User($this->dbc);
        $this->logger = new Logger('logging');
        $this->logger->pushHandler(new StreamHandler('../log/log',Level::Warning));
        
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
        $this->logger->warning('User ID ' .$_SESSION['user']['user_id']. ' has updated '. $_POST['name']);
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
            $_POST['deleted_at'] = 0;
            $this->User->setValues($_POST);
            if($this->User->save() == true)
            {
                $this->logger->warning('User ID ' .$_SESSION['user']['user_id']. ' has added '. $_POST['name']);
                return SweetAlert::redirect_Message('Succcess','Saved Successfully','success','users');
            }

        }
    }
    public function delete()
    {
        
        $this->User->findBy('id',$_POST['duser_id'],'=');
        $updated_data['deleted_at'] = 1; 
        $this->User->setValues($updated_data);
        if($this->User->update() == true)
        {   
            $this->logger->warning('User ID ' .$_SESSION['user']['user_id']. ' has deleted '. $_POST['duser_id']);
            return SweetAlert::redirect_Message('Success','Deleted Successfully','success','users');
        }
    }

}