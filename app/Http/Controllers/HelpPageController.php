<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpPageController extends Controller
{
    //
    public function index(){
        return view('project_1.customer.helpPage.index');
    }
}
