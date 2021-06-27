<?php


namespace App\Http\Controllers\Landingpage;


use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index(){
        return view('landingpage.index');
    }
}
