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

}