<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function store(Request $request)
    {
        $input = $request->only('name', 'phone', 'password', 'birthday', 'start_date', 'sex');
        $input['role']  = "3";
        $input['password']  = bcrypt($input['password']);

        $this->empRepository->create($input);

        session()->flash('messsage', 'Successfully added new Employee.');
        return redirect()->route('employees.index');
    }

    public function destroy(Request $request)
    {
        try
        {
            $this->empRepository->deleteMultiRecord($request->emps);
        }
        catch (Exception $e)
        {
            dd($e);
        }
        session()->flash('messsage', 'Successfully deleted.');
        return redirect()->route('employees.index');
    }

}
