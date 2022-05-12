<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\RestaurantFile;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;
use SebastianBergmann\GlobalState\Restorer;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\VarDumper\Cloner\Data;
use Illuminate\Support\Facades\File;

class ResController extends Controller
{
    public function index(Request $request)
    {
        $query = Restaurant::query();

        if ($search = $request->search) {
            $query->where(function ($query) use ($search) {
                $query
                    ->where('name', 'like', "%$search%")
                    ->orwhere('email', 'like', "%$search%");
            });
        }

        $province_id = $request->province_id;
        if ($province_id) {
            $query->where('province_id', $province_id);
        }

        $data = $query->paginate(4);
        $provinces = Province::all();
        return view('pages.restaurants.index', compact('provinces', 'data'));
    }

    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        // $provinces = Province::find($id);
        $files = $restaurant->restaurantFiles()->paginate(4);
        return view('pages.show', compact('restaurant', 'files'));
    }

    //for show form
    public function create()
    {
        $provinces = Province::all();
        return view('pages.restaurants.create', compact('provinces'));
    }

    // for create new data
    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|max:120',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|min:10',
            'province_id' => 'required|integer',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $restaurant = new Restaurant();
        $restaurant->name = $req->name;
        $restaurant->email = $req->email;
        $restaurant->province_id = $req->province_id;
        $restaurant->phone = $req->phone;
        $restaurant->description = $req->description;
        $restaurant->image = $req->image;
        $restaurant->created_by = auth()->id();

        if ($req->hasFile('image')) {
            $destination_path = 'public/images/restaurants';
            $image = $req->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $req
                ->file('image')
                ->storeAs($destination_path, $image_name);
            $restaurant->image = $image_name;
        }

        $restaurant->save();
        $req->session()->flash('message', 'Restaurant entered successfully');
        return redirect()->route('restaurants.index');
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->delete();
        session()->flash('message', 'Restaurant has been deleted');
        return back();
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        Restaurant::whereIn('id', $ids)->delete();
        return response()->json(['message' => 'Deleted successfully.']);
    }

    public function edit($id)
    {
        $data = Restaurant::find($id);
        $provinces = Province::all();
        return view('pages.restaurants.edit', compact('data', 'provinces'));
    }

    public function update($id, Request $req)
    {
        $data = Restaurant::find($id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->phone = $req->phone;
        $data->province_id = $req->province_id;
        $data->description = $req->description;

        if ($req->hasFile('image')) {
            $destination_path = 'public/images/restaurants';
            if (File::exists($destination_path)) {
                File::delete($destination_path);
            }
            $image = $req->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $req
                ->file('image')
                ->storeAs($destination_path, $image_name);
            $data->image = $image_name;
        }

        $data->save();
        session()->flash('message', 'Restaurant has been updated');
        return redirect()->route('restaurants.index');
    }
}