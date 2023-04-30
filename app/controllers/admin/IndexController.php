<?php 
namespace App\Controllers\Admin;

use Core\Auth;
use Core\SweetAlert;
// use App\Models\ContactUs;
class IndexController{
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
            return view('admin.index');
        }
    }

}