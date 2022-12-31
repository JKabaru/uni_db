<?php

namespace App\Http\Controllers;

use App\User;
use App\Staffmember;
use App\Student;
use App\Department;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StaffmemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $staffmembers = Staffmember::with(['user'])->latest()->paginate(10);
        
        return view('backend.staffmember.index', compact('staffmembers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Department::with('user')->latest()->get();
        
        
        
        return view('backend.staffmember.create', compact('department'));
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users',
            'password'          => 'required|string|min:8',
            'department_id'     => 'required|numeric',
            'gender'            => 'required|string|max:255',
            'phone'             => 'required|string|max:255',
            'current_address'   => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255'
        ]);

        $user = User::create([
            'name'              => $request->name,
            'email'             => $request->email,
            'password'          => Hash::make($request->password)
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($user->name).'-'.$user->id.'.'.$request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = 'avatar.png';
        }
        $user->update([
            'profile_picture' => $profile
        ]);

        $user->staffmember()->create([
            'department_id'     => $request->department_id,
            'gender'            => $request->gender,
            'phone'             => $request->phone,
            'current_address'   => $request->current_address,
            'permanent_address' => $request->permanent_address
        ]);

        $user->assignRole('Staffmember');

        return redirect()->route('staffmember.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staffmember  $Staffmember
     * @return \Illuminate\Http\Response
     */
    public function show(Staffmember $staffmember)
    {
        $department = Department::where('id', $staffmember->department_id)->first();
        
        return view('backend.staffmember.show', compact('department'));
    }



    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staffmember  $Staffmember
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::with('user')->findOrFail($id); 
        

        return view('backend.staffmember.edit', compact('department'));


        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staffmember  $Staffmember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staffmember $staffmember)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email,'.$staffmember->user_id,
            'gender'            => 'required|string',
            'phone'             => 'required|string|max:255',
            'current_address'   => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255'
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($staffmember->user->name).'-'.$staffmember->user->id.'.'.$request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = $staffmember->user->profile_picture;
        }

        $staffmember->user()->update([
            'name'              => $request->name,
            'email'             => $request->email,
            'profile_picture'   => $profile
        ]);

        $staffmember->update([
            'gender'            => $request->gender,
            'phone'             => $request->phone,
            'current_address'   => $request->current_address,
            'permanent_address' => $request->permanent_address
        ]);

        return redirect()->route('staffmember.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staffmember  $Staffmember
     * @return \Illuminate\Http\Response
     */
   

    public function destroy($id)
    {
        $staffmember = Staffmember::findOrFail($id);

        $user = User::findOrFail($staffmember->user_id);
        $user->removeRole('Staffmember');

        if ($user->delete()) {
            if($user->profile_picture != 'avatar.png') {
                $image_path = public_path() . '/images/profile/' . $user->profile_picture;
                if (is_file($image_path) && file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }

        $staffmember->delete();

        return back();
    }
}
