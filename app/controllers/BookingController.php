<?php 
namespace App\Controllers;

use App\Models\Room;
use Core\Auth;
use Core\SweetAlert;
use Core\UniqueFileStorage;

class BookingController{
    private $dbc;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
    public function index()
    {
        return view('booking');
    }
}