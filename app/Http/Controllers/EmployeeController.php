<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\EmployeeRepository;

class EmployeeController extends Controller
{
    private $empRepository;

    public function __construct(EmployeeRepository $emp)
    {
        $this->empRepository = $emp;
    }

    public function index(Request $request)
    {
        $emps = $this->empRepository->all();
    	return view('pages.emp.index', compact(['emps']));
    }

    public function destroy($id)
    {
        $emps = $this->empRepository->delete($id);
        Session::flash('messsage', 'Successfully deleted.');
        return Redirect::to('employees.index');
    }

}
