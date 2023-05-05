<?php 
namespace App\Controllers;
use App\Models\ContactUs;
use Core\SweetAlert;
class ContactController{
    private $dbc;
    private $ContactUs;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
        $this->ContactUs = new ContactUs($this->dbc);
    }
    public function index(){
        return view('contact_us');
    }
    public function save()
    {
        $this->ContactUs->setValues($_POST);
        if($this->ContactUs->save() == true){
            SweetAlert::showMessage("Success","Submitted Successfully","success");
            return view('contact_us');
        }
        return  SweetAlert::showMessage("Oops!","Something Wrong","error");

    }

}