<?php 
namespace App\Models;
use Core\Model;

class ContactUs extends Model{  

    public $id;
    public $title;
    public $content;
    public function __construct($dbc)
    {
        parent::__construct($dbc,'contact_us');
        
    }
    protected function initFields()
    {
        $this->fields = [
            'name',
            'email',
            'subject',
            'message'
        ];
    }

}