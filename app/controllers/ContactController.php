<?php 
namespace App\Controllers;
class ContactController{
    private $dbc;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
    public function index(){
        echo "testing";
    }
}