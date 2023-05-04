<?php 
namespace App\Controllers\Admin;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Core\Auth;
use Core\SweetAlert;
class IndexController{
    private $dbc;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
    public function index()
    {
        $User = new User($this->dbc);
        $totalusers = $User->count('id',['deleted_at' => 1, 'role' => 1],['deleted_at' => '!=', 'role' => '!=']);
        echo $totalusers;
        $Room = new Room($this->dbc);
        $totalrooms = $Room->sum('noofrooms',['deleted_at' => 0],['deleted_at' => '!=']);

        $Booking = new Booking($this->dbc);
        $totalincome = $Booking->total_income();

        $roomtype_arr = $Booking->total_roomtype();
        $booking_arr = $Booking->total_bookings();
        
        $auth = Auth::auth();
        if($auth == true)
        {
            return view('admin.index',compact('totalusers','totalrooms','totalincome','roomtype_arr','booking_arr'));
        }
    }

}