<?php

namespace App\Http\Controllers\admin;

use Inertia\Inertia;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;

class LocationController extends Controller
{

    public function index()
    {
        $data=Location::with('cities')->get();
        $city=City::all();
        return Inertia::render('Admin/Location/index',['data'=>$data,'city'=>$city]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $data=$request->validate([
            'name'=>'required|string|max:255',
            'city_id'=>'required|exists:cities,id'
        ]);

        // $data=$request->validate([
        //     'name'=>'required|string|max:255'
        // ]);

        Location::create($data);
        return redirect()->route('location.index')->with('success','City created successfully');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Location::find($id);
        return Inertia::render('Admin/Location/edit',['data'=>$data]);
    }


    public function update(Request $request, string $id)
    {

        $category= Location::find($id);
        $data=$request->validate([
            'name'=>'required|string|max:255'
        ]);
        $category->update($data);
        return redirect()->back()->with('success', 'Product updated successfully.');
    }


    public function destroy(string $id)
    {
        $category=Location::find($id);
        $category->delete();
        return redirect()->route('location.index')->with('success','City deleted successfully');
    }
}
