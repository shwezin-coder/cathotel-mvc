<?php 
namespace App\Models;
use Core\Model;

class CatQuestion extends Model{  
    public function __construct($dbc)
    {
        parent::__construct($dbc,'cat_questions');
        
    }
    protected function initFields()
    {
        $this->fields = [
            'question_text',
            'question_type',
            'option_values'
        ];
    }

}