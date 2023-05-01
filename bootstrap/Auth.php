<?php 
namespace Core;
class Auth{
    public static function auth()
    {
        if(!isset($_SESSION['user']))
        {
            return SweetAlert::redirect_Message('Oops!','Please login first.','error','login');
        }
        return true;
    }
}