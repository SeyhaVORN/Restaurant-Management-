<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
    public function index()
    {
        $staffs = Staff::paginate(4);
        return view('pages.staffs.index', compact('staffs'));
    }

    public function create()
    {
        return view('pages.staffs.create');
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|max:120',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:11|numeric',
            'gender' => 'required',
            'position' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $staff = new Staff();
        $staff->name = $req->name;
        $staff->email = $req->email;
        $staff->phone = $req->phone;
        $staff->gender = $req->gender;
        $staff->position = $req->position;
        $staff->image = $req->image;

        if ($req->hasFile('image')) {
            $destination_path = 'public/images/staffs';
            $image = $req->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $req
                ->file('image')
                ->storeAs($destination_path, $image_name);
            $staff->image = $image_name;
        }

        $staff->save();
        $req->session()->flash('message', 'Staff entered successfully');
        // return redirect('list');
        return back();
    }

    public function show()
    {
    }

    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        session()->flash('message', 'staff has been deleted.');
        return back();
    }
}