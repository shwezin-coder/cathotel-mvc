<?php 
namespace App\Controllers\Admin;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Core\Auth;
use Core\SweetAlert;
use Core\CsvExport;

class BookingListController{
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
                if($value->user_id != 0)
                {
                    $finding['id'] = $value->user_id;
                    $condition['id'] = '=';
                    $User = new User($this->dbc);
                    $User = $User->find($finding,$condition);
                    $value->user = $User;
                }
                $Room = new Room($this->dbc);
                $Room = $Room->find(['id' => $value->room_id],['id' => '=']);
                $value->room = $Room;

            }
            return view('admin.booking',compact('Bookings'));
        }

    }
    public function exportcsv()
    {
        
        $Bookings = $this->Bookings->findAll();
        $i = 1;
        $fields = ['No','Name','Email','Phone Number','Room Type','Booking Date','NoofRooms','Special Requests','Cat Information'];
        foreach ($Bookings as $Booking) {
            if($Booking->user_id != 0)
            {
                $User = new User($this->dbc);
                $User = $User->find(['id' => $Booking->user_id],['id' => '=']);
                foreach($User as $Userdata)
                {
                    $name = $Userdata->name;
                    $email = $Userdata->email;
                    $ph_number = $Userdata->phone_number;
                }
            }
            else
            {
                $name = $Booking->name;
                $email = $Booking->email;
                $ph_number = $Booking->ph_number;
            }
            $Room = new Room($this->dbc);
            $Room = $Room->find(['id' => $Booking->room_id],['id' => '=']);
            foreach($Room as $RoomData)
            {
                $room_type = $RoomData->room_type;
            }
            $booking_date = "From" . $Booking->check_in .'to'.$Booking->check_out;
            foreach(json_decode($Booking->cat_information) as $CatInformation)
            {
                $cat_information = "Question :". $CatInformation->question_text . "Answer :" . $CatInformation->answer_text;
            }
            $data[] = [$i, $name, $email, $ph_number,$room_type,$booking_date,$Booking->noofrooms,$Booking->special_request,$cat_information];
        }
        $Export = new CsvExport('bookingdata_'.time().'.csv',$fields,$data);
        $Export->export();
        return view('admin.booking');
    }
}