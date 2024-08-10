<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Traits\Common;

class CarController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = car::get();

        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_car');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // if(isset($request->published)){
        //     $pub =true;
        // }else{
        //     $pub =false;
        // }
        $data = $request->validate([
            'carTitle' => 'required|string',
            'description' => 'required|string|max:100',
            'price' => 'required|numeric',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif|max:2048',
        ]);
        
        $data['image'] = $this->uploadFile( $request->image,'asset/images/cars');
        $data['published'] = isset($request->published);

        Car::create($data);
        return redirect()->route('cars.index');
    }

        

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('car_details', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return view('edit_car', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        //    $data = [
        //     'carTitle' => $request->car_title,
        //     'price'=> $request->price,
        //     'description'=> $request->description,
        //     'published'=> isset($request->published),
        //    ];

        //    Car::where('id',$id)->update($data);
        $data = $request->validate([
            'carTitle' => 'required|string',
            'description' => 'required|string|max:100',
            'price' => 'required|numeric',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif|max:2048',
            
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile( $request->image,'asset/images/cars');
        }
    
        $data['published'] = isset($request->published);
        Car::where('id', $id)->update($data);
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {

    //     Car::where('id',$id)->delete();
    //     return redirect()->route('cars.index');
    // }

    public function destroy(Request $request, ): RedirectResponse
    {
        $id = $request->id;
        Car::where('id', $id)->delete();
        return redirect('cars');
    }

    public function showDeleted()
    {
        $cars = Car::onlyTrashed()->get();
        return view('trashed_car', compact('cars'));
    }

    public function restore(string $id)
    {
        Car::where('id', $id)->restore();
        return redirect()->route('cars.showDeleted');
    }
    public function forcedestroy(string $id)
    {
        Car::where('id', $id)->forceDelete();
        return redirect()->route('cars.index');
    }

}
