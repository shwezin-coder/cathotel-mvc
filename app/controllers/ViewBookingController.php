<?php 
namespace App\Controllers\Admin;

use App\Models\Booking;
use App\Models\Room;
use Core\Auth;

class ViewBookingController{
    private $dbc;
    private $Bookings;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
        $this->Bookings = new Booking($this->dbc);
    }
    public function index()
    {
        $auth = Auth::auth();
        if($auth == true)
        {
            $Bookings = $this->Bookings->findAll();

            foreach ($Bookings as $key => $value) {
                $Room = new Room($this->dbc);
                $Room = $Room->find(['id' => $value->room_id],['id' => '=']);
                $value->room = $Room;

            }
            return view('view_booking',compact('Bookings'));
        }

    }
}