<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\RestaurantFile;
use Illuminate\Http\Request;

class FileController extends Controller //
{
    public function index()
    {
        $restaurantFiles = RestaurantFile::paginate(4);
        return view('pages.files.index', compact('restaurantFiles'));
    }

    public function create()
    {
        return view('pages.files.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'restaurant_id' => 'required',
        ]);

        $result = [];
        foreach ($req->file('images') as $image) {
            $destination_path = 'public/images/restaurants';
            $image_name = $image->getClientOriginalName();
            $path = $image->storeAs($destination_path, $image_name);

            $result[] = [
                'restaurant_id' => $req->restaurant_id,
                'image' => $image_name,
            ];
        }

        RestaurantFile::insert($result);
        $req->session()->flash('message', 'Restaurant entered successfully');
        return back();
    }

    public function show($id)
    {
        $restaurantFiles = RestaurantFile::find($id);
        return view('pages.show', compact('restaurantFiles'));
    }

    public function destroy($id)
    {
        $restaurantFiles = RestaurantFile::find($id);
        $restaurantFiles->delete();
        session()->flash('message', 'Restaurant image has been deleted.');
        return back();
    }
}