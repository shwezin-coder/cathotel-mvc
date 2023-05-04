<?php 
namespace App\Models;
use Core\Model;

class Booking extends Model{  
    public function __construct($dbc)
    {
        parent::__construct($dbc,'booking');
        
    }
    protected function initFields()
    {
        $this->fields = [
            'name',
            'email',
            'user_id',
            'room_id',
            'ph_number',
            'check_in',
            'check_out',
            'noofrooms',
            'special_request',
            'cat_information'
        ];
    }

    public function total_income()
    {
        $sql = "SELECT SUM(r.price * b.noofrooms) as totalincome FROM rooms r, booking b
                WHERE b.room_id = r.id
               ";
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute();
        $pageData = $stmt->fetchAll();
        return $pageData[0]['totalincome'];
    }

    public function total_roomtype()
    {
        $sql = " SELECT room_type, COUNT(b.noofrooms) AS totalrooms FROM rooms r, booking b
                 WHERE r.id = b.room_id
                 GROUP BY b.room_id
               ";
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute();
        $pageData = $stmt->fetchAll();
        $totalrooms_arr = array();
        $roomtype_arr = array();
        foreach ($pageData as $Roomtype) {
            array_push($totalrooms_arr,$Roomtype['totalrooms']);
            array_push($roomtype_arr,$Roomtype['room_type']);
        }
        $Room_arr[0] = $roomtype_arr;
        $Room_arr[1] = $totalrooms_arr;
        return $Room_arr;
    }

    public function total_bookings()
    {
        $sql = "SELECT MONTH(check_in) AS month, COUNT(*) AS totalbookings
                FROM booking
                GROUP BY MONTH(check_in)";
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute();
        $pageData = $stmt->fetchAll();
        $month_arr = array();
        $totalbookings_arr = array();
        foreach($pageData as $Booking)
        {
           array_push($month_arr,$Booking['month']);
           array_push($totalbookings_arr,$Booking['totalbookings']);
        }
        $Booking_arr[0] = $month_arr;
        $Booking_arr[1] = $totalbookings_arr;
        return $Booking_arr;
    }

}