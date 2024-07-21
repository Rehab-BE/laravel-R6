<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Class1;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        
        $class_name='English';
        $capacity='4';
        $price='5600';
        $time_from='4';
        $time_to='5';
        $is_fulled='yes';

        Class1::create([
        'class_name'=> $class_name,
        'capacity'=>$capacity,
        'price'=>$price,
        'time_from'=>$time_from,
        'time_to'=>$time_to,
        'is_fulled'=>$is_fulled,
        ]);
        return "date";
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
        //
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
