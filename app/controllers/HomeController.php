<?php 
namespace App\Controllers;

use App\Models\Room;
use Core\Request;
use Core\SweetAlert;
// use App\Models\ContactUs;
class HomeController{
    private $dbc;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
    public function view()
    {
        $find['deleted_at'] = 0;
        $condition['deleted_at'] = '=';
        $Room = new Room($this->dbc);
        $Rooms = $Room->find($find,$condition);
        return view('index',compact('Rooms'));
    }
    public function delete()
    {
        
    }

}