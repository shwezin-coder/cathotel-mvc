<?php 
namespace App\Controllers;

use App\Models\Room;
use Core\Auth;
use Core\SweetAlert;
use Core\UniqueFileStorage;

class RoomShowController{
    private $dbc;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
    public function index()
    {
        $find['deleted_at'] = 0;
        $condition['deleted_at'] = '=';
        $Room = new Room($this->dbc);
        $Rooms = $Room->find($find,$condition);
        $RoomTypes = $Room->find($find,$condition);
        return view('room_list',compact('Rooms','RoomTypes'));
    }
    public function search()
    {
        $find['deleted_at'] = 0;
        $condition['deleted_at'] = '=';
        $findtype['deleted_at'] = 0;
        $conditiontype['deleted_at'] = '=';
        $find['id'] = $_POST['room_type'];
        $condition['id'] = '=';
        switch ($_POST['price_range']) {
            case '10-100':
                $between['min'] = 10;
                $between['max'] = 100;
                break;
            case '100-200':
                $between['min'] = 100;
                $between['max'] = 200;
                break;
            default:
                $between['min'] = 200;
                $between['max'] = 300;
                break;
        }
        $between['key'] = 'price';
        $condition['price'] = "=";
        $Room = new Room($this->dbc);
        $Rooms = $Room->find($find,$condition,$between);
        $RoomTypes = $Room->find($findtype,$conditiontype);
        return view('room_list',compact('Rooms','RoomTypes'));
    }
}