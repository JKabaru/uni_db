<?php

namespace App\Http\Controllers;

use App\User;
use App\Staffmember;
use App\Department;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::with(['user','children'])->latest()->paginate(10);
        
        return view('backend.departments.index', compact('departments'));
    }


    public function create()
    {
        return view('backend.departments.create');
    }


    /**store  */

    public function store(Request $request)
    {
        $request->validate([
            'department_name'   => 'required|string|max:255',
            'department_id'     => 'required|numeric',
            'description'       => 'required|string|max:255'
        ]);

        Department::create([
            
            'department_name'  => $request->department_name,
            'department_id'    => $request->department_id,
            'description'   => $request->description
        ]);

        

        return redirect()->route('department.index');
    }

    
}
