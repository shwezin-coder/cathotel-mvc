<?php 
namespace App\Controllers;
use Core\Request;
class HomeController{
    public function view()
    {
        return view('home.index');
    }
    public function test(Request $request)
    {
        $string = "My First Framework";
        $requestData = $request;
        return view('home.index', compact('requestData'));
    }
}