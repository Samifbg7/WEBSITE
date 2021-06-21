<?php


namespace App\Http\Controllers\Landingpage;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        return view('landingpage.index');
    }
}
