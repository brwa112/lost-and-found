<?php

namespace App\Http\Controllers\admin;

use App\Models\City;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=City::all();
        return Inertia::render('Admin/City/index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $data=$request->validate([
            'name'=>'required|string|max:255'
        ]);

        City::create($data);
        return redirect()->route('city.index')->with('success','City created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=City::find($id);
        return Inertia::render('Admin/City/edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $category= City::find($id);
        $data=$request->validate([
            'name'=>'required|string|max:255'
        ]);
        $category->update($data);
        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        $category=City::find($id);
        $category->delete();
        return redirect()->route('city.index')->with('success','City deleted successfully');
    }
}
