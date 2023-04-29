<?php 
namespace App\Models;
use Core\Model;

class User extends Model{  
    public function __construct($dbc)
    {
        parent::__construct($dbc,'users');
        
    }
    protected function initFields()
    {
        $this->fields = [
            'name',
            'role',
            'email',
            'password',
            'phone_number'
        ];
    }


}