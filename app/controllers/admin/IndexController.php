<?php 
namespace App\Controllers\Admin;
use Core\SweetAlert;
// use App\Models\ContactUs;
class IndexController{
    private $dbc;
    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
    public function index()
    {
        // $ContactUs = new ContactUs($this->dbc);
        // $ContactUs->findBy('id',1);
        // SweetAlert::showMessage('Testing','Testing Successfully','success');
        return view('admin.index');
    }

}