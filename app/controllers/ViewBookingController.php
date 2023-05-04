<?php 
namespace App\Controllers\Admin;

use App\Models\Booking;
use App\Models\Room;
use Core\Auth;

class ViewBookingController{
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
            $Bookings = new Booking($this->dbc);
            $Bookings = $Bookings->findAll();

            foreach ($Bookings as $key => $value) {
                $Room = new Room($this->dbc);
                $Room = $Room->find(['id' => $value->room_id],['id' => '=']);
                $value->room = $Room;

            }
            return view('view_booking',compact('Bookings'));
        }

    }
}