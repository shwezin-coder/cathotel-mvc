<?php 
namespace App\Controllers;
use App\Models\ContactUs;
use Core\SweetAlert;
class ContactController{
    private $dbc;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
    public function index(){
        return view('contact_us');
    }
    public function save()
    {
        $ContactUs = new ContactUs($this->dbc);
        $ContactUs->setValues($_POST);
        $ContactUs->save();
        SweetAlert::showMessage("Success","Submitted Successfully","success");
        return view('contact_us');

    }

}