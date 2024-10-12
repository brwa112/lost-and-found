<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryContrller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Category::all();
        return Inertia::render('Admin/Category/index',['data'=>$data]);
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

        Category::create($data);
        return redirect()->route('category.index')->with('success','Category created successfully');
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
        $data=Category::find($id);
        return Inertia::render('Admin/Category/edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $category= Category::find($id);
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


        $category=Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('success','Category deleted successfully');
    }
}
