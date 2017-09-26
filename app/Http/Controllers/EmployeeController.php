<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\EmployeeRepository;
use Carbon\Carbon;
use Log;
use Exception;

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

    public function store(Request $request)
    {
        $input = $request->only('name', 'phone', 'password', 'birthday', 'start_date');
        $input['role'] = 3;
        $input['sex'] = 1;
        $this->empRepository->create($input);

        return redirect()->route('employees.index')->with('success');
    }

    public function destroy($id)
    {
        $emps = $this->empRepository->delete($id);
        Session::flash('messsage', 'Successfully deleted.');
        return Redirect::to('employees.index');
    }

}
