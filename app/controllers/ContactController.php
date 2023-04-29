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
        SweetAlert::showMessage("Success","Insert Successfully","success");
        return view('contact_us.index');

    }
    public function delete()
    {
        $ContactUs = new ContactUs($this->dbc);
        $ContactUs->setValues(['id' => $_GET['id']]);
        $ContactUs->delete();
        SweetAlert::showMessage("Success","Delete Successfully","success");
        return view('contact_us.index');

    }
}