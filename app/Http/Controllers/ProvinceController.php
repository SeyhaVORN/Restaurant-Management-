<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    //
    public function index()
    {
        $provinces = Province::paginate(4);
        return view('pages.provinces.index', compact('provinces'));
    }

    public function create()
    {
        return view('pages.provinces.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'province' => 'unique:provinces,province',
        ]);

        $image = $req->file('image');
        $destination_path = 'public/images/';
        $image_name = $image->getClientOriginalName();
        $path = $image->storeAs($destination_path, $image_name);

        $result = [
            'province' => $req->province,
            'image' => $image_name,
        ];

        Province::create($result);
        $req->session()->flash('message', 'Province entered successfully');
        return back();
    }

    public function destroy($id)
    {
        $provinces = Province::find($id);
        $provinces->delete();
        session()->flash('message', 'Province has been deleted.');
        return back();
    }
}