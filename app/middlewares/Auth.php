<?php 
namespace App\Middlewares;

class Auth{
    public function handle()
    {
        if(!isset($_SESSION['user']))
        {
            return "Something Wrong";
        }
        return true;
    }
}