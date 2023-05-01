<?php 
namespace App\Models;
use Core\Model;

class Room extends Model{  
    public function __construct($dbc)
    {
        parent::__construct($dbc,'rooms');
        
    }
    protected function initFields()
    {
        $this->fields = [
            'room_type',
            'noofrooms',
            'specification',
            'price',
            'image',
            'deleted_at'
        ];
    }


}