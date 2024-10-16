<?php

namespace App\Http\Controllers\admin;

use App\Models\City;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{

    public function index()
    {
        $data=City::all();
        return Inertia::render('Admin/City/index',['data'=>$data]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {


        $data=$request->validate([
            'name'=>'required|string|max:255'
        ]);

        City::create($data);
        return redirect()->route('city.index')->with('success','City created successfully');
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
        $data=City::find($id);
        return Inertia::render('Admin/City/edit',['data'=>$data]);
    }


    public function update(Request $request, string $id)
    {

        $category= City::find($id);
        $data=$request->validate([
            'name'=>'required|string|max:255'
        ]);
        $category->update($data);
        return redirect()->back()->with('success', 'Product updated successfully.');
    }


    public function destroy(string $id)
    {
        $category=City::find($id);
        $category->delete();
        return redirect()->route('city.index')->with('success','City deleted successfully');
    }
}
