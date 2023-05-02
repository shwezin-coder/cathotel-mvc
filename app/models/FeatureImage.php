<?php 
namespace App\Models;
use Core\Model;

class FeatureImage extends Model{  
    public function __construct($dbc)
    {
        parent::__construct($dbc,'feature_images');
        
    }
    protected function initFields()
    {
        $this->fields = [
            'room_id',
            'image'
        ];
    }


}