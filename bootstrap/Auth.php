<?php 
namespace Core;
class Auth{
    public static function auth()
    {
        $redirect_url = ROOT_DIRECTORY.'login';
        if(!isset($_SESSION['user']))
        {
            return SweetAlert::redirect_Message('Oops!','Please login first.','error',$redirect_url);
        }
        return true;
    }
}