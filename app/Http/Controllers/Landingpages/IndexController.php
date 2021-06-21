<?php


namespace App\Http\Controllers\Landingpages;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        return view('Landingpages.index');
    }
}
