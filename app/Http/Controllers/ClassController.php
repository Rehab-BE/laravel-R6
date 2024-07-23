<?php

namespace App\Http\Controllers;

use App\Models\Class1;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = class1::get();
        return view('classes', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Class1::create([
            'class_name' => $request->class_name,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
            'is_fulled' => isset($request->is_fulled),
        ]);
        return "date insert successfully";
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
        $class = Class1::findOrFail($id);
        return view('edit_class', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
