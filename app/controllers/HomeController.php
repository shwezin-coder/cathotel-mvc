<?php 
namespace App\Controllers;
use Core\Request;
use Core\SweetAlert;
use App\Models\ContactUs;
class HomeController{
    private $dbc;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
    public function view()
    {
        $ContactUs = new ContactUs($this->dbc);
        $ContactUs->findBy('id',1);
        // SweetAlert::showMessage('Testing','Testing Successfully','success');
        return view('home.index',compact('ContactUs'));
    }
    public function test(Request $request)
    {
        $string = "My First Framework";
        $requestData = $request;
        return view('home.index', compact('requestData'));
    }
}