<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index(Request $request)
    {
    	return view('pages.emp.index');
    }
}
