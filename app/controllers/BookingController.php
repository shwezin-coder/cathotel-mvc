<?php 
namespace App\Controllers;

use App\Models\Room;
use App\Models\FeatureImage;
use App\Models\CatQuestion;
use App\Models\Booking;
use Core\SweetAlert;

class BookingController{
    private $dbc;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
    public function index()
    {
        $finding['room_id'] = $_GET['id'];
        $condition['room_id'] = '=';
        $FeatureImage = new FeatureImage($this->dbc);
        $FeatureImages = $FeatureImage->find($finding,$condition);
        $CatQuestions = new CatQuestion($this->dbc);
        $CatQuestions = $CatQuestions->findAll();
        return view('booking',compact('FeatureImages','CatQuestions'));
    }
    public function save()
    {
        $finding['check_in'] = $_POST['check_out'];
        $condition['check_in'] = '>=';
        $finding['check_out'] = $_POST['check_out'];
        $condition['check_out'] = '>=';
        $Booking = new Booking($this->dbc);
        $Bookings = $Booking->count('noofrooms',$finding,$condition);
        $totalrooms = $Bookings['noofrooms'];
        $room_id = $_POST['room_id'];
        if($totalrooms > 0)
        {
            return SweetAlert::redirect_Message('Oops','Room isn\'t available for this date','error',"booking?id=$room_id");
        }
        if(isset($_POST['user_id']))
        {
            $record['user_id'] = $_POST['user_id'];
        }
        else
        {
            $record['name'] = $_POST['name'];
            $record['email'] = $_POST['email'];
            $record['ph_number'] = $_POST['ph_number'];
        }
        $record['check_in'] = $_POST['check_in'];
        $record['check_out'] = $_POST['check_out'];
        $record['noofrooms'] = $_POST['noofrooms'];
        $record['special_request'] = $_POST['special_request'];
        $record['cat_information'] = json_encode($_POST['cat_information']);
        $record['room_id'] = $room_id;
        $SaveBooking = $Booking->setValues($record);
        if($SaveBooking->save() == true)
        {
            return SweetAlert::redirect_Message('Success','Book Successfully','error',"room-list");
        }

    }
}